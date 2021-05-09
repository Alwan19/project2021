<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_user', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_user)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user', $id_user);
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('tb_user', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_user', $data['id_user']);
    $this->db->delete('tb_user', $data);
  }

  public function login($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where(array(
      'username'   => $username,
      'password'  => sha1($password)
    ));
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->row();
  }
}
