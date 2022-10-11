<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_pemilih');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Pemilih',
         'pemilih' => $this->m_pemilih->list()
      ];
      $this->load->view('pemilih/list', $data);
   }

   public function regex($str)
   {
      $str = $this->input->post('nama_pemilih');
      return preg_match('/([A-Za-z]+)/', $str) ? $str : false;
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_pemilih', 'Nama Pemilih', 'required|callback_regex', [
         'required' => '%s harus diisi',
         'regex' => '%s harus diisi karakter'
      ]);
      $this->form_validation->set_rules('jk_pemilih', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pemilih.username]', [
         'required' => '%s harus diisi',
         'is_unique' => '%s sudah ada, harap buat username baru',
      ]);
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', [
         'required' => '%s harus diisi',
         'min_length' => '%s minimal 5 karakter'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah Pemilih',
         ];
         $this->load->view('pemilih/tambah', $data);
      } else {
         $data = [
            'nama_pemilih' => $this->input->post('nama_pemilih'),
            'jk_pemilih' => $this->input->post('jk_pemilih'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
         ];
         $this->m_pemilih->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('pemilih');
      }
   }

   public function edit($id_pemilih)
   {
      $this->form_validation->set_rules('nama_pemilih', 'Nama Pemilih', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('jk_pemilih', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data Pemilih',
            'pemilih' => $this->m_pemilih->detail($id_pemilih)
         ];
         $this->load->view('pemilih/edit', $data);
      } else {
         $password = $this->input->post('password');
         //untuk cek apakah password lebih dari 6 karakter
         if (strlen($password) > 4) {
            $data = [
               'id_pemilih' => $id_pemilih,
               'nama_pemilih' => $this->input->post('nama_pemilih'),
               'jk_pemilih' => $this->input->post('jk_pemilih'),
               'username' => $this->input->post('username'),
               'password' => md5($this->input->post('password'))
            ];
            $this->m_pemilih->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('pemilih');
         } else if (strlen($password) <= 4) {
            $data = [
               'id_pemilih' => $id_pemilih,
               'nama_pemilih' => $this->input->post('nama_pemilih'),
               'jk_pemilih' => $this->input->post('jk_pemilih'),
               'username' => $this->input->post('username')
               // 'password' => md5($this->input->post('password'))
            ];
            $this->m_pemilih->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('pemilih');
         }
      }
   }

   public function delete($id_pemilih)
   {
      $data = [
         'id_pemilih' => $id_pemilih
      ];
      $this->m_pemilih->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('pemilih');
   }

   public function report()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Laporan Pemilih',
         'pemilih' => $this->m_pemilih->list()
      ];
      $this->load->view('pemilih/report', $data);
   }

   public function cetak()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Cetak Laporan Pemilih',
         'pemilih' => $this->m_pemilih->list()
      ];
      $this->load->view('pemilih/cetak', $data);
   }
}

/* End of file pemilih.php */
