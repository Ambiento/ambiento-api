<?php
//
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

require 'vendor/autoload.php';
$app = new \Slim\App;

require_once ('app/utils/database.php');

require_once('app/api/ocorrencia.php');

$app->run();
