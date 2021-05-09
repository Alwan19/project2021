<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_link', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_link');
    $this->db->order_by('id_link', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function link()
  {
    $this->db->select('*');
    $this->db->from('tb_link');
    $this->db->order_by('id_link', 'asc');
    $this->db->limit(9);
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_link)
  {
    $this->db->select('*');
    $this->db->from('tb_link');
    $this->db->where('id_link', $id_link);
    $this->db->order_by('id_link', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_link', $data['id_link']);
    $this->db->update('tb_link', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_link', $data['id_link']);
    $this->db->delete('tb_link', $data);
  }
}
