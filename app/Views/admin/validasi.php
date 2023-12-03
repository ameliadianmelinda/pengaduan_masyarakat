<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Validasi Pengaduan</h3>
            <br>

            <div class="card mb-2">
                <div class="card-header">
                    Data Pengaduan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Judul Laporan</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengaduan as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= $p['judul_laporan']; ?></td>
                                    <td style="width: 350px; word-wrap:break-word;"><?= $p['isi_laporan']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-image"></i></a>
                                    </td>
                                    <td><?= date('d m Y', strtotime($p['tanggal_pengaduan'])); ?></td>
                                    <td>
                                        <?php if ($p['status'] == "0") : ?>
                                            Pending
                                        <?php elseif ($p['status'] == "1") : ?>
                                            Proses
                                        <?php elseif ($p['status'] == "2") : ?>
                                            Selesai
                                        <?php elseif ($p['status'] == "3") : ?>
                                            Ditolak
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($p['status'] == "0") : ?> 
                                            <a class="btn btn-danger btn-sm" href="/admin/tolak/<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-x"></i></a>
                                            <a class="btn btn-primary btn-sm" href="/admin/updatevalidasi/<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-check"></i></a>
                                        <?php elseif ($p['status'] == "1") : ?>
                                            <a class="btn btn-primary btn-sm" href="/admin/tanggapan/<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-message"></i></a>
                                        <?php elseif ($p['status'] == "2") : ?>
                                            <a class="btn btn-primary btn-sm" href="/admin/detaillaporan/<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-circle-info"></i></a>
                                        <?php elseif ($p['status'] == "3") : ?>
                                            Ditolak
                                        <?php endif; ?>
                                    </td>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php foreach ($pengaduan as $p) : ?>
            <div class="modal fade" id="Modal<?= $p['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
                        </div>
                        <div class="modal-body">
                            <!-- foto pengaduan -->
                            <img src="/foto_storage/<?= $p['foto'] ?>" alt="Image" style="width: auto; height: auto; max-width: 100%; max-height: 100%;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
</div>

<?= $this->endSection(); ?>