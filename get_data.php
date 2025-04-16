<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT jawaban, COUNT(*) as jumlah FROM responden GROUP BY jawaban");

$response = [];
while ($row = $data->fetch_assoc()) {
  $response[] = $row;
}
echo json_encode($response);
