<?php
header('Content-Type: application/json');

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "rfid_data");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data dari tabel lift1
$sql = "SELECT id, kondisi, status FROM lift3 ORDER BY id DESC LIMIT 1"; // Asumsi hanya ada satu data yang diambil
$result = $conn->query($sql);

// Inisialisasi respons default
$response = [
    'kondisi' => 'Tidak Diketahui',
    'status' => 'Tidak Diketahui'
];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Logika untuk menyesuaikan output berdasarkan data
    $response['kondisi'] = ($row['kondisi'] === 'NORMAL') ? 'NORMAL' : 'ABNORMAL';
    $response['status'] = ($row['status'] === 'BERJALAN') ? 'BERJALAN' : 'BERHENTI';
}

// Kirimkan data sebagai JSON
echo json_encode($response);

// Tutup koneksi
$conn->close();
?>
