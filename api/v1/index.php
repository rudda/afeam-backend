<?php
require ('../../vendor/autoload.php');


$app = new \Slim\App();

include 'routers/cors.php';
include 'routers/atendente.php';
include 'routers/cliente.php';
include 'routers/relatorio.php';
include 'routers/user.php';

// app route test
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

// Run app
$app->run();


