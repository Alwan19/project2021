<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa_model');
    $this->load->model('dosen_model');
  }

  public function index()
  {
    if ($this->session->userdata('akses_level') == 'Mahasiswa') {
      $id_mahasiswa = $this->session->userdata('id_user');
      $mhs = $this->mahasiswa_model->detail($id_mahasiswa);
    } else {
      $mhs = $this->mahasiswa_model->data();
    }

    $data = [
      'title' => 'Data Mahasiswa',
      'mhs' => $mhs,
      'isi'   => 'admin/mahasiswa/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    $dosen = $this->dosen_model->data();

    //Validasi
    $valid = $this->form_validation;
    $valid->set_rules('nama', 'Nama Mahasiswa', 'required', array(
      'required'      => 'Nama harus diisi'
    ));

    $valid->set_rules('password', 'Password', 'required|min_length[6]|matches[ulangi_password]', array(
      'required'      => 'Password harus diisi',
      'min_length'    => 'Password minimal 6 karakter',
      'matches'       => 'Password tidak sama'
    ));

    $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|min_length[6]|matches[password]', array(
      'required'      => 'Password harus diisi',
      'min_length'    => 'Password minimal 6 karakter',
      'matches'       => 'Password tidak sama'
    ));


    if ($valid->run() == FALSE) {

      $data = array(
        'title' => 'Tambah Data Mahasiswa',
        'dosen' => $dosen,
        'isi' => 'admin/mahasiswa/tambah'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;

      if (strlen($i->post('password')) < 20) {
        $data = array(

          'nim'               => $i->post('nim'),
          'nama_mahasiswa'    => $i->post('nama'),
          'tempat_lahir'      => $i->post('tempat_lahir'),
          'tanggal_lahir'     => $i->post('tgl_lahir'),
          'nomor_ponsel'      => $i->post('no_hp'),
          'email'             => $i->post('email'),
          'jenis_kelamin'     => $i->post('jenis_kelamin'),
          'agama'             => $i->post('agama'),
          'id_dosen'          => $i->post('id_dosen'),
          'password'          => sha1($i->post('password')),

        );
      } else {
        $data = array(
          'nim'               => $i->post('nim'),
          'nama_mahasiswa'    => $i->post('nama'),
          'tempat_lahir'      => $i->post('tempat_lahir'),
          'tanggal_lahir'     => $i->post('tgl_lahir'),
          'nomor_ponsel'      => $i->post('no_hp'),
          'email'             => $i->post('email'),
          'jenis_kelamin'     => $i->post('jenis_kelamin'),
          'agama'             => $i->post('agama'),
          'id_dosen'          => $i->post('id_dosen'),
          'password'          => $i->post('password'),

        );
      }

      $this->mahasiswa_model->tambah($data);
      $this->session->set_flashdata('sukses', 'data telah ditambah');
      redirect(base_url('admin/mahasiswa'), 'refresh');
    }
  }

  public function edit($id_mahasiswa)
  {
    $mhs = $this->mahasiswa_model->detail($id_mahasiswa);
    $dosen = $this->dosen_model->data();

    //Validasi
    $valid = $this->form_validation;
    $valid->set_rules('nama', 'Nama Mahasiswa', 'required', array(
      'required'      => 'Nama harus diisi'
    ));

    $valid->set_rules('password', 'Password', 'required|min_length[6]|matches[ulangi_password]', array(
      'required'      => 'Password harus diisi',
      'min_length'    => 'Password minimal 6 karakter',
      'matches'       => 'Password tidak sama'
    ));

    $valid->set_rules('ulangi_password', 'Ulangi Password', 'required|min_length[6]|matches[password]', array(
      'required'      => 'Password harus diisi',
      'min_length'    => 'Password minimal 6 karakter',
      'matches'       => 'Password tidak sama'
    ));


    if ($valid->run() == FALSE) {

      $data = array(
        'title' => 'Edit Data Mahasiswa',
        'mhs' => $mhs,
        'dosen' => $dosen,
        'isi' => 'admin/mahasiswa/edit'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;

      if (strlen($i->post('password')) < 20) {
        $data = array(

          'id_mahasiswa'      => $id_mahasiswa,
          'nim'               => $i->post('nim'),
          'nama_mahasiswa'    => $i->post('nama'),
          'tempat_lahir'      => $i->post('tempat_lahir'),
          'tanggal_lahir'     => $i->post('tgl_lahir'),
          'nomor_ponsel'      => $i->post('no_hp'),
          'email'             => $i->post('email'),
          'jenis_kelamin'     => $i->post('jenis_kelamin'),
          'agama'             => $i->post('agama'),
          'id_dosen'          => $i->post('id_dosen'),
          'password'          => sha1($i->post('password')),

        );
      } else {
        $data = array(
          'id_mahasiswa'      => $id_mahasiswa,
          'nim'               => $i->post('nim'),
          'nama_mahasiswa'    => $i->post('nama'),
          'tempat_lahir'      => $i->post('tempat_lahir'),
          'tanggal_lahir'     => $i->post('tgl_lahir'),
          'nomor_ponsel'      => $i->post('no_hp'),
          'email'             => $i->post('email'),
          'jenis_kelamin'     => $i->post('jenis_kelamin'),
          'agama'             => $i->post('agama'),
          'id_dosen'          => $i->post('id_dosen'),
          'password'          => $i->post('password'),

        );
      }

      $this->mahasiswa_model->edit($data);
      $this->session->set_flashdata('sukses', 'data telah diedit');
      redirect(base_url('admin/mahasiswa'), 'refresh');
    }
  }

  public function delete($id_mahasiswa)
  {
    //Proteksi Hapus disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->userdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }
    //Proses Hapus Gambar
    $mhs = $this->mahasiswa_model->detail($id_mahasiswa);
    //End Proteksi
    $data = array('id_mahasiswa'  => $id_mahasiswa);
    $this->mahasiswa_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data Telah DiHapus');
    redirect(base_url('admin/mahasiswa'), 'refresh');
  }

  public function detail($id_mahasiswa)
  {
    //Proteksi Hapus Disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }
    //Proses Hapus Gambar
    $mhs = $this->mahasiswa_model->detail($id_mahasiswa);

    //End Proteksi
    $data = array('id_mahasiswa'  => $id_mahasiswa);
    $this->mahasiswa_model->delete($data);
    redirect(base_url('admin/mahasiswa'), 'refresh');
  }
}
