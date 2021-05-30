<?php
include '../config/functions.php';

$idProduk       = $_POST['idProduk'];
$id_kategori  = $_POST['id_kategori'];
$id_satuan    = $_POST['id_satuan'];
$nama_barang  = $_POST['nama_barang'];
$harga        =  $_POST['harga'];
$tglexpired   =$_POST['tglexpired'];
if($_FILES['image']['name'] != "") {
    $image        = date('dmYHid').str_replace(" ","",
                    basename($_FILES['image']['name']));
    $imagePath    ="../upload/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    $queryFoto = " , image = '$image' ";
}

$namaTabel    = "flutter_barang";
header('Content-Type: text/xml');

$hasil = $db->query("UPDATE $namaTabel SET nama_barang='$nama_barang', harga='$harga'
$queryFoto , tglexpired='$tglexpired', id_kategori='$id_kategori', id_satuan='$id_satuan' WHERE
id_barang = '$idProduk' ");
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