<?php
include '../config/functions.php';

$namaTabel = "flutter_shopping_cart";
$TabelProduk = "flutter_barang";
$TabelJual = "flutter_penjualan";
$TabelJualDetail = "flutter_penjualan_detail";
header('Content-Type: text/xml');

$UserID = $_POST['userid'];
$grandTotal = $_POST['grandtotal'];
$nilaibayar = $_POST['nilaibayar'];
$nilaikembali = $_POST['nilaikembali'];

if($UserID != "")
{
    $hasil = $db->query("INSERT INTO $TabelJual VALUES(NULL, '', '$UserID', NOW(), '$grandTotal', '$nilaibayar', '$nilaikembali') ");

    if($hasil)
    {
        $id_faktur = "0";
        $sqlF = "SELECT IFNULL(id_faktur,0) id_faktur FROM flutter_penjualan order by id_faktur DESC limit 1";
        $rssqlF = mysqli_query($con, $sqlF);
        while($f = mysqli_fetch_array($rssqlF)){
            $id_faktur = $f['id_faktur'];
        }

        $rssql = "SELECT a.id_barang id_barang, a.qty qty, a.harga harga, b.nama_barang nama_barang FROM $namaTabel a join $TabelProduk b on a.id_barang = b.id_barang
            where a.userid = '$UserID' ";
        
        $sql = mysqli_query($con, $rssql);
        while($a = mysqli_fetch_array($sql)){
            $id_barang = $a['id_barang'];
            $qty = $a['qty'];
            $harga = $a['harga'];

            $hasildetail = $db->query("INSERT INTO $TabelJualDetail VALUES(NULL, '$id_faktur', '$id_barang', '$qty', '$harga')");

            if($hasildetail)
            {
                $ddel = $db->query("DELETE FROM $namaTabel WHERE userid = '$UserID'");

                if($ddel)
                {
                    $response['success'] = 1;
                    $response['message'] = "Berhasil Tambah Data";
                    echo json_encode($response);
                }
                else
                {
                    $response['success'] = 0;
                    $response['message'] = "Data cart gagal dihapus";
                    echo json_encode($response);
                }
            }
            else
            {
                $response['success'] = 0;
                $response['message'] = "Data detail gagal disimpan";
                echo json_encode($response);
            }
        }
    }
    else 
    {
        $response['success'] = 0;
        $response['message'] = "Data master gagal disimpan";
        echo json_encode($response);
    }
}
else
{
    $response['success'] = 0;
    $response['message'] = "Maaf, terjadi kesalahan";
    echo json_encode($response);
}


?>