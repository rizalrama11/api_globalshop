<?php
include '../config/functions.php';

$id_satuan  = $_POST['id_satuan'];
$nama_satuan  = $_POST['nama_satuan'];
$satuan  = $_POST['satuan'];

$namaTabel    = "flutter_satuan";
header('Content-Type: text/xml');

$hasil = $db->query("UPDATE $namaTabel SET nama_satuan = '$nama_satuan', satuan = '$satuan' WHERE
id_satuan = '$id_satuan' ");
if($hasil) {
  $response['success'] = 1;
  $response['message'] = "Berhasil di update";
  echo json_encode($response);
} else {
  $response['success'] = 0;
  $response['message'] = "Data gagal di update";
  echo json_encode($response);
}
?>