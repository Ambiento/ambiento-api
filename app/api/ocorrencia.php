<?php

require_once ('app/model/ocorrenciaModel.php');

$app->get('/api/occurrence', function () {
    header('Content-Type: application/json; charset=utf-8');
    $data = Occurrence::getOccurrenceObjects();
    echo $data;
});

$app->get('/api/occurrence/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    $data = Occurrence::getOccurrenceObject($id);
    echo $data;
});

$app->post('/api/occurrence', function ($request) {
    $ocorrencia = $request->getParsedBody();
    header('Content-Type: application/json; charset=utf-8');
    $data = Occurrence::createOccurrenceObject($ocorrencia);
    echo $data;
});

$app->put('/api/occurrence/{id}', function ($request) {
    $id = $request->getAttribute('id');
    $ocorrencia = $request->getParsedBody();
    $ocorrencia['id'] = $id;
    header('Content-Type: application/json; charset=utf-8');
    $data = Occurrence::updateOccurrenceObject($ocorrencia);
    echo $data;
});

$app->delete('/api/occurrence/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    Occurrence::deleteOccurrenceObject($id);
});
