<?php

require("db.php");
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$db = new DataBaseConfig("localhost", "root", "");
$db->createConnection();
$pos = $db->select();
$db->closeConnection();

response("200", $pos);

function response($status, $data)
{
    header("HTTP/1.1 " . $status);
    $response = $data;
    echo json_encode($response);
}

?>
