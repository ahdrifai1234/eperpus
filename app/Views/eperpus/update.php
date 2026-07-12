<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Data Buku Perpustakaan</h2>
<a href="/eperpus/tambah" class="btn btn-primary mb-3">+ Tambah Buku</a>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($buku as $b): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['isbn'] ?></td>
            <td><?= $b['judul'] ?></td>
            <td><?= $b['tahun'] ?></td>
            <td><?= $b['stok'] ?></td>
            <td>
                <a href="/eperpus/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/eperpus/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>