<?php
    $userid = $_GET['userid'];
    include '../config/functions.php';

    $rssql = "SELECT DISTINCT(a.id_barang), a.userid, SUM(a.harga) AS harga, SUM(a.qty) AS qty, (SELECT nama_barang FROM flutter_barang WHERE id_barang = a.id_barang) AS nama_barang,
    (SELECT image FROM flutter_barang WHERE id_barang = a.id_barang) AS gambar FROM flutter_shopping_cart a WHERE a.userid = '$userid' AND id_barang in (SELECT id_barang FROM flutter_barang) GROIP BY a.id_barang";

    $sql = mysqli_query($con,$rssql);

    $response = array();
    while($a = mysqli_fetch_array($sql)){
        $b['id_barang'] = $a['id_barang'];
        $b['userid'] = $a['userid'];
        $b['nama_barang'] = $a['nama_barang'];
        $b['gambar'] = $a['gambar'];
        $b['harga'] = $a['harga'];
        $b['qty'] = $a['qty'];
        array_push($response, $b);
    }

    echo json_encode($response);

?>