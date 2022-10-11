<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
         'title' => 'Dashboard',
         'total_user' => $this->db->get('user')->num_rows(),
         'total_kandidat' => $this->db->get('kandidat')->num_rows(),
         'total_pemilih' => $this->db->get('pemilih')->num_rows(),
         'total_pilih' => $this->db->get('pilih')->num_rows(),
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('dashboard', $data);
   }

   public function report()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Laporan Perhitungan Suara',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('pilih/report', $data);
   }

   public function cetak()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Cetak Laporan Perhitungan Suara',
         'kandidat' => $this->m_kandidat->list()
      ];
      $this->load->view('pilih/cetak', $data);
   }
}
