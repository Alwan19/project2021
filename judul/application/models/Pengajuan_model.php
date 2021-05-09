<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_pengajuan', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa', 'left');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function hasil()
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa', 'left');
    $this->db->where('status', 'Diterima');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function cari($keywords)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa', 'left');
    $this->db->where('status', 'Diterima');
    $this->db->where('tb_mahasiswa.nim', $keywords);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_user)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa');
    $this->db->where('id_user', $id_user);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  public function download($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa');
    $this->db->where('id_pengajuan', $id_pengajuan);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  public function detaill($id_user)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa');
    $this->db->where('id_user', $id_user);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function detailedit($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa');
    $this->db->where('id_pengajuan', $id_pengajuan);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_pengajuan', $data['id_pengajuan']);
    $this->db->update('tb_pengajuan', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_pengajuan', $data['id_pengajuan']);
    $this->db->delete('tb_pengajuan', $data);
  }
}

/* End of file Pengajuan_model.php */
/* Location: ./application/models/Pengajuan_model.php */