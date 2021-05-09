<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_dosen', 'tb_pengajuan.pembimbing1 = tb_dosen.id_dosen', 'left');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa', 'left');
    // $this->db->join('tb_dosen', 'tb_pengajuan.pembimbing2 = tb_dosen.id_dosen', 'left');
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function filter($tgl_awal, $tgl_akhir)
  {
    $this->db->select('*');
    $this->db->from('tb_pengajuan');
    $this->db->join('tb_dosen', 'tb_pengajuan.pembimbing1 = tb_dosen.id_dosen', 'left');
    $this->db->join('tb_mahasiswa', 'tb_pengajuan.id_mahasiswa = tb_mahasiswa.id_mahasiswa', 'left');
    // $this->db->join('tb_dosen', 'tb_pengajuan.pembimbing2 = tb_dosen.id_dosen', 'left');
    $this->db->where('tgl_acc >=', $tgl_awal);
    $this->db->where('tgl_acc <=', $tgl_akhir);
    $this->db->order_by('id_pengajuan', 'desc');
    $query = $this->db->get();
    return $query->result();
  }
}
