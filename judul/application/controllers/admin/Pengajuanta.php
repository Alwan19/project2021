<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuanta extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mahasiswa_model');
    $this->load->model('pengajuan_model');
    $this->load->model('dosen_model');
  }

  public function index()
  {
    if ($this->session->userdata('akses_level') == 'Mahasiswa') {
      $id_user = $this->session->userdata('id_user');
      $pengajuan = $this->pengajuan_model->detaill($id_user);
    } else {
      $pengajuan = $this->pengajuan_model->data();
    }
    $data = [
      'title' => 'Data Pengajuan TA',
      'pengajuan'  => $pengajuan,
      'isi'   => 'admin/pengajuanta/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    if ($this->session->userdata('akses_level') == 'Mahasiswa') {
      $id_mahasiswa = $this->session->userdata('id_user');
      $mhs = $this->mahasiswa_model->detail($id_mahasiswa);
    } else {
      $mhs = $this->mahasiswa_model->data();
    }
    $dosen = $this->dosen_model->data();
    $dosenn = $this->dosen_model->data();

    $valid = $this->form_validation;

    $valid->set_rules('bidang_ta', 'Bidang TA', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run()) {

      if (!empty($_FILES['kwitansi_ta']['name']) && !empty($_FILES['krs']['name'])) {

        if (!empty($_FILES['kwitansi_ta']['name'])) {
          $config['upload_path']          = './assets/kwitansi/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          $config['max_size']             = 2048;
          $config['remove_space']         = TRUE;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('kwitansi_ta')) {
            $kwitansi = array('uploads' => $this->upload->data());

            $config['image_library']    =  'gd2';
            $config['source_image']     =  './assets/kwitansi/' . $kwitansi['uploads']['file_name'];
            $config['quality']          =  "100%";
            $config['maintain_ratio']   =  TRUE;
            $config['width']            =  360;
            $config['height']           =  360;
            $config['x_axis']           =  0;
            $config['y_axis']           =  0;
            $config['thumb_marker']     =  '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
          } else {
            $data = [
              'title'     => 'Tambah Data Pengajuan Judul TA',
              'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
              'mhs'       => $mhs,
              'dosen'     => $dosen,
              'dosenn'     => $dosenn,
              'isi'       => 'admin/pengajuanta/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data, false);
          }
        } else {
          $this->session->set_flashdata('sukses', 'Kwitansi harus diisi');
          redirect(base_url('admin/pengajuanta/tambah'), 'refresh');
        }

        if (!empty($_FILES['krs']['name'])) {
          $config['upload_path']          = './assets/krs/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          $config['max_size']             = 2048;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('krs')) {
            $krs = array('uploads' => $this->upload->data());

            $config['image_library']    =  'gd2';
            $config['source_image']     =  './assets/krs/' . $krs['uploads']['file_name'];
            $config['quality']          =  "100%";
            $config['maintain_ratio']   =  TRUE;
            $config['width']            =  360;
            $config['height']           =  360;
            $config['x_axis']           =  0;
            $config['y_axis']           =  0;
            $config['thumb_marker']     =  '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
          } else {
            $data = [
              'title'     => 'Tambah Data Pengajuan Judul TA',
              'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
              'mhs'       => $mhs,
              'dosen'     => $dosen,
              'dosenn'     => $dosenn,
              'isi'       => 'admin/pengajuanta/tambah'
            ];
            $this->load->view('admin/layout/wrapper', $data, false);
          }
        } else {
          $this->session->set_flashdata('sukses', 'KRS harus diisi');
          redirect(base_url('admin/pengajuanta/tambah'), 'refresh');
        }

        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_mahasiswa'        => $i->post('id_mahasiswa'),
            'id_user'             => $this->session->userdata('id_user'),
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'krs'                 => $krs['uploads']['file_name'],
            'alasan'              => $i->post('alasan')
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_mahasiswa'        => $i->post('id_mahasiswa'),
            'id_user'             => $this->session->userdata('id_user'),
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'krs'                 => $krs['uploads']['file_name'],
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'alasan'              => $i->post('alasan'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'             => $i->post('tgl_acc')
          ];
        }

        $this->pengajuan_model->tambah($data);
        $this->session->set_flashdata('sukses', 'data telah ditambahkan');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      } else {
        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_mahasiswa'        => $i->post('id_mahasiswa'),
            'id_user'             => $this->session->userdata('id_user'),
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'alasan'              => $i->post('alasan')
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_mahasiswa'        => $i->post('id_mahasiswa'),
            'id_user'             => $this->session->userdata('id_user'),
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'            => $i->post('tgl_acc')
          ];
        }

        $this->pengajuan_model->tambah($data);
        $this->session->set_flashdata('sukses', 'data telah ditambahkan');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      }
    } else {
      $data = [
        'title'     => 'Tambah Data Pengajuan Judul TA',
        'mhs'       => $mhs,
        'dosen'     => $dosen,
        'dosenn'     => $dosenn,
        'isi'       => 'admin/pengajuanta/tambah'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    }
  }

  public function edit($id_pengajuan)
  {

    if ($this->session->userdata('akses_level') == 'Mahasiswa') {
      $id_mahasiswa = $this->session->userdata('id_user');
      $mhs = $this->mahasiswa_model->detail($id_mahasiswa);
    } else {
      $mhs = $this->mahasiswa_model->data();
    }

    $pengajuan = $this->pengajuan_model->detailedit($id_pengajuan);

    $dosen = $this->dosen_model->data();
    $dosenn = $this->dosen_model->data();

    $valid = $this->form_validation;

    $valid->set_rules('bidang_ta', 'Bidang TA', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    if ($valid->run()) {

      if (!empty($_FILES['kwitansi_ta']['name']) && !empty($_FILES['krs']['name'])) {

        if (!empty($_FILES['kwitansi_ta']['name'])) {
          $config['upload_path']          = './assets/kwitansi/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          $config['max_size']             = 2048;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('kwitansi_ta')) {
            $kwitansi = array('uploads' => $this->upload->data());

            $config['image_library']    =  'gd2';
            $config['source_image']     =  './assets/kwitansi/' . $kwitansi['uploads']['file_name'];
            $config['quality']          =  "100%";
            $config['maintain_ratio']   =  TRUE;
            $config['width']            =  360;
            $config['height']           =  360;
            $config['x_axis']           =  0;
            $config['y_axis']           =  0;
            $config['thumb_marker']     =  '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
          } else {
            $data = [
              'title'     => 'Edit Data Pengajuan Judul TA',
              'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
              'mhs'       => $mhs,
              'pengajuan' => $pengajuan,
              'dosen'     => $dosen,
              'dosenn'    => $dosenn,
              'isi'       => 'admin/pengajuanta/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, false);
          }
        }

        if (!empty($_FILES['krs']['name'])) {
          $config['upload_path']          = './assets/krs/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          $config['max_size']             = 2048;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('krs')) {
            $krs = array('uploads' => $this->upload->data());

            $config['image_library']    =  'gd2';
            $config['source_image']     =  './assets/krs/' . $krs['uploads']['file_name'];
            $config['quality']          =  "100%";
            $config['maintain_ratio']   =  TRUE;
            $config['width']            =  360;
            $config['height']           =  360;
            $config['x_axis']           =  0;
            $config['y_axis']           =  0;
            $config['thumb_marker']     =  '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
          } else {
            $data = [
              'title'     => 'Edit Data Pengajuan Judul TA',
              'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
              'mhs'       => $mhs,
              'pengajuan' => $pengajuan,
              'dosen'     => $dosen,
              'dosenn'    => $dosenn,
              'isi'       => 'admin/pengajuanta/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, false);
          }
        }

        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'krs'                 => $krs['uploads']['file_name'],
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'krs'                 => $krs['uploads']['file_name'],
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'alasan'              => $i->post('alasan'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'             => $i->post('tgl_acc')
          ];
        }

        if ($pengajuan->kwitansi_ta != null) {
          unlink('assets/kwitansi/' . $pengajuan->kwitansi_ta);
        }
        if ($pengajuan->krs != null) {
          unlink('assets/krs/' . $pengajuan->krs);
        }

        $this->pengajuan_model->edit($data);
        $this->session->set_flashdata('sukses', 'data telah diedit');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      } elseif (!empty($_FILES['kwitansi_ta']['name'])) {
        $config['upload_path']          = './assets/kwitansi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('kwitansi_ta')) {
          $kwitansi = array('uploads' => $this->upload->data());

          $config['image_library']    =  'gd2';
          $config['source_image']     =  './assets/kwitansi/' . $kwitansi['uploads']['file_name'];
          $config['quality']          =  "100%";
          $config['maintain_ratio']   =  TRUE;
          $config['width']            =  360;
          $config['height']           =  360;
          $config['x_axis']           =  0;
          $config['y_axis']           =  0;
          $config['thumb_marker']     =  '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
        }
        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'kwitansi_ta'         => $kwitansi['uploads']['file_name'],
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'alasan'              => $i->post('alasan'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'            => $i->post('tgl_acc')
          ];
        }

        if ($pengajuan->kwitansi_ta != null) {
          unlink('assets/kwitansi/' . $pengajuan->kwitansi_ta);
        }

        $this->pengajuan_model->edit($data);
        $this->session->set_flashdata('sukses', 'data telah diedit');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      } elseif (!empty($_FILES['krs']['name'])) {
        $config['upload_path']          = './assets/krs/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('krs')) {
          $krs = array('uploads' => $this->upload->data());

          $config['image_library']    =  'gd2';
          $config['source_image']     =  './assets/krs/' . $krs['uploads']['file_name'];
          $config['quality']          =  "100%";
          $config['maintain_ratio']   =  TRUE;
          $config['width']            =  360;
          $config['height']           =  360;
          $config['x_axis']           =  0;
          $config['y_axis']           =  0;
          $config['thumb_marker']     =  '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
        } else {
          $data = [
            'title'     => 'Edit Data Pengajuan TA',
            'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
            'mhs'       => $mhs,
            'pengajuan' => $pengajuan,
            'dosen'     => $dosen,
            'dosenn'    => $dosenn,
            'isi'       => 'admin/pengajuanta/edit'
          ];
          $this->load->view('admin/layout/wrapper', $data, false);
        }

        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'krs'                 => $krs['uploads']['file_name'],
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'krs'                 => $krs['uploads']['file_name'],
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'alasan'              => $i->post('alasan'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'            => $i->post('tgl_acc')
          ];
        }

        if ($pengajuan->krs != null) {
          unlink('assets/krs/' . $pengajuan->krs);
        }

        $this->pengajuan_model->edit($data);
        $this->session->set_flashdata('sukses', 'data telah diedit');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      } else {
        if ($this->session->userdata('akses_level') == 'Mahasiswa') {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
          ];
        } else {
          $i = $this->input;
          $data = [
            'id_pengajuan'        => $id_pengajuan,
            'bidang_ta'           => $i->post('bidang_ta'),
            'judul_ta'            => $i->post('judul_ta'),
            'alasan'              => $i->post('alasan'),
            'pembimbing1'         => $i->post('pembimbing1'),
            'pembimbing2'         => $i->post('pembimbing2'),
            'status'              => $i->post('status'),
            'keterangan'          => $i->post('keterangan'),
            'tgl_acc'            => $i->post('tgl_acc')
          ];
        }

        $this->pengajuan_model->edit($data);
        $this->session->set_flashdata('sukses', 'data telah diedit');
        redirect(base_url('admin/pengajuanta'), 'refresh');
      }
    } else {
      $data = [
        'title'     => 'Edit Data Pengajuan TA',
        'mhs'       => $mhs,
        'pengajuan' => $pengajuan,
        'dosen'     => $dosen,
        'dosenn'    => $dosenn,
        'isi'       => 'admin/pengajuanta/edit'
      ];
      $this->load->view('admin/layout/wrapper', $data, false);
    }
  }

  public function delete($id_pengajuan)
  {
    //Proteksi Hapus Disini
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }

    $pengajuan = $this->pengajuan_model->detail($id_pengajuan);
    //End Proteksi
    $data = array('id_pengajuan'  => $id_pengajuan);
    $this->pengajuan_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data Telah DiHapus');
    redirect(base_url('admin/pengajuanta'), 'refresh');
  }

  public function kwitansi($id_pengajuan)
  {
    $kwitansi = $this->pengajuan_model->download($id_pengajuan);
    $folder  = './assets/kwitansi/';
    $file   = $kwitansi->kwitansi_ta;
    force_download($folder . $file, NULL);
  }

  public function krs($id_pengajuan)
  {
    $krs = $this->pengajuan_model->download($id_pengajuan);
    $folder  = './assets/krs/';
    $file   = $krs->krs;
    force_download($folder . $file, NULL);
  }
}
