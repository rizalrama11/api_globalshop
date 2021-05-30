<?php
include '../config/functions.php';

$id_satuan = $_POST['id_satuan'];

$namaTabel = "flutter_satuan";
header("Content-Type: text/xml");

$hasil = $db->query("DELETE FROM $namaTabel WHERE id_satuan = $id_satuan");
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