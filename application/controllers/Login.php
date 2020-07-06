<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("login_model");
  }

  public function index()
  {
    if ($this->input->post()) {
      if ($this->login_model->doLogin()) redirect(site_url('home'));
    }

    $this->load->view("login/index");
  }

  public function logout()
  {
    // hancurkan semua sesi
    $this->session->sess_destroy();
    redirect(site_url(''));
  }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
