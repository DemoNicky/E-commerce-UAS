<?php

class Model_kategori extends CI_Model{
    public function data_pakaian_pria(){
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaianpria'));
    }

    public function data_sweater(){
        return $this->db->get_where("tb_barang", array('kategori' => 'sweater'));
    }

    public function data_pakaian_wanita(){
        return $this->db->get_where("tb_barang", array('kategori' => 'pakaianwanita'));
    }

    public function data_sepatu(){
        return $this->db->get_where("tb_barang", array('kategori' => 'sepatu'));
    }
}