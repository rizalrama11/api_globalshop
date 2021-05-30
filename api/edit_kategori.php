<?php
include '../config/functions.php';

$id_kategori  = $_POST['id_kategori'];
$nama_kategori  = $_POST['nama_kategori'];

$namaTabel    = "flutter_kategori";
header('Content-Type: text/xml');

$hasil = $db->query("UPDATE $namaTabel SET nama_kategori='$nama_kategori' WHERE
id_kategori = '$id_kategori' ");
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