<?php
use afeam\api\domain\Usuario;

$app->post('/usuarios/login/{cpf}/{senha}', function ($request, $response, $args) {
    $usuario = new Usuario();
    $data = $usuario->login($args['cpf'], $args['senha']); 
    
    if($data != false){

        return  $response->write( json_encode(  $data ))->withStatus(200);            


    }

    return  $response->write( json_encode(  $data ))->withStatus(500);            

   
});

$app->post('/usuarios/recuperar/{cpf}', function ($request, $response, $args) {
    $usuario = new Usuario();
    $data = $usuario->recuperar($args['cpf']);

    if($data != false){

        return  $response->write( json_encode(  $data ))->withStatus(200);


    }

    return  $response->write( json_encode(  $data ))->withStatus(500);


});