<?php

    $app->get('/atendentes[/{id}]', function ($request, $response, $args) {
        return $response->write("Hello " . $args['name']);
    });

    $app->post('/atendentes/update', function ($request, $response, $args) {
        return $response->write("Hello " . $args['name']);
    });

    
    $app->post('/atendentes/new', function ($request, $response, $args) {
        return $response->write("Hello " . $args['name']);
    });


    $app->delete('/atendentes/{id}', function ($request, $response, $args) {
        return $response->write("Hello " . $args['id']);
    });
    
