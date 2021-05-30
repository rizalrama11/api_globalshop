<?php
include '../config/functions.php';

$nama_kategori  = $_POST['nama_kategori'];
$nama_tabel     = "flutter_kategori";
header('Content-Type: text/xml');

$hasil = $db->query("INSERT INTO $nama_tabel VALUES(NULL, '$nama_kategori') ");

if($hasil){
    $response['success'] = 1;
    $response['message'] = "Berhasil Disimpan";
    echo json_encode($response);
}
else{
    $response['success'] = 0;
    $response['message'] = "Data Gagal Disimpan";
    echo json_encode($response);
}
?>