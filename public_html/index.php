<?php 
session_start();
require_once "../Mubeccel/Core/Config.php" ;
$req_uri = $_SERVER['REQUEST_URI'];
$req_method = $_SERVER['REQUEST_METHOD'];
$Mubeccel = new Mubeccel($req_uri,$req_method);

?>