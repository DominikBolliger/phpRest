<?php

require("db.php");
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$db = new DataBaseConfig("localhost", "root", "");
$db->createConnection();


$pos = $db->select();

response("200", $pos);

$db->closeConnection();

function response($status, $data)
{
    header("HTTP/1.1 " . $status);
    $response = $data;
    echo json_encode($response);
}

?>
