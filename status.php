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

  </head>
  <body style="background: linear-gradient(to right, #a1d6e2, #008dcb, #98dbc6);">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
    style="background-color: skyblue; background: linear-gradient(to right, #002c54, #3a5199, #4897d8);">

      <a class="navbar-brand" href="#"><img src="image/poltek.png" alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
        <b>MONITORING FASILITAS LIFT POLIBATAM</b>
      </a>

        <div class="text mr-2 ml-auto" style="color: whitesmoke; font-size: 14px;">
          Hai, Teknisi Rahmat!
        </div>

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
      <div class="col-md-2 mt-2 pl-0,5 pr-3 pt-5" style="background: linear-gradient(to bottom, #00afb9, #66a5ad, #003b46);  height: 530px;">
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
        <h3><i class="fa-solid fa-desktop mr-3"></i> STATUS </h3><hr>

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

          <div class="row text-white" style="margin-top: 30px;">

          <!-- LIFT 1 -->
          <div class="card ml-4" id="card-lift1" style="width: 18rem;  border-radius: 20px;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-elevator mr-2"></i>
              </div>
              <h3 class="card-title">LIFT 1</h3>
              <div id="lift1-info" class="text pb-2">
                KONDISI : <b>Loading...</b><br>
                STATUS  : <b>Loading...</b>
              </div>
              
              <script>
                $(document).ready(function () {
                  function loadLiftData1() {
                    $.ajax({
                      url: "database/kondisi-lift1.php", // File PHP untuk Lift 1
                      method: "GET",
                      dataType: "json",
                      success: function (data) {
                        $("#lift1-info").html(
                          `KONDISI : <b>${data.kondisi}</b> <br> STATUS : <b>${data.status}</b>`
                        );
                        $("#card-lift1").removeClass("normal-berjalan abnormal-berhenti normal-berhenti");

                        // Tambahkan kelas warna berdasarkan kondisi dan status
                        if (data.kondisi === "NORMAL" && data.status === "BERJALAN") {
                          $("#card-lift1").addClass("normal-berjalan");
                        } else if (data.kondisi === "ABNORMAL" && data.status === "BERHENTI") {
                          $("#card-lift1").addClass("abnormal-berhenti");
                        } else if (data.kondisi === "NORMAL" && data.status === "BERHENTI") {
                          $("#card-lift1").addClass("normal-berhenti");
                        }
                      },
                      error: function () {
                        $("#lift1-info").html("KONDISI : <b>Error</b><br>STATUS : <b>Error</b>");
                      }
                    });
                  }

                  loadLiftData1();
                  setInterval(loadLiftData1, 1000);
                });
              </script>

              <a href="lift1.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <!-- LIFT 2 -->
          <div class="card ml-4" id="card-lift2" style="width: 18rem;  border-radius: 20px;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-elevator mr-2"></i>
              </div>
              <h3 class="card-title">LIFT 2</h3>
              <div id="lift2-info" class="text pb-2">
                KONDISI : <b>Loading...</b><br>
                STATUS  : <b>Loading...</b>
              </div>
              
              <script>
                $(document).ready(function () {
                  function loadLiftData2() {
                    $.ajax({
                      url: "database/kondisi-lift2.php", // File PHP untuk Lift 2
                      method: "GET",
                      dataType: "json",
                      success: function (data) {
                        $("#lift2-info").html(
                          `KONDISI : <b>${data.kondisi}</b> <br> STATUS : <b>${data.status}</b>`
                        );
                        $("#card-lift2").removeClass("normal-berjalan abnormal-berhenti normal-berhenti");

                        // Tambahkan kelas warna berdasarkan kondisi dan status
                        if (data.kondisi === "NORMAL" && data.status === "BERJALAN") {
                          $("#card-lift2").addClass("normal-berjalan");
                        } else if (data.kondisi === "ABNORMAL" && data.status === "BERHENTI") {
                          $("#card-lift2").addClass("abnormal-berhenti");
                        } else if (data.kondisi === "NORMAL" && data.status === "BERHENTI") {
                          $("#card-lift2").addClass("normal-berhenti");
                        }
                      },
                      error: function () {
                        // Jika gagal, tampilkan pesan error
                        $("#lift2-info").html("KONDISI : <b>Error</b><br>STATUS : <b>Error</b>");
                      }
                    });
                  }

                  loadLiftData2();
                  setInterval(loadLiftData2, 1000);
                });
              </script>

              <a href="lift2.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <!-- LIFT 3 -->
          <div class="card ml-4" id="card-lift3" style="width: 18rem;  border-radius: 20px;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-elevator mr-2"></i>
              </div>
              <h3 class="card-title">LIFT 3</h3>
              <div id="lift3-info" class="text pb-2">
                KONDISI : <b>Loading...</b><br>
                STATUS  : <b>Loading...</b>
              </div>
              
              <script>
                $(document).ready(function () {
                  function loadLiftData3() {
                    $.ajax({
                      url: "database/kondisi-lift3.php",
                      method: "GET",
                      dataType: "json",
                      success: function (data) {
                        $("#lift3-info").html(
                          `KONDISI : <b>${data.kondisi}</b> <br> STATUS : <b>${data.status}</b>`
                        );

                        $("#card-lift3").removeClass("normal-berjalan abnormal-berhenti normal-berhenti");

                        // Tambahkan kelas warna berdasarkan kondisi dan status
                        if (data.kondisi === "NORMAL" && data.status === "BERJALAN") {
                          $("#card-lift3").addClass("normal-berjalan");
                        } else if (data.kondisi === "ABNORMAL" && data.status === "BERHENTI") {
                          $("#card-lift3").addClass("abnormal-berhenti");
                        } else if (data.kondisi === "NORMAL" && data.status === "BERHENTI") {
                          $("#card-lift3").addClass("normal-berhenti");
                        }
                      },
                      error: function () {
                        $("#lift3-info").html("KONDISI : <b>Error</b><br>STATUS : <b>Error</b>");
                      },
                    });
                  }

                  loadLiftData3();
                  setInterval(loadLiftData3, 1000);
                });
              </script>

              <a href="lift3.php"><p class="card-text text-white">Lihat detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>
        </div>

        </div>
          <div class="text" style="margin-top: 150px; text-align: center; font-size: 10px; color: whitesmoke; opacity: 0.4;">
          Made by Rahmat (Kelompok 1 TRE B Malam)
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

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