<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <h2>Form Data Pesanan</h2>
                                <div>
                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success">
                                            <?php echo session()->getFlashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <form method="post" action="<?= base_url(); ?>simpan" enctype="multipart/form-data" autocomplete="off">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <input name="nama_pelanggan" id="nama_pelanggan" type="text" class="form-control" placeholder="Masukkan nama pelanggan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="item_name">Jenis Produk</label>
                                        <select class="form-control" id="item_name" name="item_name" required onchange="showSection()">
                                            <option value="">Pilih Produk...</option>
                                            <option value="Banner">Cetak Banner</option>
                                            <option value="Spanduk">Cetak Spanduk</option>
                                            <option value="Baliho">Cetak Baliho</option>
                                            <option value="Sablon">Cetak Sablon</option>
                                            <option value="Stiker">Cetak Stiker</option>
                                            <option value="Undangan">Cetak Undangan</option>
                                            <option value="Nota">Cetak Nota</option>
                                            <option value="Stempel">Cetak Stempel</option>
                                            <option value="Papan Nama">Cetak Papan Nama</option>
                                            <option value="ID Card">Cetak ID Card</option>
                                            <!-- Tambahkan opsi lain sesuai dengan layanan yang tersedia -->
                                        </select>
                                    </div>
                                    <div id="additionalSection" class="hidden">
                                        <!-- Isi akan diubah berdasarkan JavaScript -->
                                    </div>
                                    <div class="form-group">
                                        <label for="price"> Harga Satuan:</label>
                                        <input type="text" class="form-control" name="price" id="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlpn">Kontak</label>
                                        <input name="no_tlpn" type="text" class="form-control" id="no_tlpn" placeholder="Masukkan No.telepon pelanggan..">
                                    </div>


                                    <button type="submit" value="submit" name="upload" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('price').addEventListener('input', function(e) {
        var value = this.value.replace(/\D/g, ''); // Menghapus semua selain angka
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Menambahkan titik sebagai pemisah ribuan

        this.value = value;
    });
</script>
<?= $this->endSection('page-content'); ?>