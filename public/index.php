<?php
require 'vendor/autoload.php';
$app = new \Slim\App;

require_once ('app/utils/database.php');
require_once ('app/model/ocorrencia.php');

// o caminho não é ../app/api... pq?
require_once('app/api/ocorrencia.php');

$app->run();
