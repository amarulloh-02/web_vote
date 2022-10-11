<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih_login
{
   protected $ci;

   public function __construct()
   {
      $this->ci = &get_instance();
      $this->ci->load->model('m_pemilih');
   }

   public function login($username, $password)
   {
      $cek = $this->ci->m_pemilih->login($username, $password);
      if ($cek) {
         $id_pemilih = $cek->id_pemilih;
         $username = $cek->username;
         $nama_pemilih = $cek->nama_pemilih;
         $this->ci->session->set_userdata('id_pemilih', $id_pemilih);
         $this->ci->session->set_userdata('username', $username);
         $this->ci->session->set_userdata('nama_pemilih', $nama_pemilih);
         redirect('home_pemilih');
      } else {
         $this->ci->session->set_flashdata('gagal', 'Username atau Password anda salah');
         redirect('login_pemilih');
      }
   }

   public function cek_login()
   {
      if ($this->ci->session->userdata('username') == "") {
         $this->ci->session->set_flashdata('gagal', 'Anda belum login. Silahkan login terlebih dahulu');
         redirect('login_pemilih');
      }
   }

   public function logout()
   {
      $this->ci->session->unset_userdata('username');
      $this->ci->session->unset_userdata('password');
      $this->ci->session->set_flashdata('sukses', 'Logout berhasil');
      redirect('login_pemilih');
   }
}
 
 /* End of file User_login.php */
