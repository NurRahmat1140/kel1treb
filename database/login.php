<?php
// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST['kelompok1trebmalam'];
    $password = $_POST['rahmatgans'];

    // Username dan password yang valid (contoh)
    $valid_username = "kelompok1trebmalam";
    $valid_password = "rahmatgans";

    // Validasi username dan password
    if ($username == $valid_username && $password == $valid_password) {
        echo "<h2>Login berhasil.</h2>";
    } else {
        echo "<h2>Login Gagal! Username atau password salah.</h2>";
    }
}
?>
