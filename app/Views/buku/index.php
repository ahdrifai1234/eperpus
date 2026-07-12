<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Keterangan Page -->
 <h2 class="mb-4">Data Buku Perpustakaan</h2>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Buku</h5>
        <a href="/buku/tambah" class="btn btn-light btn-sm">+ Tambah Buku</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach($buku as $b): 
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <?= substr($b['isbn'], 0, 3) . '-' . substr($b['isbn'], 3, 3) . '-' . substr($b['isbn'], 6) ?>
                    </td>
                    <td><?= $b['judul'] ?></td>
                    <td><?= $b['penulis'] ?></td>
                    <td>
                        <a href="/buku/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/buku/delete/<?= $b['id'] ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>