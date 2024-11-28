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

    <script type="text/javascript" src="jquery/jquery.min.js"></script>

    <!-- load otomatis / real-time -->
    <script type="text/javascript">
      $(document).ready(function() {

        setInterval( function() {
          $("#lift1").load("lift1.php");
        }, 1000 );

      } );
    </script>

  </head>
  <body style="background: linear-gradient(to right, #a1d6e2, #008dcb, #98dbc6);">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
    style="background-color: skyblue; background: linear-gradient(to right, #002c54, #3a5199, #4897d8);">
      <a class="navbar-brand" href="#"><img src="image/poltek.png" alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
        <b>MONITORING FASILITAS LIFT POLIBATAM</b>
      </a>
      
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 bg-white" type="submit">Search</button>
        </form>

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
      <div class="col-md-2 mt-2 pl-0,5 pr-3 pt-5" style="background: linear-gradient(to bottom, #00afb9, #66a5ad, #003b46);  height: 500px;">
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
        <h3><i class="fa-regular fa-message mr-3"></i> RIWAYAT (LOG HISTORY) </h3><hr>

          <!-- menampilkan tanggal dan waktu -->
          <div class="container-jam">
            <h5 class="container-fontjam">Tanggal dan Jam:</h5>
              <span id="datetime"></span>
              <script>
                // create a function to update the date and time
                function updateDateTime() {
                  // create a new `Date` object
                  const now = new Date();

                  // get the current date and time as a string
                  const currentDateTime = now.toLocaleString();

                  // update the `textContent` property of the `span` element with the `id` of `datetime`
                  document.querySelector('#datetime').textContent = currentDateTime;
                }

                // call the `updateDateTime` function every second
                setInterval(updateDateTime, 1000);
              </script>
            <!-- akhir menampilkan tanggal dan waktu -->

            <table class="table table-bordered" style="display: block; margin-top: 10px; font-size: 12px; background-color: whitesmoke; max-height: 300px; width: auto; overflow-y: auto;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="width: 20px; text-align: center;">no</th>
                  <th scope="col" style="width: 190px; text-align: center;">Tanggal & Jam</th>
                  <th scope="col" style="width: 100px; text-align: center;">Lift</th>
                  <th scope="col" style="width: 650px; text-align: center;">Deskripsi</th>
                </tr>
              </thead>
              <tbody>
              <!-- Data dari dt_riwayat.php akan dimuat di sini 
                   data tersebut mengikuti dari output yang keluar dari database
                   seperti contoh : [{"tanggal_jam":"25\/11\/2024 19:30","lift":"LIFT 1","deskripsi":"Sedang mengalami abnormality"}] -->

              <script type="text/javascript">
                $(document).ready(function() {

                  // Fungsi untuk memuat data riwayat terbaru
                  function loadData() {
                    $.ajax({
                      url: "database/dt_riwayat.php",  // Ganti dengan URL yang benar untuk mendapatkan data dari database
                      method: "GET",
                      dataType: "json",
                      success: function(data) {
                        var tableBody = $("table tbody");  // Menargetkan <tbody> dari tabel
                        tableBody.empty();  // Hapus data yang sudah ada di tabel

                        // Looping data yang diterima dan menambahkannya ke tabel
                        data.forEach(function(item, index) {
                          var newRow = $("<tr>");
                          newRow.append("<td style='text-align: center;'>" + item.id + "</td>");  
                          newRow.append("<td style='text-align: center;'>" + item.tanggal_jam + "</td>");  
                          newRow.append("<td style='text-align: center;'>" + item.lift + "</td>");  // Menambahkan nama lift
                          newRow.append("<td>" + item.deskripsi + "</td>"); 

                          // Menambahkan baris baru di bagian atas tabel
                          tableBody.append(newRow);  // Menggunakan .prepend untuk menambahkan di atas
                        });
                      }
                    });
                  }

                  // Memuat data setiap 1 detik
                  setInterval(loadData, 1000);
                });
              </script>

              </tbody>
            </table>
        </div>
        <div class="text" style="margin-top: 50px; text-align: center; font-size: 10px; color: whitesmoke; opacity: 0.4;">
          Made by Rahmat (Kelompok 1 TRE B Malam)
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript" src="monitoring.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

  </body>
</html>