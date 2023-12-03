<?= $this->extend('layout/masyarakat'); ?>

<?= $this->section('content'); ?>

<?php
$lama = session()->getFlashdata('lama');
$baru = session()->getFlashdata('baru');
$konfirmasi = session()->getFlashdata('konfirmasi');
$pesan = session()->getFlashdata('pesan');
$session = session()
?>
<?php $validation = \Config\Services::validation(); ?>

<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">

<body style="background-color: #37517E;">
    <section id="pengaduan" class="d-flex align-items-center">
        <div class="container mt-4">
            <div class="card" style="width:100%;">
                <div class="card-body" style="margin-left:2em; margin-top:1em; margin-right:2em;">
                    <?php if (session()->getFlashdata('lama')) : ?>
                        <?= session()->getFlashdata('lama'); ?>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('baru')) : ?>
                        <?= session()->getFlashdata('baru'); ?>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('konfirmasi')) : ?>
                        <?= session()->getFlashdata('konfirmasi'); ?>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <?= session()->getFlashdata('pesan'); ?>
                    <?php endif; ?>

                    <form method="post" action="/updateprofile/masyarakat/<?= $session->get('id_masyarakat'); ?>">
                        <h5>Edit Password</h5>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" id="password_lama" class="form-control password form-control-user mb-4 <?= ($validation->hasError('passwordLama')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" placeholder="Masukkan password lama">
                            <div class="invalid-feedback">
                                <?= $validation->getError('passwordLama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control password_baru form-control-user mb-4" id="exampleInputPassword" placeholder="Masukkan password baru">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="konfir_password" class="form-control konfir_password form-control-user mb-4" id="exampleInputPassword" placeholder="Konfirmasi password">
                        </div>
                        <button type="submit" class="btn btn-primary ubah_profile mb-3">Simpan</button>

                    </form>
                </div>

            </div>
    </section>

</body>

<?= $this->endSection(); ?>