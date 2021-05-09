<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_mahasiswa', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_mahasiswa');
    $this->db->join('tb_dosen', 'tb_mahasiswa.id_dosen = tb_dosen.id_dosen');
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_mahasiswa)
  {
    $this->db->select('*');
    $this->db->from('tb_mahasiswa');
    $this->db->join('tb_dosen', 'tb_mahasiswa.id_dosen = tb_dosen.id_dosen');
    $this->db->where('id_mahasiswa', $id_mahasiswa);
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
    $this->db->update('tb_mahasiswa', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
    $this->db->delete('tb_mahasiswa', $data);
  }

  public function login($username, $password)
  {
    $this->db->select('*');
    $this->db->from('tb_mahasiswa');
    $this->db->where(array(
      'nim'   => $username,
      'password'  => sha1($password)
    ));
    $this->db->order_by('id_mahasiswa', 'desc');
    $query = $this->db->get();
    return $query->row();
  }
}
