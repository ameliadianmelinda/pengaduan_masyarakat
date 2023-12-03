<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LAPOR.ID</title>
    <link href="/assets/img/megaphone.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/css2/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="/assets/img/megaphone.png" style="width:40px; height:35px; margin-left:1em; margin-top:0.5em;">
        <h1><a class="navbar-brand ps-3" href="/admin">LAPOR.ID</a></h1>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-15 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/auth/loginpetugas">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav" style="font-size: 14.5px">

                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="/admin/managementmasyarakat">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                            Management Masyarakat
                        </a>
                        <a class="nav-link" href="/admin/managementpetugas">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                            Management Petugas
                        </a>
                        <a class="nav-link" href="/admin/tambahpetugas">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                            Tambah Petugas
                        </a>

                        <div class="sb-sidenav-menu-heading">Pengaduan</div>
                        <a class="nav-link" href="/admin/validasi">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></i></div>
                            Validasi Pengaduan
                        </a>

                        <div class="sb-sidenav-menu-heading">Laporan</div>
                        <a class="nav-link" href="/admin/pdf">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></i></div>
                            Generate Laporan
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>

        <?= $this->renderSection('content'); ?>

    </div>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; LAPOR.ID 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>