<?php
    //import file
    include '../config/functions.php';
    //query sql
    $rssql ="SELECT * FROM flutter_kategori";
    //dapatkan hasil
    $sql = mysqli_query($con, $rssql);
    //deklarasi array
    $response = array();
    $nomor = 1;

    while($a = mysqli_fetch_array($sql))
    {
        $b['nomor'] = strval($nomor);
        $b['id_kategori'] = $a['id_kategori'];
        $b['nama_kategori'] = $a['nama_kategori'];
        array_push($response, $b);
        $nomor++;
    }

    echo json_encode($response);
    ?>