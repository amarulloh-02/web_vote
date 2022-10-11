<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemilih extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('pemilih');
      $this->db->order_by('id_pemilih', 'desc');
      return $this->db->get()->result();
   }

   public function login($username, $password)
   {
      $this->db->select('*');
      $this->db->from('pemilih');
      $this->db->where([
         'username' => $username,
         'password' => $password
      ]);
      return $this->db->get()->row();
   }

   public function input($data)
   {
      $this->db->insert('pemilih', $data);
   }

   public function detail($id_pemilih)
   {
      $this->db->select('*');
      $this->db->from('pemilih');
      $this->db->where('id_pemilih', $id_pemilih);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_pemilih', $data['id_pemilih']);
      $this->db->update('pemilih', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_pemilih', $data['id_pemilih']);
      $this->db->delete('pemilih', $data);
   }
}

/* End of file M_rumahsakit.php */
