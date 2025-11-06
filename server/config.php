<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dataionic";

// 🔹 Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// 🔹 Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}
?>