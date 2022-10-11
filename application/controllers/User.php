<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_user');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data User',
         'user' => $this->m_user->list()
      ];
      $this->load->view('user/list', $data);
   }

   public function regex($str)
   {
      $str = $this->input->post('nama_user');
      return preg_match('/([A-Za-z]+)/', $str) ? $str : false;
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_user', 'Nama User', 'required|callback_regex', [
         'required' => '%s harus diisi',
         'regex' => '%s harus diisi karakter'
      ]);
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', [
         'required' => '%s harus diisi',
         'is_unique' => '%s sudah ada, harap buat username baru',
      ]);
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', [
         'required' => '%s harus diisi',
         'min_length' => '%s minimal 5 karakter'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah User',
         ];
         $this->load->view('user/tambah', $data);
      } else {
         $data = [
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
         ];
         $this->m_user->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('user');
      }
   }

   public function edit($id_user)
   {
      $this->form_validation->set_rules('nama_user', 'Nama User', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data User',
            'user' => $this->m_user->detail($id_user)
         ];
         $this->load->view('user/edit', $data);
      } else {
         $password = $this->input->post('password');
         //untuk cek apakah password lebih dari 6 karakter
         if (strlen($password) > 4) {
            $data = [
               'id_user' => $id_user,
               'nama_user' => $this->input->post('nama_user'),
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password'))
            ];
            $this->m_user->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('user');
         } else if (strlen($password) <= 4) {
            $data = [
               'id_user' => $id_user,
               'nama_user' => $this->input->post('nama_user'),
               'username' => $this->input->post('username')
               // 'password' => md5($this->input->post('password'))
            ];
            $this->m_user->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('user');
         }
      }
   }

   public function delete($id_user)
   {
      $data = [
         'id_user' => $id_user
      ];
      $this->m_user->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('user');
   }

   public function report()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Laporan Data User',
         'user' => $this->m_user->list()
      ];
      $this->load->view('user/report', $data);
   }

   public function cetak()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Cetak Laporan Data User',
         'user' => $this->m_user->list()
      ];
      $this->load->view('user/cetak', $data);
   }
}

/* End of file User.php */
