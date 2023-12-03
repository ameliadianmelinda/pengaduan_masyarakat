<?= $this->extend('layout/pengaduan'); ?>

<?= $this->section('content'); ?>

<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">

<body style="background-color: #37517E;;">
    <section id="lihatdata" class="d-flex align-items-center">
        <div class="container mt-4 pt-10">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-2">
                        <div class="card-header">
                            Data Pengaduan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Isi Laporan</th>
                                        <th>Status</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengaduan as $p) : ?>
                                        <tr>
                                            <td style="width:30px;"><?= $i++; ?></td>
                                            <td style="width:175px;"><?= date('d-m-Y', strtotime($p['tanggal_pengaduan'])); ?></td>
                                            <td style="width:120px;"><?= $p['judul_laporan']; ?></td>
                                            <td style="width:420px;"><?= $p['isi_laporan']; ?></td>
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
                                            <td><a class="btn btn-info btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $p['id_pengaduan'] ?>"><i class="bi bi-card-image"></i></a></td>
                                            <td>
                                            <?php if ($p['status'] == "0") : ?>
                                                <a class="btn btn-warning btn-md" href="/editpengaduan/masyarakat/<?= $p['id_pengaduan'] ?>"><i class="bi bi-pencil-square"></i></a>
                                                <a class="btn btn-danger btn-md" href="/deletepengaduan/masyarakat/<?= $p['id_pengaduan'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                                                
                                                <?php elseif ($p['status'] == "2") : ?>
                                                    <a class="btn btn-success btn-md" type="button" data-bs-toggle="modal" data-bs-target="#Tanggapan<?= $p['id_pengaduan'] ?>"><i class="fa-solid fa-check"></i></a>
                                                <?php endif; ?>
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
                                    <!-- foto pengpan -->
                                    <img src="/foto_storage/<?= $p['foto'] ?>" alt="Image" style="width: auto; height: auto; max-width: 100%; max-height: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php foreach ($tanggapan as $t) : ?>
                    <div class="modal fade" id="Tanggapan<?= $t['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tanggapan</h1>
                                </div>
                                <div class="modal-body">
                                    <!-- foto pengpan -->
                                    <input type="text" value="<?= $t['tanggapan']?>" style="width:100%; height:30%;">
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
    </section>
</body>

<?= $this->endSection(); ?>