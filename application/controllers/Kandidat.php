<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_kandidat');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Kandidat',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('kandidat/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('no_kandidat', 'No. Kandidat', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto/foto_kandidat/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_kandidat')) {
            $data = [
               'title' => 'Tambah Data Kandidat',
               'error_upload' => $this->upload->display_errors()
            ];
            $this->load->view('kandidat/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto/foto_kandidat/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_kandidat' => $this->input->post('nama_kandidat'),
               'no_kandidat' => $this->input->post('no_kandidat'),
               'foto_kandidat' => $upload_data['uploads']['file_name']
            ];
            $this->m_kandidat->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('kandidat');
         }
      }
      $data = [
         'title' => 'Tambah Data Kandidat'
      ];
      $this->load->view('kandidat/tambah', $data);
   }

   public function edit($id_kandidat)
   {
      $this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('no_kandidat', 'No. Kandidat', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto/foto_kandidat/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_kandidat')) {
            $data = [
               'title' => 'Edit Data Kandidat',
               'error_upload' => $this->upload->display_errors(),
               'kandidat' => $this->m_kandidat->detail($id_kandidat)
            ];
            $this->load->view('kandidat/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto/foto_kandidat/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_kandidat->detail($id_kandidat);
            if ($item->foto_kandidat != null) {
               $target_file = 'foto/foto_kandidat/' . $item->foto_kandidat;
               unlink($target_file);
            }
            $data = [
               'id_kandidat' => $id_kandidat,
               'nama_kandidat' => $this->input->post('nama_kandidat'),
               'no_kandidat' => $this->input->post('no_kandidat'),
               'foto_kandidat' => $upload_data['uploads']['file_name']
            ];
            $this->m_kandidat->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('kandidat');
         }
         $data = [
            'id_kandidat' => $id_kandidat,
            'nama_kandidat' => $this->input->post('nama_kandidat'),
            'no_kandidat' => $this->input->post('no_kandidat')
         ];
         $this->m_kandidat->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('kandidat');
      }
      $data = [
         'title' => 'Edit Data kandidat',
         'kandidat' => $this->m_kandidat->detail($id_kandidat)
      ];
      $this->load->view('kandidat/edit', $data);
   }

   public function delete($id_kandidat)
   {
      $item = $this->m_kandidat->detail($id_kandidat);
      if ($item->foto_kandidat != null) {
         $target_file = 'foto/foto_kandidat/' . $item->foto_kandidat;
         unlink($target_file);
      }
      $data = [
         'id_kandidat' => $id_kandidat
      ];
      $this->m_kandidat->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('kandidat');
   }

   public function report()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Laporan Data Kandidat',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('kandidat/report', $data);
   }

   public function cetak()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Cetak Laporan Data Kandidat',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('kandidat/cetak', $data);
   }
}

/* End of file kandidat.php */
