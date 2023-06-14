<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                    $grand_total = 0;
                    if($keranjang = $this->cart->contents()){
                        foreach($keranjang as $item){
                            $grand_total = $grand_total + $item['subtotal'];
                        }
                        echo "<h5>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman Dan Pembayaran</h3>
            
            <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda " class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda " class="form-control">
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telephone Anda " class="form-control">
                </div>
                <div class="form-group">
                    <label>Jasa Pengiriman</label><br>
                    <p style="color: red; font-size: 14px;">*Pengiriman menggunakan gojek dan grab hanya untuk daerah jabodetabek</p>
                    <select class="form-control" name="jakir">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS Indonesia</option>
                        <option>SICEPAT</option>
                        <option>GOJEK</option>
                        <option>GRAB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih BANK</label>
                    <select class="form-control" name="bank">
                        <option>BCA - XXXXXXXXXXXX</option>
                        <option>BNI - XXXXXXXXXXXX</option>
                        <option>BRI - XXXXXXXXXXXX</option>
                        <option>MANDIRI - XXXXXXXXXXXX</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

            </form>
            <?php 
                    }else{
                        echo "<h5>Keranjang Anda Masih Kosong";
                    }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>