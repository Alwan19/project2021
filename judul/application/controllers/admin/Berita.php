<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
  }

  public function index()
  {
    $berita = $this->berita_model->data();
    $data = [
      'title'   => 'Data Berita',
      'berita'  => $berita,
      'isi'     => 'admin/berita/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    $valid = $this->form_validation;

    $valid->set_rules('judul_berita', 'Judul Berita', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('isi', 'Isi', 'required', array(
      'required' => '%s Harus Diisi',
    ));

    if ($valid->run()) {

      if (!empty($_FILES['gambar']['name'])) {


        $config['upload_path']    = './assets/image/berita';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = '20000';
        $config['max_width']      = '20000';
        $config['max_height']     = '20000';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
          $data = array(
            'title'   => 'Tambah Data Berita',
            'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
            'isi'     => 'admin/berita/tambah'
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = array('upload' => $this->upload->data());

          $config['image_library']    =  'gd2';
          $config['source_image']     =  './assets/image/berita/' . $upload_data['upload']['file_name'];
          $config['quality']          =  "100%";
          $config['maintain_ratio']   =  TRUE;
          $config['width']            =  1000;
          $config['height']           =  500;
          $config['x_axis']           =  0;
          $config['y_axis']           =  0;
          $config['thumb_marker']     =  '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i = $this->input;
          $data = array(
            'slug_berita'        => url_title($i->post('judul_berita'), 'dash', TRUE),
            'judul_berita'       => $i->post('judul_berita'),
            'isi_berita'         => $i->post('isi'),
            'gambar'             => $upload_data['upload']['file_name'],
            'status_berita'      => $i->post('status_berita'),
            'jenis_berita'       => $i->post('jenis_berita')
          );

          $this->berita_model->tambah($data);
          $this->session->set_flashdata('sukses', ' Data Berhasil Ditambahkan.');
          redirect(base_url('admin/berita'), 'refresh');
        }
      } else {
        $i = $this->input;
        $data = array(
          'slug_berita'        => url_title($i->post('judul_berita'), 'dash', TRUE),
          'judul_berita'       => $i->post('judul_berita'),
          'isi_berita'         => $i->post('isi'),
          'status_berita'      => $i->post('status_berita'),
          'jenis_berita'       => $i->post('jenis_berita')
        );

        $this->berita_model->tambah($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan.');
        redirect(base_url('admin/berita'), 'refresh');
      }
    }
    $data = array(
      'title' => 'Tambah Data Berita',
      'isi' => 'admin/berita/tambah'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_berita)
  {
    $berita = $this->berita_model->detail($id_berita);
    $valid = $this->form_validation;

    $valid->set_rules('judul_berita', 'Judul Berita', 'required', array(
      'required' => '%s Harus Diisi'
    ));

    $valid->set_rules('isi', 'Isi', 'required', array(
      'required' => '%s Harus Diisi',
    ));

    if ($valid->run()) {

      if (!empty($_FILES['gambar']['name'])) {


        $config['upload_path']    = './assets/image/berita';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = '20000';
        $config['max_width']      = '20000';
        $config['max_height']     = '20000';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
          $data = array(
            'title'   => 'Edit Data Berita',
            'berita'  => $berita,
            'error'   => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
            'isi'     => 'admin/berita/edit'
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
          $upload_data = array('upload' => $this->upload->data());

          $config['image_library']    =  'gd2';
          $config['source_image']     =  './assets/image/berita/' . $upload_data['upload']['file_name'];
          $config['quality']          =  "100%";
          $config['maintain_ratio']   =  TRUE;
          $config['width']            =  1000;
          $config['height']           =  500;
          $config['x_axis']           =  0;
          $config['y_axis']           =  0;
          $config['thumb_marker']     =  '';
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i = $this->input;
          $data = array(
            'id_berita'          => $id_berita,
            'slug_berita'        => url_title($i->post('judul_berita'), 'dash', TRUE),
            'judul_berita'       => $i->post('judul_berita'),
            'isi_berita'         => $i->post('isi'),
            'gambar'             => $upload_data['upload']['file_name'],
            'status_berita'      => $i->post('status_berita'),
            'jenis_berita'       => $i->post('jenis_berita')
          );

          if ($berita->gambar != null) {
            unlink('./assets/image/berita/' . $berita->gambar);
          }

          $this->berita_model->edit($data);
          $this->session->set_flashdata('sukses', ' Data Berhasil Diedit.');
          redirect(base_url('admin/berita'), 'refresh');
        }
      } else {
        $i = $this->input;
        $data = array(
          'id_berita'          => $id_berita,
          'slug_berita'        => url_title($i->post('judul_berita'), 'dash', TRUE),
          'judul_berita'       => $i->post('judul_berita'),
          'isi_berita'         => $i->post('isi'),
          'status_berita'      => $i->post('status_berita'),
          'jenis_berita'       => $i->post('jenis_berita')
        );

        $this->berita_model->edit($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Diedit.');
        redirect(base_url('admin/berita'), 'refresh');
      }
    }
    $data = array(
      'title'   => 'Edit Data Berita',
      'berita'  => $berita,
      'isi'     => 'admin/berita/edit'
    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function delete($id_berita)
  {
    if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
      $this->session->set_flashdata('sukses', 'Silahkan Login Dulu');
      redirect(base_url('login'), 'refresh');
    }

    $berita = $this->berita_model->detail($id_berita);
    //End Proteksi
    $data = array('id_berita'  => $id_berita);
    if ($berita->gambar != null) {
      unlink('./assets/image/berita/' . $berita->gambar);
    }
    $this->berita_model->delete($data);
    $this->session->set_flashdata('sukses', 'Data Telah DiHapus');
    redirect(base_url('admin/berita'), 'refresh');
  }
}
