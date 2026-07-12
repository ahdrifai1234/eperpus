<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">Edit Data Buku</div>
            <div class="card-body">
                
                <?php if(session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/buku/update/<?= $buku['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <!-- ISBN di-disable karena merupakan Primary Key dan sebaiknya tidak diubah -->
                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text"  name="isbn" class="form-control <?= session('errors.isbn') ? 'is-invalid' : '' ?>" value="<?= $buku['isbn'] ?>" readonly>
                        <div class="invalid-feedback">
                            <?= session('errors.isbn') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>" value="<?= old('judul', $buku['judul']) ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.judul') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control <?= session('errors.penulis') ? 'is-invalid' : '' ?>" value="<?= old('penulis', $buku['penulis']) ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.penulis') ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="tahun" class="form-control <?= session('errors.tahun') ? 'is-invalid' : '' ?>" value="<?= old('tahun', $buku['tahun']) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.tahun') ?>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control <?= session('errors.stok') ? 'is-invalid' : '' ?>" value="<?= old('stok', $buku['stok']) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.stok') ?>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-warning w-100">Update Data</button>
                    <a href="/buku" class="btn btn-secondary w-100 mt-2">Batal / Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>