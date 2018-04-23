<?php
$app->get('/api/ocorrencia', function () {
    header('Content-Type: application/json; charset=utf-8');
    $data = Ocorrencia::getOcorrenciaObjects();
    echo $data;
});
$app->get('/api/ocorrencia/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    $data = Ocorrencia::getOcorrenciaObject($id);
    echo $data;
});

$app->post('/api/ocorrencia', function ($request) {
    $ocorrencia = $request->getParsedBody();
    header('Content-Type: application/json; charset=utf-8');
    $data = Ocorrencia::createOcorrenciaObject($ocorrencia);
    echo $data;
});

$app->put('/api/ocorrencia/{id}', function ($request) {
    $id = $request->getAttribute('id');
    $ocorrencia = $request->getParsedBody();
    $ocorrencia['id'] = $id;
    header('Content-Type: application/json; charset=utf-8');
    $data = Ocorrencia::updateOcorrenciaObject($ocorrencia);
    echo $data;
});

$app->delete('/api/ocorrencia/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    Ocorrencia::deleteOcorrenciaObject($id);
});
