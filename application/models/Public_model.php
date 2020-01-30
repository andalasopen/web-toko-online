<?php

class Public_model extends CI_Model
{
    public function getSeo($page)
    {
        $this->db->where('page_type', $page);
        $this->db->where('abbr');
        $query = $this->db->get('tb_barang');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr['nama_brg'] = $row['nama_brg'];
                $arr['description'] = $row['description'];
            }
        }
        return $arr;
    }
}
