<?php
class Kategori extends CI_Controller{
    public function pakaianpria(){
        $data['pakaianpria'] = $this->model_kategori->data_pakaian_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_pria', $data);
        $this->load->view('templates/footer');
        
    }

    public function sweater(){
        $data['sweater'] = $this->model_kategori->data_sweater()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sweater', $data);
        $this->load->view('templates/footer');
    }

    public function pakaianwanita(){
        $data['pakaianwanita'] = $this->model_kategori->data_pakaian_wanita()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaianwanita', $data);
        $this->load->view('templates/footer');
    }

    public function sepatu(){
        $data['sepatu'] = $this->model_kategori->data_sepatu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sepatu', $data);
        $this->load->view('templates/footer');
    }
}