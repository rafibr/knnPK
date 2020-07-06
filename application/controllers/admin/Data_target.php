<?php

use Phpml\Classification\KNearestNeighbors;
use Phpml\Math\Distance\Euclidean;

defined('BASEPATH') or exit('No direct script access allowed');

class Data_target extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('target_model');
    $this->load->model('training_model');

    // if session not set then go to login page
    $this->load->model("login_model");
    if ($this->login_model->isNotLogin()) redirect(site_url(''));
  }

  public function index()
  {
    $data['target'] = $this->target_model->getDataTarget();
    $data['countTrain'] = $this->training_model->countDataTraining();
    $this->load->view('_admin/data_target.php', $data);
  }
  //----------------------------------------------------------------------

  public function addTarget()
  {
    $data = [
      'NAMA_DATA_TARGET' => $this->input->post('name'),
      'KB_DATA_TARGET' => $this->input->post('kp'),
      'PBO_DATA_TARGET' => $this->input->post('pbo'),
      'PW_DATA_TARGET' => $this->input->post('pw'),
      'RPL_DATA_TARGET' => $this->input->post('rpl'),
      'APS_DATA_TARGET' => $this->input->post('aps'),
      'MANPRO_DATA_TARGET' => $this->input->post('manpro'),
      'KWU_DATA_TARGET' => $this->input->post('kwu'),
      'TKTI_DATA_TARGET' => $this->input->post('tkti')
    ];

    $this->target_model->addDataTarget($data);

    redirect(site_url('target'));
  }

  public function editTarget()
  {
    $data = [
      'NAMA_DATA_TARGET' => $this->input->post('name'),
      'KB_DATA_TARGET' => $this->input->post('kp'),
      'PBO_DATA_TARGET' => $this->input->post('pbo'),
      'PW_DATA_TARGET' => $this->input->post('pw'),
      'RPL_DATA_TARGET' => $this->input->post('rpl'),
      'APS_DATA_TARGET' => $this->input->post('aps'),
      'MANPRO_DATA_TARGET' => $this->input->post('manpro'),
      'KWU_DATA_TARGET' => $this->input->post('kwu'),
      'TKTI_DATA_TARGET' => $this->input->post('tkti'),
      'LABEL_DATA_TARGET' => 0
    ];

    $idTarget = $this->input->post('idTarget');

    $this->target_model->editDataTarget($data, $idTarget);

    redirect(site_url('target'));
  }

  public function deleteTarget($id)
  {
    $this->target_model->deleteDataTarget($id);

    redirect(site_url('target'));
  }

  public function deleteAllTarget()
  {
    $this->target_model->deleteAllDataTarget();

    redirect(site_url('target'));
  }


  //----------------------------------------------------------------------

  //sort array by key
  function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
  {
    $sort_col = array();
    foreach ($arr as $key => $row) {
      $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
  }



  public function targetData()
  {
    $trainData = $this->training_model->getTraining();
    $nameTrainData = $this->training_model->getNameTraining();
    $trainLabel = $this->training_model->getTrainingLabel();
    $targetData = $this->target_model->getTarget($_GET['idData']);

    $hasil = ($this->knnFormula($trainData, $targetData));

    //merge array after knnFormula
    $lastArr = array();
    for ($i = 0; $i < count($hasil); $i++) {
      $arrInArr =
        [
          "id" => $nameTrainData[0][$i],
          "nama" => $nameTrainData[1][$i],
          "label Train" => $trainLabel[$i],
          "jarak" => $hasil[$i]
        ];

      array_push($lastArr, $arrInArr);
    }


    //sort array by key 'jarak'
    $this->array_sort_by_column($lastArr, 'jarak');

    //get shorter distance with K
    $k = $_GET['K-Value']; //K value
    $trainDataWithK = array();

    $labelPredict = [
      "Analis" => 0,
      "Programmer" => 0,
      "PM" => 0
    ];

    if ($k > 1) {
      for ($i = 0; $i < $k; $i++) {
        array_push($trainDataWithK, $lastArr[$i]);

        if ($lastArr[$i]["label Train"] == "1") {
          $labelPredict["Analis"]++;
        } else if ($lastArr[$i]["label Train"] == "2") {
          $labelPredict["Programmer"]++;
        } else if ($lastArr[$i]["label Train"] == "3") {
          $labelPredict["PM"]++;
        }
      }
    } else {
      for ($i = 0; $i < $k; $i++) {
        array_push($trainDataWithK, $lastArr[$i]);

        if ($lastArr[$i]["label Train"] == "1") {
          $labelPredict["Analis"]++;
        } else if ($lastArr[$i]["label Train"] == "2") {
          $labelPredict["Programmer"]++;
        } else if ($lastArr[$i]["label Train"] == "3") {
          $labelPredict["PM"]++;
        }
      }
    }

    $largest = array_keys($labelPredict, max($labelPredict));
    $updLabel = "";
    if ($largest[0] == "Analis")
      $updLabel = "1";
    else if ($largest[0] == "Programmer")
      $updLabel = "2";
    else if ($largest[0] == "PM")
      $updLabel = "3";


    $this->target_model->setTarget($_GET['idData'], $updLabel);
    $dataCari = $this->target_model->getDataTargetId($_GET['idData']);

    //This value is for finding closest neighbor
    $knnAnalis = array();
    $knnProgrammer = array();
    $knnPM = array();

    foreach ($trainDataWithK as $k) {

      if ($k['label Train'] == "1") {
        array_push($knnAnalis, $k);
      } else if ($k['label Train'] == "2") {
        array_push($knnProgrammer, $k);
      } else if ($k['label Train'] == "3") {
        array_push($knnPM, $k);
      }
    }

    $data['target'] = ($dataCari);
    $data['distance'] = ($lastArr);
    $data['knnAnalis'] = ($knnAnalis);
    $data['knnProgrammer'] = ($knnProgrammer);
    $data['knnPM'] = ($knnPM);


    $this->load->view("_admin/hasil_uji", $data);
  }

  public function knnFormula($trainingData, $targetData)
  {
    $distance = array();

    $no = 0;
    foreach ($trainingData as $train) :

      //I cant use the looping system so i decided to use a manual approach instead
			//Eucladian Distance
			$knnVal = sqrt(
				(pow(($train[0] - $targetData[0]), 2))
					+ (pow(($train[1] - $targetData[1]), 2))
					+ (pow(($train[2] - $targetData[2]), 2))
					+ (pow(($train[3] - $targetData[3]), 2))
					+ (pow(($train[4] - $targetData[4]), 2))
					+ (pow(($train[5] - $targetData[5]), 2))
					+ (pow(($train[6] - $targetData[6]), 2))
					+ (pow(($train[7] - $targetData[7]), 2))
			);

			//Manhattan Distance
			// $knnVal = (abs(($train[0] - $targetData[0])))
      // + (abs(($train[1] - $targetData[1])))
      // + (abs(($train[2] - $targetData[2])))
      // + (abs(($train[3] - $targetData[3])))
      // + (abs(($train[4] - $targetData[4])))
      // + (abs(($train[5] - $targetData[5])))
      // + (abs(($train[6] - $targetData[6])))
      // + (abs(($train[7] - $targetData[7])));

      array_push($distance, $knnVal);

    endforeach;

    return $distance;
  }
}


/* End of file Data_target.php */
/* Location: ./application/controllers/Data_target.php */
