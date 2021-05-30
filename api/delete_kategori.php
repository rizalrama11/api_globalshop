<?php
include '../config/functions.php';

$id_kategori = $_POST['id_kategori'];

$namaTabel = "flutter_kategori";
header("Content-Type: text/xml");

$hasil = $db->query("DELETE FROM $namaTabel WHERE id_kategori = $id_kategori");
if($hasil) {
    $response['success'] = 1;
    $response['message'] = "Berhasil Hapus Data";
    echo json_encode($response);
} else {
    $response['success'] = 0;
    $response['message'] = "Data Gagal Dihapus";
    echo json_encode($response);
}

?>