<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="card shadow">
    <div class="card-header bg-primary text-white">Tambah Buku Baru</div>
    <div class="card-body">
        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="/eperpus/simpan" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label>ISBN</label>
                <input type="text" name="isbn" class="form-control" value="<?= old('isbn') ?>">
            </div>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= old('judul') ?>">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="<?= old('tahun') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= old('stok') ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan Buku</button>
            <a href="/eperpus" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection() ?>