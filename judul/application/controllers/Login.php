<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		//validasi	
		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => 'Username harus diisi')
		);
		$valid->set_rules(
			'password',
			'Password',
			'required|min_length[6]',
			array(
				'required' => 'Password harus diisi',
				'min_length' => 'Password minimal 6 karakter'
			)
		);
		if ($valid->run() === FALSE) {
			//end validasinya

			$data = array('title'  => 'Login');
			$this->load->view('login/login_view', $data, FALSE);
		} else {
			//check username & password compare dgn database
			$i 			= $this->input;
			$username   = $i->post('username');
			$password   = $i->post('password');
			//check di database
			$check_login	= $this->user_model->login($username, $password);
			$mahasiswa = $this->mahasiswa_model->login($username, $password);
			//kalau ada recordnya, maka create session & redirect ke halaman dasbor
			if (!empty($check_login)) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama', $check_login->nama);
				redirect(base_url('admin/dashboard'), 'refresh');
			} elseif (!empty($mahasiswa)) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', 'Mahasiswa');
				$this->session->set_userdata('id_user', $mahasiswa->id_mahasiswa);
				$this->session->set_userdata('nama', $mahasiswa->nama_mahasiswa);
				redirect(base_url('admin/dashboard'), 'refresh');
			} else {
				//kalau username dan password tidak cocok, eror
				$this->session->set_flashdata('sukses', 'User nama atau password tidak cocok');
				redirect(base_url('login'), 'refresh');
			}
		}
		//end checking
	}

	public function register()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama', 'Nama Lengkap', 'required', array(
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
				'title' => 'Register',
			);
			$this->load->view('login/register_view', $data, FALSE);
		} else {
			$i = $this->input;
			$data = array(

				'nama_mahasiswa'        => $i->post('nama'),
				'nim'    => $i->post('nim'),
				'password'    => sha1($i->post('password')),
				'jenis_kelamin' => $i->post('jenis_kelamin'),

			);

			$this->mahasiswa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah diregister, silahkan login');
			redirect(base_url('login'), 'refresh');
		}
	}
	// logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('sukses', 'Anda berhasil Logout');
		redirect(base_url('login'), 'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
