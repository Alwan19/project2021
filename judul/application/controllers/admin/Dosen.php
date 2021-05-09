<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('dosen_model');
  }
  public function index()
  {
    $dosen = $this->dosen_model->data();
    $data = [
      'title' => 'Data Dosen',
      'dosen' => $dosen,
      'isi'   => 'admin/dosen/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    $valid = $this->form_validation;

    $valid->set_rules('nidn', 'NIDN', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('nama_dosen', 'Nama Dosen', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('bidang_dosen', 'Bidang Dosen', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('kontak', 'Kontak', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run() === false) {

      $data = [
        'title'    => 'Tambah Data Dosen',
        'isi'      => 'admin/dosen/tambah'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    } else {
      $i = $this->input;
      $data = array(
        'nidn_dosen'            => $i->post('nidn'),
        'nama_dosen'            => $i->post('nama_dosen'),
        'bidang_dosen'            => $i->post('bidang_dosen'),
        'kontak_dosen'                => $i->post('kontak')
      );

      $this->dosen_model->tambah($data);
      $this->session->set_flashdata('sukses', 'Data telah ditambahkan');
      redirect(base_url('admin/dosen'), 'refresh');
    }
  }

  public function edit($id_dosen)
  {
    $dosen = $this->dosen_model->detail($id_dosen);
    $valid = $this->form_validation;

    $valid->set_rules('nidn', 'NIDN', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('nama_dosen', 'Nama Dosen', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('bidang_dosen', 'Bidang Dosen', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('kontak', 'Kontak', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run() === false) {

      $data = [
        'title'    => 'Edit Data Dosen',
        'dosen'     => $dosen,
        'isi'      => 'admin/dosen/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    } else {
      $i = $this->input;
      $data = array(
        'id_dosen'            => $id_dosen,
        'nidn_dosen'            => $i->post('nidn'),
        'nama_dosen'            => $i->post('nama_dosen'),
        'bidang_dosen'            => $i->post('bidang_dosen'),
        'kontak_dosen'                => $i->post('kontak')
      );

      $this->dosen_model->edit($data);
      $this->session->set_flashdata('sukses', 'Data telah diedit');
      redirect(base_url('admin/dosen'), 'refresh');
    }
  }
  public function delete($id_dosen)
  {
    //Proteksi Hapus Disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }

    $dosen = $this->dosen_model->detail($id_dosen);
    //End Proteksi
    $data = array('id_dosen'  => $id_dosen);
    $this->dosen_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data Telah DiHapus');
    redirect(base_url('admin/dosen'), 'refresh');
  }
}
