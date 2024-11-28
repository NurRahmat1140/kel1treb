<?php
session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header('Location: index.php'); // Arahkan kembali ke halaman login jika belum login
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="monitoring.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-6.7.1-web/css/all.min.css">
    <title>MONITORING FASILITAS LIFT POLIBATAM</title>
  </head>

  <body style="background: linear-gradient(to right, #a1d6e2, #008dcb, #98dbc6);">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
    style="background-color: skyblue; background: linear-gradient(to right, #002c54, #3a5199, #4897d8);">
    
      <a class="navbar-brand" href="#"><img src="image/poltek.png" alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
        <b>MONITORING FASILITAS LIFT POLIBATAM</b>
      </a>

        <div class="icon ml-5">
          <h5>
            <i class="fa-regular fa-user mr-4" data-toogle="tooltip" title="Akun" style="color: whitesmoke;"></i>
            <a href="logout.php" style="color: whitesmoke;">
              <i class="fa-solid fa-arrow-right-from-bracket mr-5" data-toogle="tooltip" title="Log Out"></i>
            </a>
          </h5>
        </div>

      </div>
    </nav>

    <div class="row no-gutters mt-4">
      <div class="col-md-2 mt-2 pl-0,5 pr-3 pt-5" style="background: linear-gradient(to bottom, #00afb9, #66a5ad, #003b46); height: 500px;">
        <ul class="nav flex-column ml-2 mb-2">
          <li class="nav-item">
            <a class="nav-link active text-white" href="status.php"><i class="fa-solid fa-desktop mr-3"></i>STATUS</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="riwayat.php"><i class="fa-regular fa-message mr-3"></i>RIWAYAT</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="INFO.php"><i class="fa-solid fa-circle-info mr-3"></i>INFO</a><hr class="bg-secondary">
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa-solid fa-circle-info mr-3"></i> INFO WEBSITE </h3><hr>

        <div class="container" style="color: whitesmoke; width: auto; text-align: center; margin-top: 40px; margin-bottom: 20px;">
          Kami ucapkan terimakasih kepada Bapak dan Ibu dosen yang terhormat atas tugas Project Based Learning ini yang berjudul "Monitoring Fasilitas Lift Polibatam" dari kelompok 1 TRE B Malam.<br> Semoga Bapak dan Ibu dosen memaklumi atas kekurangan yang kami buat. Atas perhatiannya kami ucapkan sekali lagi terimakasih.<br><br>Versi 1.0.0
        </div>

        <div class="card text-center" style="width: 13rem; margin-left: 380px; background: linear-gradient(to right, #f9ce34, #ee2a7b, #6228d7); opacity: 0.9; border-radius: 35px;">
          <div class="card-body">
            <h1 class="card-title text-white"=><i class="fa-brands fa-instagram"></i></h1>
            <p class="card-text text-white">Follow Instagram saya :<br>rhmattbahri_</p>
            <a href="https://www.instagram.com/rhmattbahri_" class="btn btn-primary bg-danger">FOLLOW</a>
          </div>
        </div>

      </div>

        <div class="text" style="margin-top: 5px; text-align: center; font-size: 10px; color: whitesmoke; opacity: 0.4; margin-left: 640px;">
          Made by Rahmat (Kelompok 1 TRE B Malam)
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="monitoring.js"></script>
  </body>
</html>