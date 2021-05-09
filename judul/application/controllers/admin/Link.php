<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('link_model');
  }

  public function index()
  {
    $link = $this->link_model->data();
    $data = [
      'title'   => 'Data Link',
      'link'    => $link,
      'isi'     => 'admin/link/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    $valid = $this->form_validation;

    $valid->set_rules('nama_link', 'Nama Link', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('link', 'URL', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run() === false) {

      $data = [
        'title'    => 'Tambah Data Link',
        'isi'      => 'admin/link/tambah'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    } else {
      $i = $this->input;
      $data = array(
        'nama_link'          => $i->post('nama_link'),
        'link'                 => $i->post('link')
      );

      $this->link_model->tambah($data);
      $this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan.');
      redirect(base_url('admin/link'), 'refresh');
    }
  }

  public function edit($id_link)
  {
    $link = $this->link_model->detail($id_link);
    $valid = $this->form_validation;

    $valid->set_rules('nama_link', 'Nama Link', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('link', 'URL', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run() === false) {

      $data = [
        'title'   => 'Edit Data Link',
        'link'    => $link,
        'isi'     => 'admin/link/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    } else {
      $i = $this->input;
      $data = array(
        'id_link'            => $id_link,
        'nama_link'          => $i->post('nama_link'),
        'link'                => $i->post('link')
      );

      $this->link_model->edit($data);
      $this->session->set_flashdata('sukses', 'Data Berhasil Diedit.');
      redirect(base_url('admin/link'), 'refresh');
    }
  }

  public function delete($id_link)
  {
    //Proteksi Hapus Disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }
    //Proses Hapus Gambar
    $mhs = $this->link_model->detail($id_link);

    //End Proteksi
    $data = array('id_link'  => $id_link);
    $this->link_model->delete($data);
    redirect(base_url('admin/link'), 'refresh');
  }
}
