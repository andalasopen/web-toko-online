<?php

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function elektronik()
	{
		$data['title'] = 'Elektronik';
		$data['elektronik'] = $this->model_kategori->data_elektronik()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('mod_kategori/elektronik', $data);
		$this->load->view('themes/v_footer');
	}

	public function aksesoris_and_komputer()
	{

		$data['title'] = 'aksesoris & komputer';
		$data['aksesoris_and_komputer'] = $this->model_kategori->data_aksesoris_and_komputer()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('mod_kategori/aksesoris_and_komputer', $data);
		$this->load->view('themes/v_footer');
	}

	public function pakaian_pria()
	{
		$data['title'] = 'Pakaian pria';
		$data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('mod_kategori/pakaian_pria', $data);
		$this->load->view('themes/v_footer');
	}

	public function pakaian_wanita()
	{
		$data['title'] = 'Pakaian wanita';
		$data['pakaian_wanita'] = $this->model_kategori->data_pakaian_wanita()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('mod_kategori/pakaian_wanita', $data);
		$this->load->view('themes/v_footer');
	}

	public function pakaian_anak_anak()
	{
		$data['title'] = 'Pakaian anak anak';
		$data['pakaian_anak_anak'] = $this->model_kategori->data_pakaian_anak_anak()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('mod_kategori/pakaian_anak', $data);
		$this->load->view('themes/v_footer');
	}

	public function detail($slug)
	{
		$nm = $this->db->query("SELECT * FROM tb_barang");
		$row = $nm->row();

		$data['title'] = $row->nama_brg;
		$data['barang'] = $this->model_barang->detail_brg($slug);
		$this->cart->destroy();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar');
		$this->load->view('detail_barang', $data);
		$this->load->view('themes/v_footer');
	}
}
