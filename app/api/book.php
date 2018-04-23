<?php
$app->get('/api/book', function () {
    header('Content-Type: application/json; charset=utf-8');
    $data = Book::getBookObjects();
    echo $data;
});

$app->get('/api/book/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    $data = Book::getBookObject($id);
    echo $data;
});

$app->post('/api/book', function ($request) {
    $book = $request->getParsedBody();
    header('Content-Type: application/json; charset=utf-8');
    $data = Book::createBookObject($book);
    echo $data;
});

$app->put('/api/book/{id}', function ($request) {
    $id = $request->getAttribute('id');
    $book = $request->getParsedBody();
    $book['id'] = $id;
    header('Content-Type: application/json; charset=utf-8');
    $data = Book::updateBookObject($book);
    echo $data;
});

$app->delete('/api/book/{id}', function ($request) {
    $id = $request->getAttribute('id');
    header('Content-Type: application/json; charset=utf-8');
    Book::deleteBookObject($id);
});
