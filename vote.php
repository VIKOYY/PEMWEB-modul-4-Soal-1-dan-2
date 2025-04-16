<?php
include 'koneksi.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$calon_id = $_POST['calon_id'];

// Cek apakah NIK sudah digunakan
$cek = $koneksi->query("SELECT * FROM pemilih WHERE nik = '$nik'");
if ($cek->num_rows > 0) {
    echo "<script>alert('Anda sudah memilih sebelumnya. Setiap orang hanya boleh memilih 1 kali.');window.location='index.php';</script>";
} else {
    // Simpan data pemilih dan update suara
    $koneksi->query("INSERT INTO pemilih (nik, nama, gender, alamat) VALUES ('$nik', '$nama', '$gender', '$alamat')");
    $koneksi->query("UPDATE calon SET jumlah_suara = jumlah_suara + 1 WHERE id = $calon_id");

    echo "<script>alert('Terima kasih, suara Anda sudah direkam!');window.location='index.php';</script>";
}
