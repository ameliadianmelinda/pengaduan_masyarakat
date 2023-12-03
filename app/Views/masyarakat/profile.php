<?= $this->extend('layout/masyarakat'); ?>

<?= $this->section('content'); ?>


<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">

<body style="background-color: #37517E;">
    <section id="pengaduan" class="d-flex align-items-center">
        <div class="container mt-4">
            <div class="card" style="width:100%;">
                <div class="card-body" style="margin-left:2em; margin-top:1em; margin-right:2em;">
                    <form>
                    <h5>Data Akun</h5>    
                    <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control z form-control-user mb-3" id="exampleInputEmail" placeholder="Masukan NIK ..." value="<?= $session->get('nik'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control username form-control-user mb-3" id="exampleInputPassword" placeholder="Masukan Username" value="<?= $session->get('username'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control password form-control-user mb-3" id="exampleInputPassword" placeholder="Password" value="<?= $session->get('password'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">No Telepon</label>
                            <input type="text" name="telepon" class="form-control telepon form-control-user mb-3" id="exampleInputPassword" placeholder="No telepon" value="<?= $session->get('telepon'); ?>" readonly>
                        </div>
                        <a href="/editprofile/masyarakat">
                            <button type="button" class="btn btn-primary ubah_profile mb-3">Ubah password</button>
                        </a>
                    </form>
                </div>

            </div>
    </section>

</body>

<?= $this->endSection(); ?>