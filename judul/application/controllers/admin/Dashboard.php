<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function index()
  {
    $data = [
      'title' => 'Dashboard',
      'isi'   => 'admin/dashboard/data'
    ];
    $this->load->view('admin/layout/wrapper', $data, false);
  }
}
