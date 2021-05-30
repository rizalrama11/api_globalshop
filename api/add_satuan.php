<?php
include '../config/functions.php';

$nama_satuan    = $_POST['nama_satuan'];
$satuan         = $_POST['satuan'];
$nama_tabel     = "flutter_satuan";
header('Content-Type: text/xml');

$hasil = $db->query("INSERT INTO $nama_tabel VALUES(NULL, '$nama_satuan', '$satuan') ");

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