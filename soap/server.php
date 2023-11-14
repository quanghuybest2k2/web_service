<?php

class Server
{
    public function __construct()
    {
    }

    public function getStudentName($idArray)
    {
        return "Teo";
    }
}

$params = array('uri' => 'server.php');
$server = new SoapServer(NULL, $params);
$server->setClass(("server"));
$server->handle();
