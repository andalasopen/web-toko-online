<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Produck extends CI_Controller
{

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
        $this->load->view('themes/v_sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('themes/v_footer');
    }
}
