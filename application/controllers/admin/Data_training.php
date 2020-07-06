<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Data_training
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Data_training extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('training_model');

    // if session not set then go to login page
    $this->load->model("login_model");
    if ($this->login_model->isNotLogin()) redirect(site_url(''));
  }

  public function index()
  {
    $data['training'] = $this->training_model->getDataTraining();
    $this->load->view('_admin/data_training', $data);
  }

  public function addTraining()
  {
    $data = [
      'NAMA_DATA_TRAINING' => $this->input->post('name'),
      'KB_DATA_TRAINING' => $this->input->post('kp'),
      'PBO_DATA_TRAINING' => $this->input->post('pbo'),
      'PW_DATA_TRAINING' => $this->input->post('pw'),
      'RPL_DATA_TRAINING' => $this->input->post('rpl'),
      'APS_DATA_TRAINING' => $this->input->post('aps'),
      'MANPRO_DATA_TRAINING' => $this->input->post('manpro'),
      'KWU_DATA_TRAINING' => $this->input->post('kwu'),
      'TKTI_DATA_TRAINING' => $this->input->post('tkti'),
      'LABEL_DATA_TRAINING' => $this->input->post('label')
    ];

    $this->training_model->addDataTraining($data);

    redirect(site_url('training'));
  }

  public function editTraining()
  {
    $data = [
      'NAMA_DATA_TRAINING' => $this->input->post('name'),
      'KB_DATA_TRAINING' => $this->input->post('kp'),
      'PBO_DATA_TRAINING' => $this->input->post('pbo'),
      'PW_DATA_TRAINING' => $this->input->post('pw'),
      'RPL_DATA_TRAINING' => $this->input->post('rpl'),
      'APS_DATA_TRAINING' => $this->input->post('aps'),
      'MANPRO_DATA_TRAINING' => $this->input->post('manpro'),
      'KWU_DATA_TRAINING' => $this->input->post('kwu'),
      'TKTI_DATA_TRAINING' => $this->input->post('tkti'),
      'LABEL_DATA_TRAINING' => $this->input->post('label')
    ];

    $idTraining = $this->input->post('idTraining');

    $this->training_model->editDataTraining($data, $idTraining);

    redirect(site_url('training'));
  }

  public function deleteTraining($id)
  {
    $this->training_model->deleteDataTraining($id);

    redirect(site_url('training'));
  }

  public function deleteAllTraining()
  {
    $this->training_model->deleteAllDataTraining();

    redirect(site_url('training'));
  }
}


/* End of file Data_training.php */
/* Location: ./application/controllers/Data_training.php */
