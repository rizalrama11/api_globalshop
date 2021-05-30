<?php
include '../config/functions.php';
$namaTabel = "flutter_shopping_cart";
$namaTabelBrg = "flutter_barang";
header('Content-Type: txt/xml');

$userID     = $_POST['userid'];
$id_barang  = $_POST['id_barang'];

$rssql = "SELECT qty, harga FROM $namaTabel where userid = '$userID' AND id_barang = '$id_barang'";

$getQty = 0;
$cekHarga = 0;

$sql = mysqli_query($con, $rssql);
while($a = mysqli_fetch_array($sql)){
    $sqlBrg = "SELECT harga FROM $namaTabelBrg where id_barang = '$id_barang'";
    $rssqlBrg = mysqli_query($con, $sqlBrg);
    while($b = mysqli_fetch_array($rssqlBrg)){
        $hargasatuan = $b['harga'];

    }
    $getQty += $a['qty'];
    $cekHarga += ($a['harga'] + $hargasatuan);
}

$qty  = ($getQty + 1);
$harga  = $cekHarga ==0 ? $_POST['harga'] : $cekHarga;

if($id_barang !=0)
{
    if($getQty > 0)
    {
        $hasil = $db -> query("UPDATE $namaTabel SET qty = '$qty', harga = '$harga' WHERE userid = '$userID' AND id_barang = '$id_barang' ");
    } else {
        $hasil = $db -> query("INSERT INTO $namaTabel VALUES(NULL, '$userID', '$id_barang', '$qty', '$harga', NOW()) ");
    }

    if($hasil)
    {
    $response['success'] = 1;
    $response['message'] = "Berhasil Tambah Data";
    echo json_encode($response);
    } else {
    $response['success'] = 0;
    $response['message'] = "Data Gagal Disimpan";
    echo json_encode($response);
    }
 } else {
    $response['success'] = 0;
    $response['message'] = "Maaf, Terjadi Kesalahan";
    echo json_encode($response);
    }

?>