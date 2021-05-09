<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //tambah
  public function tambah($data)
  {
    $this->db->insert('tb_berita', $data);
  }

  //listing
  public function data()
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->order_by('id_berita', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function slider()
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'jenis_berita'    => 'slider',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  public function berita()
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'jenis_berita'    => 'berita',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }

  //detail
  public function detail($id_berita)
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where('id_berita', $id_berita);
    $this->db->order_by('id_berita', 'desc');
    $query = $this->db->get();
    return $query->row();
  }

  //edit
  public function edit($data)
  {
    $this->db->where('id_berita', $data['id_berita']);
    $this->db->update('tb_berita', $data);
  }

  //delete
  public function delete($data)
  {
    $this->db->where('id_berita', $data['id_berita']);
    $this->db->delete('tb_berita', $data);
  }

  public function readberita($slug_berita)
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'slug_berita'    => $slug_berita,
        'jenis_berita'    => 'berita',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function berita_lain()
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'jenis_berita'    => 'berita',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
  }

  public function readslider($slug_berita)
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'slug_berita'    => $slug_berita,
        'jenis_berita'    => 'slider',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result();
  }

  public function slider_lain()
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where(
      [
        'jenis_berita'    => 'slider',
        'status_berita'  => 'publish'
      ]
    );
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result();
  }
}
