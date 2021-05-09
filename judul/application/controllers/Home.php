<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('link_model');
    $this->load->model('pengajuan_model');
  }

  public function index()
  {
    $berita = $this->berita_model->berita();
    $slider = $this->berita_model->slider();
    $link   = $this->link_model->link();
    $data = [
      'title'   => 'Pengajuan Judul TA',
      'slider'  => $slider,
      'berita'  => $berita,
      'link'    => $link,
      'isi'     => 'home/isi/data'
    ];
    $this->load->view('home/layout/wrapper', $data, false);
  }

  public function panduan()
  {
    $data = [
      'title'   => 'Buku Panduan TA',
      'isi'     => 'home/isi/panduan'
    ];
    $this->load->view('home/layout/wrap', $data, false);
  }

  public function hasil()
  {
    $pengajuan = $this->pengajuan_model->hasil();
    $data = [
      'title'     => 'Pengumunan Hasil Judul',
      'pengajuan' => $pengajuan,
      'isi'       => 'home/isi/hasil'
    ];
    $this->load->view('home/layout/wrap', $data, false);
  }

  public function contact()
  {
    $data = [
      'title'   => 'Contact',
      'isi'     => 'home/isi/contact'
    ];
    $this->load->view('home/layout/wrap', $data, false);
  }

  public function readberita($slug_berita)
  {
    $berita = $this->berita_model->readberita($slug_berita);
    $berita_lain = $this->berita_model->berita_lain();
    $data = [
      'title'         => 'Detail Berita',
      'berita'        => $berita,
      'berita_lain'   => $berita_lain,
      'isi'           => 'home/read/berita'
    ];
    $this->load->view('home/layout/wrap', $data, FALSE);
  }

  public function readslider($slug_berita)
  {
    $berita = $this->berita_model->readslider($slug_berita);
    $berita_lain = $this->berita_model->slider_lain();
    $data = [
      'title'         => 'Detail Berita',
      'berita'        => $berita,
      'berita_lain'   => $berita_lain,
      'isi'           => 'home/read/berita'
    ];
    $this->load->view('home/layout/wrap', $data, FALSE);
  }

  public function keyword()
  {
    $pengajuan = $this->pengajuan_model->hasil();
    $valid   = $this->form_validation;

    $valid->set_rules(
      'keyword',
      'Masukkan Judul',
      'required',
      array('required'    => '% harus diisi')
    );

    if ($valid->run()) {
      $cari     = strip_tags($this->input->post('keyword'));
      $keywords  = str_replace(' ', '-', $cari);
      redirect(base_url('home/hasil/' . $keywords), 'refresh');
    }
    // End Validasi

    $data = array(
      'title'    => 'Pengumuman Hasil Judul',
      'pengajuan'     => $pengajuan,
      'isi'    => 'home/hasil'
    );
    $this->load->view('home/layout/wrap', $data, FALSE);
  }

  public function cari($keywords)
  {
    $keywords   = str_replace('-', ' ', strip_tags($keywords));
    $pengajuan     = $this->pengajuan_model->cari($keywords);

    $data = array(
      'title'         => 'Hasil Pencarian: ' . $keywords,
      'pengajuan'     =>  $pengajuan,
      'keywords'      =>  $keywords,
      'isi'           => 'home/hasil'
    );
    $this->load->view('home/layout/wrap', $data, FALSE);
  }
}
