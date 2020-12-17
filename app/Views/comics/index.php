<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comics/create" class="btn btn-primary mt-3">Tambah Buku</a>
            <h1 class="mt-2">Daftar Komik</h1>
            <?php if (session()->getFlashdata('Pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('Pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($comics as $co) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $co['sampul']; ?>" alt="" class="cover"></td>
                            <td><?= $co['judul']; ?></td>
                            <td><a href="/comics/<?= $co['slug']; ?>" class="btn btn-success">Detail</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>