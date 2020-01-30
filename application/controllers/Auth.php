<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function login()
	{
		$data['title'] = 'login';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('themes/v_header', $data);
			$this->load->view('form_login');
			$this->load->view('themes/v_footer');
		} else {
			$auth = $this->model_auth->cek_login();

			if ($auth == false) {
				$this->session->set_flashdata('pesan', '<p>password salah</p>');
				redirect('auth/login');
			} else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('role_id', $auth->role_id);

				switch ($auth->role_id) {
					case 1:
						redirect('admin/admin');
						break;
					case 2:
						redirect('home');
						break;
					default:
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
