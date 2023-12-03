<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Tambah Petugas</h3>
            <section id="pengaduan" class="d-flex align-items-center">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/savepetugas" method="post" enctype="multipart/form-data"       >
                                <h6>Tambah Petugas</h6>
                                <br>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
                                    <input type="text" name="nama_petugas" id="isi_laporan" class="form-control" placeholder="Masukkan Nama Petugas" style="font-size: 15px">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" style="font-size: 15px">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" style="font-size: 15px">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Masukan confirmasi password" style="font-size: 15px">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan No Telepeon" style="font-size: 15px">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Level</label>
                                    <select class="form-select" name="level" id="level" aria-label="Floating label select example">
                                        <option selected>Pilih salah satu</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
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