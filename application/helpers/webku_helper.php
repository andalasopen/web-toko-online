<?php

function title()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT nama_brg FROM tb_barang")->row_array();
    return $title['nama_brg'];
}
