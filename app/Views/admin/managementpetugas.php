<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Management Petugas</h3>
            <br>

            <div class="card mb-2">
                <div class="card-header">
                    Data Petugas
                </div>
                <div class="button-header" style="margin-left:19px; margin-top: 1em; margin-bottom: 0.3em;">
                    <a href="/admin/tambahpetugas">
                        <button name="tambah_petugas" class="btn btn-primary btn-user btn-block">
                            Tambah
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($petugas as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $p['nama_petugas']; ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td>
                                        <?php if ($p['password'] == "default123") : ?>
                                            <?= $p['password']; ?>
                                        <?php else : ?>
                                            <?php
                                            $password = $p['password'];
                                            $password = str_split($password);
                                            $password = array_fill(0, count($password), '*');
                                            $password = implode($password);
                                            echo $password;
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $p['telepon']; ?></td>
                                    <td><?= $p['level']; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href='/admin/defaultpasspetugas/<?= $p['id_petugas'] ?>' onclick="return confirm('Yakin ingin mereset password ini ke default password?')"><i class="fa-solid fa-key"></i></i></a>
                                        <a class="btn btn-primary btn-sm" href='/admin/editpetugas/<?= $p['id_petugas'] ?>'><i class="fa-solid fa-pencil" style="width: 20px;"></i></a>
                                        <a class="btn btn-danger btn-sm" href='/admin/deletepetugas/<?= $p['id_petugas'] ?>' onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

</div>

<?= $this->endSection(); ?>