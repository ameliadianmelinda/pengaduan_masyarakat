<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content" style="margin-left:1.5em;">
    <section id="lihatdata" class="d-flex align-items-center">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Detail Validasi Pengaduan</h3>

                <div class="container mt-4" style="width: 1000px;">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <h6>Pengaduan</h6>
                                <br>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Tanggal Pengaduan</label>
                                    <input type="text" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control" placeholder="Masukkan lokasi petugas" style="font-size: 15px" value="<?= $pengaduan['tanggal_pengaduan']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                                    <input type="text" name="nama_petugas" id="isi_laporan" class="form-control" placeholder="Masukkan Nama Petugas" style="font-size: 15px" value="<?= $pengaduan['nik']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Judul Laporan</label>
                                    <input type="text" name="judul_laporan" id="judul_laporan" class="form-control" placeholder="Masukan judul_laporan" style="font-size: 15px" value="<?= $pengaduan['judul_laporan']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Isi Laporan</label>
                                    <input type="text" name="isi_laporan" id="isi_laporan" class="form-control" placeholder="Masukan No Telepeon" style="font-size: 15px" value="<?= $pengaduan['isi_laporan']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi petugas" style="font-size: 15px" value="<?= $pengaduan['lokasi']; ?>" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>

                <div class="container mt-4" style="width: 1000px;">
                    <div class="card">
                        <div class="card-body">

                            <form>
                                <h6>Tanggapan</h6>
                                <br>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Id Petugas</label>
                                    <input type="text" name="id_petugas" id="id_petugas" class="form-control" placeholder="Masukkan lokasi petugas" style="font-size: 15px" value="<?= $tanggapan['id_petugas']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal tanggapan</label>
                                    <input type="text" name="tanggal_tanggapan" id="tanggal_tanggapan" class="form-control" placeholder="Masukkan Nama Petugas" style="font-size: 15px" value="<?= $tanggapan['tanggal_tanggapan']; ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Tanggapan</label>
                                    <input type="text" name="tanggapan" id="tanggapan" class="form-control" placeholder="Masukan judul_laporan" style="font-size: 15px" value="<?= $tanggapan['tanggapan']; ?>" readonly>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <a href="/admin/validasi"><button type="button" class="btn btn-primary mt-4 mb-5" style="margin-left:0.9em;">Selesai</button></a>

            </div>
        </main>
    </section>
</div>

<?= $this->endSection(); ?>