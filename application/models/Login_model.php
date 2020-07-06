<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  private $_table = 'user';
  // ------------------------------------------------------------------------
  public function doLogin()
  {
    $post = $this->input->post();

    // cari user berdasarkan username
    $this->db->where('USERNAME', $post["username"]);
    $user = $this->db->get($this->_table)->row();

    // jika user terdaftar
    if ($user != null) {
      // periksa password-nya
      $isPasswordTrue = md5($post["pass"]) == $user->PASSWORD ? true : false;

      if ($isPasswordTrue == false) $this->session->set_flashdata('auth', 'Password atau username salah');

      // jika password benar
      if ($isPasswordTrue) {
        // login sukses 
        $this->session->set_userdata(['user_logged' => $user]);

        // Menambahkan data ke table login_terakhir
        $this->_updateLastLogin($user->USERNAME);
        return true;
      }
    }


    // login gagal
    return false;
  }

  private function _updateLastLogin($user_id)
  {
    $sql = "UPDATE {$this->_table} SET LAST_LOGIN=now() WHERE USERNAME='$user_id'";
    $this->db->query($sql);
  }

  public function isNotLogin()
  {
    return $this->session->userdata('user_logged') === null;
  }

  // ------------------------------------------------------------------------

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
