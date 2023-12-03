<?= $this->extend('layout/petugas'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Management Masyarakat</h3>
            <section id="pengaduan" class="d-flex align-items-center">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="/petugas/updatemasyarakat/<?= $masyarakat['id_masyarakat']; ?>"method="post" enctype="multipart/form-data">
                                <h6>Edit Data</h6>
                                <br>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">NIK</label>
                                    <input type="text" name="nik" id="isi_laporan" class="form-control" placeholder="Masukkan NIK" style="font-size: 15px" value="<?= (old('nik')) ? old('nik') : $masyarakat['nik']; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Username</label>
                                    <input type="text" name="username" id="lokasi" class="form-control" placeholder="Masukan Username" style="font-size: 15px" value="<?= (old('username')) ? old('username') : $masyarakat['username']; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                    <input type="text" name="telepon" id="lokasi" class="form-control" placeholder="Masukan No Telepeon" style="font-size: 15px" value="<?= (old('telepon')) ? old('telepon') : $masyarakat['telepon']; ?>">
                                </div>
                                <div class="d-flex justify-content-end form-check">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>



<?= $this->endSection(); ?>