<?php
session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>alert('harap login terlebih dahulu');window.location='../login/';</script>";
  exit();
}

include 'crud/item.php';

use CRUD\Item;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $masuk = $_POST['masuk'];

  $item = new Item();
  $item->updateItem($id, $nama, $harga, $jumlah, $masuk);

  echo "<script>alert('berhasil mengedit data');window.location='tabel.php';</script>";

  exit();
} else {
  $id = $_GET['id'];

  $item = new Item();
  $Data = $item->getItemById($id);
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="tabel.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Data Stok Barang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="form.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Tambah Data</span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">
                        <?= $_SESSION['username'] ?>
                      </p>
                    </a>
                    <a href="../login/ " class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <h5 class="card-title fw-semibold mb-4">Forms</h5>
          <div class="card">
            <div class="card-body">
              <form action=" " method="post">
                <input type="hidden" name="id" value="<?= $Data['id'] ?>">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama:</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $Data['nama_barang'] ?>">
                </div>
                <div class="mb-3">
                  <label for="tanggalmasuk" class="form-label">Harga</label>
                  <input type="text" class="form-control" name="harga" id="tanggalmasuk" value="<?= $Data['harga'] ?>">
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah:</label>
                  <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $Data['jumlah'] ?>">
                </div>
                <div class="mb-3">
                  <label for="tanggalkeluar" class="form-label">Tanggal Masuk Barag</label>
                  <input type="date" class="form-control" name="masuk" id="tanggalkeluar" value="<?= $Data['masuk'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>