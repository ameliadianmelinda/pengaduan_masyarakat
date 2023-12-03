<?= $this->extend('layout/petugas'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Dashboard</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <?= $jumlah; ?>
                            <p class="card-text mt-3" style="font-size:13px;">Jumlah Laporan</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/petugas/validasi">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <?= $jumlahSudahValidasi; ?>
                            <p class="card-text mt-3" style="font-size:13px;">Selesai</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/petugas/validasi">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <?= $jumlahBelumValidasi; ?>
                            <p class="card-text mt-3" style="font-size:13px;">Belum Validasi</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/petugas/validasi">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <?= $tolak; ?>
                            <p class="card-text mt-3" style="font-size:13px;">Di Tolak</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/petugas/validasi">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card-body mt-5" style="border-color:black;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Laporan</th>
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
                                <td><?= $p['judul_laporan']; ?></td>
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
                                    <a href="/petugas/validasi" style="text-decoration:none">Lihat Detail -></a>
                                </td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; LAPOR.ID 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<?= $this->endSection(); ?>