<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporan_model');
    $this->load->model('mahasiswa_model');
    $this->load->model('dosen_model');
  }


  public function index()
  {
    if (isset($_POST['filter'])) {

      $valid = $this->form_validation;

      $valid->set_rules('tgl_awal', 'Tanggal Awal', 'required', array(
        'required' => '%s Harus Diisi'
      ));
      $valid->set_rules('tgl_akhir', 'Tanggal Akhir', 'required', array(
        'required' => '%s Harus Diisi'
      ));
      if ($valid->run() === false) {

        $laporan = $this->laporan_model->data();
        $data = [
          'title'   => 'Data Laporan Pengajuan TA',
          'laporan'  => $laporan,
          'isi'     => 'admin/laporan/data'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      } else {
        $i          = $this->input;
        $tgl_awal   = $i->post('tgl_awal');
        $tgl_akhir  = $i->post('tgl_akhir');

        $laporan  =  $this->laporan_model->filter($tgl_awal, $tgl_akhir);
        $data = [
          'title'   => 'Data Laporan Pengajuan TA',
          'laporan'  => $laporan,
          'isi'     => 'admin/laporan/data'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
    } else if (isset($_POST['cetak'])) {
      $valid = $this->form_validation;

      $valid->set_rules('tgl_awal', 'Tanggal Awal', 'required', array(
        'required' => '%s Harus Diisi'
      ));
      $valid->set_rules('tgl_akhir', 'Tanggal Akhir', 'required', array(
        'required' => '%s Harus Diisi'
      ));
      if ($valid->run() === false) {

        $laporan = $this->laporan_model->data();
        $data = [
          'title'   => 'Data Laporan Pengajuan TA',
          'laporan'  => $laporan,
          'isi'     => 'admin/laporan/data'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      } else {
        $i          = $this->input;
        $tgl_awal   = $i->post('tgl_awal');
        $tgl_akhir  = $i->post('tgl_akhir');

        $tgl = date('d-m-Y');
        $this->load->library('dompdf_gen');

        $laporan = $this->laporan_model->filter($tgl_awal, $tgl_akhir);

        $data = [
          'title'   => 'Laporan Pengajuan Judul TA ' . $tgl,
          'laporan' => $laporan
        ];

        $this->load->view('admin/laporan/pdf', $data, FALSE);

        $paper_size  = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporanTA_$tgl.pdf", array('Attachment' => 0));
      }
    } else {
      $laporan = $this->laporan_model->data();
      $data = [
        'title'   => 'Data Laporan Pengajuan TA',
        'laporan'  => $laporan,
        'isi'     => 'admin/laporan/data'
      ];
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }
}
