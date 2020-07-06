<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Testing_model extends CI_Model
{
  private $_table = 'data_testing';

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function updateTesting($id, $label)
  {
    $this->db->set('LABEL_PREDICT_DATA_TESTING', $label);
    $this->db->where('ID_DATA_TESTING', $id);
    $this->db->update($this->_table);
  }

  public function countWhereSet($set)
  {
    $this->db->select('count(ID_DATA_TESTING) as sum');
    $this->db->from($this->_table);
    $this->db->where('BATCH_DATA_TESTING ', $set);
    $query = $this->db->get();
    return ($query->row());
  }

  public function countTesting()
  {
    $this->db->select('count(ID_DATA_TESTING) as testing');
    $this->db->from('data_testing');
    $query = $this->db->get();
    return ($query->row());
  }

  // ------------------------------------------------------------------------

  

  // ------------------------------------------------------------------------
  public function getTestingLoop($set)
  {
    $this->db->select('ID_DATA_TESTING');
    $this->db->from($this->_table);
    $this->db->where('BATCH_DATA_TESTING ', $set);
    $query = $this->db->get();
    return ($query->result());
  }

  public function getTesting($id)
  {

    $this->db->select('
      KP_DATA_TESTING,
      PBO_DATA_TESTING,
      PW_DATA_TESTING,
      RPL_DATA_TESTING	,
      APS_DATA_TESTING	,
      MANPRO_DATA_TESTING	,
      KWU_DATA_TESTING	,
      TKTI_DATA_TESTING
    ');
    $this->db->from($this->_table);
    $this->db->where('ID_DATA_TESTING ', $id);
    $query = $this->db->get();
    $targetDB =  ($query->row());

    //Change object dataTarget to array
    $targetDataArr = array();
    foreach ($targetDB as $t) {
      array_push($targetDataArr, floatval($t));
    }

    return $targetDataArr;
  }
}

/* End of file Testing_model.php */
/* Location: ./application/models/Testing_model.php */
