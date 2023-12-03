<?= $this->extend('layout/admin'); ?>

<?= $this->section('content'); ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Management Masyarakat</h3>
            <br>

            <div class="card mb-2">
                <div class="card-header">
                    Data Akun
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIK</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($masyarakat as $m) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $m['nik']; ?></td>
                                    <td><?= $m['username']; ?></td>
                                    <td>
                                        <?php if ($m['password'] == "default123") : ?>
                                            <?= $m['password']; ?>
                                        <?php else : ?>
                                            <?php
                                            $password = $m['password'];
                                            $password = str_split($password);        
                                            $password = array_fill(0, count($password), '*');
                                            $password = implode($password);
                                            echo $password;
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $m['telepon']; ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href='/admin/defaultpassmasyarakat/<?= $m['id_masyarakat'] ?>' onclick="return confirm('Yakin ingin mereset password ini ke default password?')"><i class="fa-solid fa-key"></i></i></a>
                                        <a class="btn btn-primary btn-sm" href='/admin/editmasyarakat/<?= $m['id_masyarakat'] ?>'><i class="fa-solid fa-pencil" style="width: 20px;"></i></a>
                                        <a class="btn btn-danger btn-sm" href='/admin/deletemasyarakat/<?= $m['id_masyarakat'] ?>' onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
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