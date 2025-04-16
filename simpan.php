<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$gender = $_POST['gender'];
$usia = $_POST['usia'];
$jawaban = $_POST['jawaban'];

$koneksi->query("INSERT INTO responden (nama, gender, usia, jawaban) 
VALUES ('$nama', '$gender', $usia, '$jawaban')");

header("Location: index.php");
