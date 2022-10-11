<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kandidat extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('kandidat');
      $this->db->order_by('id_kandidat', 'asc');
      return $this->db->get()->result();
   }

   public function input($data)
   {
      $this->db->insert('kandidat', $data);
   }

   public function detail($id_kandidat)
   {
      $this->db->select('*');
      $this->db->from('kandidat');
      $this->db->where('id_kandidat', $id_kandidat);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_kandidat', $data['id_kandidat']);
      $this->db->update('kandidat', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_kandidat', $data['id_kandidat']);
      $this->db->delete('kandidat', $data);
   }
}

/* End of file M_rumahsakit.php */
