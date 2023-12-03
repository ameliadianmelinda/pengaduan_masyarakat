<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Management Petugas</h3>
            <section id="pengaduan" class="d-flex align-items-center">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="/admin/updatepetugas/<?= $petugas['id_petugas']; ?>"method="post">
                                <h6>Edit Data</h6>
                                <br>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
                                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Masukkan Nama Petugas" style="font-size: 15px" value="<?= (old('nama_petugas')) ? old('nama_petugas') : $petugas['nama_petugas']; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" style="font-size: 15px" value="<?= (old('username')) ? old('username') : $petugas['username']; ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Telepon</label>
                                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan No Telepeon" style="font-size: 15px" value="<?= (old('telepon')) ? old('telepon') : $petugas['telepon']; ?>">
                                </div>
                                <label for="exampleInputPassword1" class="form-label">Level</label>
                                    <select class="form-select" name="level" id="level" aria-label="Floating label select example">
                                        <option value="admin" <?php if ($petugas['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                        <option value="petugas" <?php if ($petugas['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                    </select>
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