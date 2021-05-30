<?php
include '../config/functions.php';

$UserID         = $_POST['userid'];
$id_kategori    = $_POST['id_kategori'];
$id_satuan      = $_POST['id_satuan'];
$nama_barang    = $_POST['nama_barang'];
$harga          = $_POST['harga'];
$image          = date('dmYHid').str_replace(" ","",basename($_FILES['image']['name']));
$imagepath      = "../upload/". $image;
move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
$tglexpired     = $_POST['tglexpired'];
$namatabel      = "flutter_barang";
header('Content-Type: text/html');

$hasil = $db->query("INSERT INTO $namatabel VALUES(NULL, '$id_kategori','$id_satuan','$UserID','$nama_barang','$harga','$image','$tglexpired', NOW())");

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