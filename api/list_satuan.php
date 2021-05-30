<?php
    //config
    include '../config/functions.php';
    //query sql
    $rssql ="SELECT * FROM flutter_satuan";
    //dapatkan hasil
    $sql = mysqli_query($con, $rssql);
    //deklarasi array
    $response = array();

    $nomor = 1;

    while($a = mysqli_fetch_array($sql))
    {
        $b['nomor'] = strval($nomor);
        $b['id_satuan'] = $a['id_satuan'];
        $b['nama_satuan'] = $a['nama_satuan'];
        $b['satuan'] = $a['satuan'];
        array_push($response, $b);
        $nomor++;
    }

    echo json_encode($response);
    ?>