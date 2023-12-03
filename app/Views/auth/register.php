<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Register</title>
    <link href="/assets/img/megaphone.png" rel="icon"> 

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <?php
    $session = session();
    $error = $session->getFlashdata('error');
    $password = $session->getFlashdata('password');
    ?>

    <div class="container mt-1">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-20 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <form action="/auth/valid_register" method="post" class="user">

                                        <div>
                                            <?php if ($password) { ?>
                                                <p style="color:red"><?php echo $password ?></p>
                                            <?php } ?>
                                        </div>

                                        <div>
                                            <?php if ($error) { ?>
                                                <p style="color:red">Terjadi Kesalahan:
                                                    <?php foreach ($error as $e) { ?>
                                                        <br>
                                                <p style="color:red"><?php echo $e ?></p>
                                            <?php } ?>
                                            </p>
                                        <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="nik" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan NIK ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confrim Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="telp" class="form-control form-control-user" id="exampleInputPassword" placeholder="No telepon">
                                        </div>
                                        <button name="register" type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/auth/loginmasyarakat">Sudah memiliki akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>