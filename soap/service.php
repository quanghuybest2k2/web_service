<?php

include "./client.php";

// $idArray = array('id' => '1');
$idArray = ['id' => '1'];
echo nl2br("=============================== service.php =====================\n
Sinh viên có id " . $idArray['id'] . " là: " . $client->getName($idArray));
