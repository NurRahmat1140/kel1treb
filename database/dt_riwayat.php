<?php

header('Content-Type: application/json');

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "rfid_data");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data riwayat, urutkan berdasarkan tanggal_jam terbaru
$sql = "SELECT id, tanggal_jam, lift, deskripsi FROM utilities_data ORDER BY tanggal_jam DESC";

$result = $conn->query($sql);

// Array untuk menyimpan data
$data = [];

if ($result->num_rows > 0) {
    // Loop melalui hasil query
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

// Tutup koneksi
$conn->close();
?>
