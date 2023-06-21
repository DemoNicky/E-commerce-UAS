<?php
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }

    public function tambah_ke_keranjang($id){
        $barang = $this->model_barang->find($id);
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
        );
        
        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_keranjang(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang(){
        $this->cart->destroy();
        redirect('welcome');
    }

    public function pembayaran(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function detail($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data); 
        $this->load->view('templates/footer');
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data); 
        $this->load->view('templates/footer');
    }

    public function proses_pesanan(){
        $is_processed = $this->model_invoice->index();
        $jasa_pengiriman = $this->input->post('jakir');
        if ($jasa_pengiriman == "JNE") {
            $harga = 5000;
        } elseif ($jasa_pengiriman == "TIKI") {
            $harga = 7000;
        } elseif ($jasa_pengiriman == "POS Indonesia") {
            $harga = 10000;
        } elseif ($jasa_pengiriman == "SICEPAT") {
            $harga = 3000;
        } elseif ($jasa_pengiriman == "GOJEK") {
            $harga = 40000;
        } elseif ($jasa_pengiriman == "GRAB") {
            $harga = 37000;
        } else {
            $harga = 0;
        }
        $data['harga'] = $harga;

        if($is_processed){
            // $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan', $data);
            $this->load->view('templates/footer');
            $this->cart->destroy();
        }else{
            echo "Maaf Pesanan Anda Gagal diproses";
        }
    }
}