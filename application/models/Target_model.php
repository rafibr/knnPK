<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Target_model
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

class Target_model extends CI_Model
{

  private $_table = "data_target";


  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  public function getDataTarget()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getDataTargetId($id)
  {
    return $this->db->get_where($this->_table, array('ID_DATA_TARGET ' => $id))->row();
  }

  public function addDataTarget($data)
  {
    extract($data);

    $this->db->insert('data_target', $data);
  }

  public function editDataTarget($data, $id)
  {
    extract($data);

    $this->db->where('ID_DATA_TARGET', $id);
    $this->db->update('data_target', $data);
  }

  public function deleteDataTarget($id)
  {
    $this->db->where('ID_DATA_TARGET', $id);
    $this->db->delete('data_target');
  }

  public function deleteAllDataTarget()
  {
    $this->db->from('data_target');
    $this->db->truncate();
  }

  public function countTarget()
  {
    $this->db->select('count(ID_DATA_TARGET) as target');
    $this->db->from('data_target');
    $query = $this->db->get();
    return ($query->row());
  }

  // ------------------------------------------------------------------------


  public function getTarget($id)
  {

    $this->db->select('
      KB_DATA_TARGET,
      PBO_DATA_TARGET,
      PW_DATA_TARGET,
      RPL_DATA_TARGET	,
      APS_DATA_TARGET	,
      MANPRO_DATA_TARGET	,
      KWU_DATA_TARGET	,
      TKTI_DATA_TARGET
    ');
    $this->db->from($this->_table);
    $this->db->where('ID_DATA_TARGET ', $id);
    $query = $this->db->get();
    $targetDB =  ($query->row());

    //Change object dataTarget to array
    $targetDataArr = array();
    foreach ($targetDB as $t) {
      array_push($targetDataArr, floatval($t));
    }

    return $targetDataArr;
  }

  // ------------------------------------------------------------------------

  public function setTarget($id, $label)
  {
    $this->db->set('LABEL_DATA_TARGET', $label);
    $this->db->where('ID_DATA_TARGET', $id);
    $this->db->update($this->_table);
  }
}

/* End of file Target_model.php */
/* Location: ./application/models/Target_model.php */
