<?php

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'home';

		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar', $data);
		$this->load->view('v_index', $data);
		$this->load->view('themes/v_footer');
	}

	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);
		$data = array(
			'id'	=> $barang->id_brg,
			'qty'	=> 1,
			'price'	=> $barang->harga,
			'name'	=> $barang->nama_brg,
			'image'	=> $barang->gambar
		);

		$this->cart->insert($data);
		redirect('home');
	}

	public function detail_keranjang()
	{
		$this->load->view('themes/v_header');
		$this->load->view('themes/v_sidebar');
		$this->load->view('keranjang');
		$this->load->view('themes/v_footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('home/index');
	}

	public function checkout()
	{
		$this->load->view('themes/v_header');
		$this->load->view('themes/v_sidebar');
		$this->load->view('checkout');
		$this->load->view('themes/v_footer');
	}

	public function konfirmasi()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('themes/v_header');
			$this->load->view('themes/v_sidebar');
			$this->load->view('konfirmasi');
			$this->load->view('themes/v_footer');
		} else {
			echo "maaf, pesanan anda gagal";
		}
	}

	public function detail($slug)
	{
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM tb_barang where slug='$ids'");
		$row = $dat->row();
		$total = $dat->num_rows();
		if ($total == 0) {
			redirect('home');
		}
		$data['title'] = $row->nama_brg;
		$data['barang'] = $this->model_barang->detail_brg($slug);
		$this->cart->destroy();
		$this->load->view('themes/v_header', $data);
		$this->load->view('themes/v_sidebar', $data);
		$this->load->view('detail_barang', $data);
		$this->load->view('themes/v_footer');
	}
}
