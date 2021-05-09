<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_dosen', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_dosen');
    $this->db->order_by('id_dosen', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_dosen)
  {
    $this->db->select('*');
    $this->db->from('tb_dosen');
    $this->db->where('id_dosen', $id_dosen);
    $this->db->order_by('id_dosen', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_dosen', $data['id_dosen']);
    $this->db->update('tb_dosen', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_dosen', $data['id_dosen']);
    $this->db->delete('tb_dosen', $data);
  }
}
