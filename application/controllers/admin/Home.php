<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Home
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

class Home extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('training_model');
    $this->load->model('target_model');
    $this->load->model('testing_model');

    // if session not set then go to login page
    $this->load->model("login_model");
    if ($this->login_model->isNotLogin()) redirect(site_url(''));

  }

  public function index()
  {
    $data['training'] = $this->training_model->countTraining();
    $data['target'] = $this->target_model->countTarget();
    $data['testing'] = $this->testing_model->countTesting();

    $this->load->view("_admin/home", $data);
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */