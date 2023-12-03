<?= $this->extend('layout/masyarakat'); ?>

<?= $this->section('content'); ?>


<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">

<body style="background-color: #37517E;">
    <section id="pengaduan" class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->getFlashdata('vall')) : ?>
                        <?= session()->getFlashdata('vall'); ?>
                    <?php endif; ?>
                    <form method="post" action="/updatepengaduan/masyarakat/<?= $pengaduan['id_pengaduan']; ?>" enctype="multipart/form-data">
                        <h3>Sampaikan Laporan Anda</h3>
                        <br>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                            <input type="text" name="judul_laporan" id="judul_laporan" class="form-control" placeholder="Ketik Judul Pengaduan Anda" style="font-size: 15px" value="<?= (old('judul_laporan')) ? old('judul_laporan') : $pengaduan['judul_laporan']; ?>">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Keluhan</label>
                            <input type="text" name="isi_laporan" id="isi_laporan" class="form-control" placeholder="Ketik Pengaduan Anda" style="font-size: 15px" value="<?= (old('isi_laporan')) ? old('isi_laporan') : $pengaduan['isi_laporan']; ?>">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukan Lokasi Kejadian" style="font-size: 15px" value="<?= (old('lokasi')) ? old('lokasi') : $pengaduan['lokasi']; ?>">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" value="<?= (old('foto')) ? old('foto') : $pengaduan['foto']; ?>"></input>
                        </div>
                        <div class="d-flex justify-content-end form-check">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

</body>

<?= $this->endSection(); ?>