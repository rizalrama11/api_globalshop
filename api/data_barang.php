<?php

    //import file
    include '../config/functions.php';
    //query sql
    $rssql = "SELECT * FROM flutter_barang";
    //dapatkan hasil
    $sql = mysqli_query($con, $rssql);
    //deklarasi array
    $response = array();

    $nomor = 1;

    while($a = mysqli_fetch_array($sql))
    {
        //memasukkan data field kedalam variabel
        $b['nomor'] = strval($nomor);
        $b['id_barang'] = $a['id_barang'];
        $b['id_kategori'] = $a['id_kategori'];
        $b['id_satuan'] = $a['id_satuan'];
        $b['userid'] = $a['userid'];
        $b['nama_barang'] = $a['nama_barang'];
        $b['harga'] = $a['harga'];
        $b['image'] = $a['image'];
        $b['tglexpired'] = $a['tglexpired'];
        $b['tglinput'] = $a['tglinput'];
        array_push($response, $b);
        $nomor++;
    }
    echo json_encode($response);
    ?>