<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_pemilih extends CI_Controller
{
   public function index()
   {
      $this->form_validation->set_rules('username', 'Username', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('password', 'Password', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $username = $this->input->post('username');
         $password = md5($this->input->post('password'));
         $this->pemilih_login->login($username, $password);
      }
      $data = [
         'title' => 'Login Pemilih',
      ];
      $this->load->view('login_pemilih', $data);
   }

   public function logout()
   {
      $this->pemilih_login->logout();
   }
}

/* End of file Login.php */
