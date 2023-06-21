<div class="container-fluid">
    <div class="alert alert-success col-md-6 mx-auto">
    <h4 class="mb-3"><strong>Detail Pesanan</strong></h4>
    <?php
        if (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_telp']) && isset($_POST['jakir']) && isset($_POST['bank'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $jakir = $_POST['jakir'];
        $bank = $_POST['bank'];

        }
    ?>
    <table class="hidden-table mb-3">
            <tr>
                <td>Nama</td>
                <td>: <?php echo $nama ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php echo $alamat ?></td>
            </tr>
            <tr>
                <td>No. Telpon</td>
                <td>: <?php echo $no_telp ?></td>
            </tr>
            <tr>
                <td>Jasa Pengiriman</td>
                <td>: <?php echo $jakir ?></td>
            </tr>
            <tr>
                <td>Biaya Jasa Pengiriman</td>
                <td>: <?php echo $harga ?></td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>: <?php echo $bank ?></td>
            </tr>
        </table>

<div class="container-fluid">
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no=1;
        foreach($this->cart->contents() as $items) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name']?></td>
                <td><?php echo $items['qty']?></td>
                <td align="right">Rp. <?php echo number_format($items['price'], 0, ',','.') ?></td>
                <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',','.') ?></td>
            </tr>
            

        <?php endforeach; ?>
            <tr>
                <td colspan="4"></td>
                <td align="right">Rp. <?php echo number_format($this->cart->total() + $harga, 0, ',','.') ?></td>
            </tr>
        </table>

        <a href="<?php echo base_url('') ?>"><div class="btn btn-sm btn-primary">
            Kembali Ke Menu Utama
        </div></a>
        <a onclick="window.print()" class="float-right"><div class="btn btn-sm btn-danger"><i class="fa fa-print"></i>
            Print
        </div></a>
    </div>
</div>