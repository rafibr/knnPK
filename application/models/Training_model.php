<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Training_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Training_model extends CI_Model
{

  private $_table = "data_training";

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getDataTraining()
  {
    return $this->db->get($this->_table)->result();
  }

  public function countDataTraining()
  {
    $this->db->select('count(ID_DATA_TRAINING) as max');
    $this->db->from('data_training');
    $query = $this->db->get();
    return ($query->row());
  }

  public function countTraining()
  {
    $this->db->select('count(ID_DATA_TRAINING) as training');
    $this->db->from('data_training');
    $query = $this->db->get();
    return ($query->row());
  }

  // ------------------------------------------------------------------------

  public function addDataTraining($data)
  {
    extract($data);

    $this->db->insert('data_training', $data);
  }

  public function editDataTraining($data, $id)
  {
    extract($data);

    $this->db->where('ID_DATA_TRAINING', $id);
    $this->db->update('data_training', $data);
  }

  public function deleteDataTraining($id)
  {
    $this->db->where('ID_DATA_TRAINING', $id);
    $this->db->delete('data_training');
  }

  public function deleteAllDataTraining()
  {
    $this->db->from('data_training');
    $this->db->truncate();
  }

  // ------------------------------------------------------------------------
  public function getNameTraining()
  {
    $this->db->select('ID_DATA_TRAINING, NAMA_DATA_TRAINING');
    $this->db->from('data_training');
    $query = $this->db->get();
    $trainingDB =  ($query->result());

    //Change object dataTrain to array
    $idTrainDataArr = array();
    $nameTrainDataArr = array();
    foreach ($trainingDB as $t) {
      $loopData = array();
      foreach ($t as $a) {
        array_push($loopData, ($a));
      }

      array_push($idTrainDataArr, $loopData[0]);
      array_push($nameTrainDataArr, $loopData[1]);
    }

    return [$idTrainDataArr, $nameTrainDataArr];
  }

  public function getTraining()
  {

    $this->db->select('
      KB_DATA_TRAINING,
      PBO_DATA_TRAINING,
      PW_DATA_TRAINING,
      RPL_DATA_TRAINING	,
      APS_DATA_TRAINING	,
      MANPRO_DATA_TRAINING	,
      KWU_DATA_TRAINING	,
      TKTI_DATA_TRAINING
    ');
    $this->db->from('data_training');
    $query = $this->db->get();
    $trainingDB =  ($query->result());

    //Change object dataTrain to array
    $trainDataArr = array();
    foreach ($trainingDB as $t) {
      $loopData = array();
      foreach ($t as $a) {
        array_push($loopData, floatval($a));
      }
      array_push($trainDataArr, $loopData);
    }

    return ($trainDataArr);
  }

  public function getTrainingLabel()
  {
    $this->db->select('
    LABEL_DATA_TRAINING
  ');
    $this->db->from('data_training');
    $query = $this->db->get();
    $labelTrainingDB =  ($query->result());

    //Change object lableDataTrain to array
    $labelTrainDataB = array();
    foreach ($labelTrainingDB as $t) {
      foreach ($t as $a) {
        array_push($labelTrainDataB, ($a));
      }
    }

    return ($labelTrainDataB);
  }
  // ------------------------------------------------------------------------

}

/* End of file Training_model.php */
/* Location: ./application/models/Training_model.php */
