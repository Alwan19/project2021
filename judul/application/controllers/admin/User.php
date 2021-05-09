<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  // Load Model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    if ($this->session->userdata('akses_level') != 'Admin') {
      redirect(base_url('login/logout'), 'refresh');
      $this->session->set_flashdata('sukses', 'hak akses anda tidak diijinkan');
      redirect(base_url('login'), 'refresh');
    }
  }

  //Halaman Utama
  public function index()
  {
    $user = $this->user_model->data();
    $data = array(
      'title' => 'Data user(' . count($user) . ' Data)',
      'user' => $user,
      'isi' => 'admin/user/data'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }


  public function tambah()
  {
    //Validasi
    $valid = $this->form_validation;
    $valid->set_rules('nama', 'Nama', 'required', array(
      'required'      => 'Nama harus diisi'
    ));

    $valid->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', array(
      'required'      => 'Username harus diisi', 'is_unique'    => 'Username <strong>' . $this->input->post('username') . '&nbsp;sudah ada. Buat username baru'
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
        'title' => 'Tambah Data User',
        'isi' => 'admin/user/tambah'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;
      $data = array(

        'nama'        => $i->post('nama'),
        'username'    => $i->post('username'),
        'password'    => sha1($i->post('password')),
        'akses_level' => $i->post('akses_level'),

      );

      $this->user_model->tambah($data);
      $this->session->set_flashdata('sukses', 'data telah ditambah');
      redirect(base_url('admin/user'), 'refresh');
    }
  }

  //Halaman Edit
  public function edit($id_user)
  {
    $user = $this->user_model->detail($id_user);
    //Validasi
    $valid = $this->form_validation;
    $valid->set_rules('nama', 'Nama', 'required', array(
      'required'      => 'Nama harus diisi'
    ));

    $valid->set_rules('username', 'Username', 'required', array(
      'required'      => 'Username harus diisi',
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
        'title' => 'Edit Data User',
        'user' => $user,
        'isi' => 'admin/user/edit'
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    } else {
      $i = $this->input;

      if (strlen($i->post('password')) < 20) {
        $data = array(

          'id_user'     => $id_user,
          'nama'        => $i->post('nama'),
          'username'    => $i->post('username'),
          'password'    => sha1($i->post('password')),
          'akses_level' => $i->post('akses_level'),

        );
      } else {
        $data = array(

          'id_user'     => $id_user,
          'nama'        => $i->post('nama'),
          'username'    => $i->post('username'),
          'password'    => $i->post('password'),
          'akses_level' => $i->post('akses_level'),

        );
      }

      $this->user_model->edit($data);
      $this->session->set_flashdata('sukses', 'data telah diedit');
      redirect(base_url('admin/user'), 'refresh');
    }
  }
  public function delete($id_user)
  {
    //Proteksi Hapus disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }
    //Proses Hapus Gambar
    $user = $this->user_model->detail($id_user);
    //End Proteksi
    $data = array('id_user'  => $id_user);
    $this->user_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data Telah DiHapus');
    redirect(base_url('admin/user'), 'refresh');
  }
  public function detail($id_user)
  {
    //Proteksi Hapus Disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }
    //Proses Hapus Gambar
    $user = $this->user_model->detail($id_user);

    //End Proteksi
    $data = array('id_user'  => $id_user);

    redirect(base_url('admin/user'), 'refresh');
  }
}

/* End of file User.php */
/* Location: ./application/controllers/Admin/User.php */