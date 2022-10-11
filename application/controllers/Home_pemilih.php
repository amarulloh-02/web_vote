<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_pemilih extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_kandidat');
   }

   public function index()
   {
      $this->pemilih_login->cek_login();
      $data = [
         'title' => 'Dashboard Pemilih',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('dashboard_pemilih', $data);
   }
   public function pilih()
   {
      $this->pemilih_login->cek_login();
      $pemilih = $this->session->userdata('id_pemilih');
      $cek = $this->db->get_where('pilih', ['id_pemilih' => $pemilih]);
      $banyak = $cek->num_rows();
      if ($banyak >= 1) {
         $this->session->set_flashdata('gagal', 'Anda sudah melakukan pemilihan, terima kasih');
         redirect('home_pemilih');
      } else {
         $data = [
            'title' => 'Pilih Kandidat',
            'kandidat' => $this->m_kandidat->list()
         ];
         $this->load->view('pilih/list', $data);
      }
   }

   public function simpan($id)
   {
      $this->pemilih_login->cek_login();
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');
      $pemilih = $this->session->userdata('id_pemilih');
      $data = [
         'id_kandidat' => $id,
         'id_pemilih' => $pemilih,
         'tgl_rekam' => $now
      ];
      $this->db->insert('pilih', $data);
      $this->session->set_flashdata('sukses', 'Anda berhasil melakukan pemilihan, terima kasih');
      redirect('home_pemilih');
   }
}
