<?php
    $userID = $_GET['userid'];

    include'../config/functions.php';

    $rssql = "SELECT IFNULL (SUM(qty),0) jumlah, IFNULL(SUM(harga),0) totalHarga FROM flutter_shopping_cart WHERE userid = '$userID'";

    $sql = mysqli_query($con, $rssql);

    $response = array();
    while($a = mysqli_fetch_array($sql)){
        $b['jumlah']        = $a['jumlah'];
        $b['totalharga']    = $a['totalharga'];
        array_push($response, $b);
    }

    echo json_encode($response);

?>