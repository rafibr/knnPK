<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akurasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('testing_model');
		$this->load->model('training_model');
		$this->load->model('confusion_model');

		// if session not set then go to login page
		$this->load->model("login_model");
		if ($this->login_model->isNotLogin()) redirect(site_url(''));
	}

	public function index()
	{
		$data['testing'] = $this->testing_model->getAll();
		$this->load->view('_admin/akurasi', $data);
	}

	public function deleteAllTesting()
	{
		$this->confusion_model->deleteAllDataTesting();

		redirect(site_url('akurasi'));
	}

	//sort array by key
	function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
	{
		$sort_col = array();
		foreach ($arr as $key => $row) {
			$sort_col[$key] = $row[$col];
		}

		array_multisort($sort_col, $dir, $arr);
	}

	public function ujiBatch()
	{
		$loopTesting = $this->testing_model->getTestingLoop($_GET['setData']);
		$trainData = $this->training_model->getTraining();
		$nameTrainData = $this->training_model->getNameTraining();
		$trainLabel = $this->training_model->getTrainingLabel();

		foreach ($loopTesting as $t) :
			$targetData = $this->testing_model->getTesting($t->ID_DATA_TESTING);


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
			$k = 7; //K value
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

			$this->testing_model->updateTesting($t->ID_DATA_TESTING, $updLabel);

		endforeach;

		redirect(site_url('akurasi'));
	}

	public function knnFormula($trainingData, $targetData)
	{
		$distance = array();
		// var_dump($distance);

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
			// 		+ (abs(($train[1] - $targetData[1])))
			// 		+ (abs(($train[2] - $targetData[2])))
			// 		+ (abs(($train[3] - $targetData[3])))
			// 		+ (abs(($train[4] - $targetData[4])))
			// 		+ (abs(($train[5] - $targetData[5])))
			// 		+ (abs(($train[6] - $targetData[6])))
			// 		+ (abs(($train[7] - $targetData[7])));

			array_push($distance, $knnVal);

		endforeach;

		return $distance;
	}


	//confusion matrix controller
	public function confusion()
	{
		$data['Conf'] = $this->confusion_model->getLabelConf($_GET['setData']);


		$data['table'] = ($this->countConf($data['Conf']));

		$data['sumData'] = $this->testing_model->countWhereSet($_GET['setData']);




		$this->load->view('_admin/conf_matrix', $data);
	}

	//This Function is for counting multiclass Label
	public function countConf($data)
	{
		$aa = 0;
		$ab = 0;
		$ac = 0;
		$ba = 0;
		$bb = 0;
		$bc = 0;
		$ca = 0;
		$cb = 0;
		$cc = 0;

		foreach ($data as $c) {

			//Same Label
			if ($c->LABEL_PREDICT_DATA_TESTING == '1' && $c->LABEL_FACT_DATA_TESTING == '1') {
				$aa++;
			}
			if ($c->LABEL_PREDICT_DATA_TESTING == '2' && $c->LABEL_FACT_DATA_TESTING == '2') {
				$bb++;
			}
			if ($c->LABEL_PREDICT_DATA_TESTING == '3' && $c->LABEL_FACT_DATA_TESTING == '3') {
				$cc++;
			}

			//Predict Analis
			if ($c->LABEL_PREDICT_DATA_TESTING == '1' && $c->LABEL_FACT_DATA_TESTING == '2') {
				$ba++;
			}
			if ($c->LABEL_PREDICT_DATA_TESTING == '1' && $c->LABEL_FACT_DATA_TESTING == '3') {
				$ca++;
			}

			//predict Programmer
			if ($c->LABEL_PREDICT_DATA_TESTING == '2' && $c->LABEL_FACT_DATA_TESTING == '1') {
				$ab++;
			}
			if ($c->LABEL_PREDICT_DATA_TESTING == '2' && $c->LABEL_FACT_DATA_TESTING == '3') {
				$cb++;
			}

			//predict PM
			if ($c->LABEL_PREDICT_DATA_TESTING == '3' && $c->LABEL_FACT_DATA_TESTING == '1') {
				$ac++;
			}
			if ($c->LABEL_PREDICT_DATA_TESTING == '3' && $c->LABEL_FACT_DATA_TESTING == '2') {
				$bc++;
			}
		}

		$confTable = [
			[$aa, $ab, $ac],
			[$ba, $bb, $bc],
			[$ca, $cb, $cc]
		];

		return $confTable;
	}
}
