<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">Tambah Buku Baru</div>
            <div class="card-body">
                <form action="/buku/simpan" method="post">

                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control <?= session('errors.isbn') ? 'is-invalid' : '' ?>" value="<?= old('isbn') ?>" placeholder="Contoh: 978-602-...">
                        <div class="form-text">ISBN adalah kode unik untuk setiap buku. (13 huruf)</div>
                        <div class="invalid-feedback">
                            <?= session('errors.isbn') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>" value="<?= old('judul') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.judul') ?>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control <?= session('errors.penulis') ? 'is-invalid' : '' ?>" value="<?= old('penulis') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.penulis') ?>
                        </div>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun" class="form-control <?= session('errors.tahun') ? 'is-invalid' : '' ?>" value="<?= old('tahun') ?>" placeholder="Contoh: 2023">

                        <div class="invalid-feedback">
                            <?= session('errors.tahun') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control <?= session('errors.stok') ? 'is-invalid' : '' ?>" value="<?= old('stok') ?>" placeholder="Contoh: 10">
                        <div class="invalid-feedback">
                            <?= session('errors.stok') ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Simpan Data</button>
                    <a href="/buku" class="btn btn-secondary w-100 mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>