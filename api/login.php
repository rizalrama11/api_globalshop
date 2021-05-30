<?php
include '../config/functions.php';

$username = $_POST['username'];
$password = $_POST['password'];
$namaTabel = $_POST['flutter_user'];
header('Content-Type: text/xml');

$rows = $db->get_results("SELECT * FROM $namaTabel WHERE username = '$username' AND password ='$password'");

$jumrec  = $db->get_var("SELECT COUNT(*) FROM $namaTabel WHERE username ='$username' AND password ='$password'");

if($jumrec > 0)
{
    $response = array();
    foreach($rows as $row)
    {
        $response['userid'] = $row->userid;
        $response['username'] = $row->username;
        $response['nama'] = $row->nama;
        $response['level'] = $row->level;

    }
    $response['success'] = 1;
    $response['message'] = "Berhasil Login";
    echo json_encode($response);
}
else
{
    $response['success'] = 0;
    $response['message'] = "Tidak ada data" . $jumrec;
    echo json_encode($response);

}

?>