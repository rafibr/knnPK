<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Confusion_model extends CI_Model
{

  private $_table = 'data_testing';
  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  public function deleteAllDataTesting()
  {
    $this->db->from('data_testing');
    $this->db->truncate();
  }

  // ------------------------------------------------------------------------
  public function getLabelConf($batch)
  {
    $this->db->select('LABEL_FACT_DATA_TESTING, LABEL_PREDICT_DATA_TESTING');
    $this->db->from($this->_table);
    $this->db->where('BATCH_DATA_TESTING', $batch);

    $query = $this->db->get();
    $data = ($query->result());

    $labelFact = array();
    $labelPredict = array();

    foreach ($data as $c) {
      array_push($labelFact, $c->LABEL_FACT_DATA_TESTING);
      array_push($labelPredict, $c->LABEL_PREDICT_DATA_TESTING);
    }

    $return = [
      "labelFact" => $labelFact,
      "labelPredict" => $labelPredict
    ];

    return $data;
  }

  // ------------------------------------------------------------------------

}

/* End of file Confusion_model.php */
/* Location: ./application/models/Confusion_model.php */
