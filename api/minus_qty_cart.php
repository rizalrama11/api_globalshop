<?php

include '../config/functions.php';
$namaTabel = "flutter_shopping_cart";
$namaTabelBrg = "flutter_barang";
header('Content-Type: text/xml');

$userID     = $_POST['userid'];
$id_barang  = $_POST['id_barang'];

if($id_barang != 0)
{
    $rssql = "SELECT qty, harga FROM $namaTabel WHERE userid = '$userID' AND id_barang = '$id_barang'";

    $getQty = 0;
    $cekHarga = 0;
    $hargaSatuan = 0;

    $sql = mysqli_query($con, $rssql);
    while($a = mysqli_fetch_array($sql))
    {
        $sqlBrg = "SELECT harga FROM $namaTabelBrg WHERE id_barang = '$id_barang'";
        $rssqlBrg = mysqli_query($con, $sqlBrg);
        while($b = mysqli_fetch_array($rssqlBrg)){
            $hargaSatuan = $b['harga'];
        }

        $getQty = $a['qty'];
        $cekHarga = ($a['harga']);
    }

    $qty    = ($getQty - 1);
    $harga  = $cekHarga == 0 ? 0 : ($cekHarga - $hargaSatuan);

    if($getQty > 0)
    {
        $hasil = $db->query("UPDATE $namaTabel SET qty = '$qty', harga = '$harga' WHERE userid = '$userID' AND id_barang = '$id_barang'");
    }
    else
    {
        $hasil = $db->query("DELETE FROM $namaTabel WHERE userid = '$userID' AND id_barang = '$id_barang'");
    }

    if($hasil)
    {
        $response['success'] = 1;
        $response['message'] = "Berhasil update data";
        echo json_encode($response);
    }
    else
    {
        $response['success'] = 0;
        $response['message'] = "Data gagal disimpan";
        echo json_encode($response);

    }

}
else 
{
    $response['success'] = 0;
    $response['message'] = "Maaf, terjadi kelasahan". $_POST['id_barang'];
    echo json_encode($response);

}

?>