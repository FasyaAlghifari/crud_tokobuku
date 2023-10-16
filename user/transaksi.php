<?php
include '../koneksi.php';

$id_user = $_GET['id_buku'];
$details = mysqli_query($koneksi, "select * from daftar_buku where id_buku ='$_GET[id_buku]'");
$d = mysqli_fetch_array($details);

?>

<head>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <style>
  body {
    background-color: blanchedalmond;
  }
</style> -->
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">PUKA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="../admin/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="tabel_user.php">Tabel user</a>
                                <a class="nav-link" href="tabel_buku.php">Tabel buku</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    User
                </div>
            </nav>
        </div>

        <div class="row" style="margin-top: 5%; margin-left: 20%;">
            <div class="col-md-20">
                <div class="container">
                    <div class="row justify-content-center">
                        <h2 class="bg-light p-2 rounded  text-center text-dark" style="color: black;"> Beli Buku </h2>
                        <hr class="my-3">
                        <div class="text-center">
                            <img src="../admin/gambar/<?= $d["foto"]; ?>" width="200" class="img-thumnail mt-3">
                        </div>
                        <h6 class="text-dark text-center" style="font-size: 16px; margin: top 20px;">Judul : <?= $d["judul"]; ?></h6>
                        <h6 class="text-dark text-center" style="font-size: 16px;">pengarang : <?= $d["pengarang"]; ?></h6>
                        <h6 class="text-dark text-center" style="font-size: 16px;">Penerbit : <?= $d["penerbit"]; ?></h6>
                        <h6 class="text-dark text-center" style="font-size: 16px;">Harga : <?= $d["harga"]; ?></h6>
                    </div>
                        <?php
									include '../koneksi.php';
									$id = $_GET['id_buku'];
									$data = mysqli_query($koneksi, "select * from daftar_buku where id_buku='$id'");
									$nomor = 1;
									while ($d = mysqli_fetch_array($data)) {
										?>
										<form method="GET" action="aksi_transaksi.php" enctype="multipart/form-data">
												<input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">

												<input type="hidden" name="judul"  value="<?php echo $d['judul']; ?>"
												class="form-control" id="judul_buku" >

                                                <input type="hidden" name="harga" id="harga" value="<?php echo $d['harga']; ?>" class="form-control">

                                                <input type="hidden" name="tanggal_pembelian" id="tp" value="<?php echo date('d-M-Y'); ?>" class="form-control">

                                                <input type="hidden" name="foto"  value="<?php echo $d['foto'] ?>" class="form-control">			

											<div class="d-flex align-items-right justify-content-around">
												<a href="index.php" class="btn btn-danger">Kembali</a>
												<input type="submit" value="BELI" class="btn btn-primary">
											</div>
										</form>
										<?php
									}
									?>
                    </div>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>