<?php
use afeam\api\domain\Usuario;


    $app->get('/atendentes[/{id}]', function ($request, $response, $args) {
       
        $usuario =  new Usuario();

        if(isset($args['id'])){

            $resp =  $usuario->buscarUsuario($args['id']);

            if($resp!= null && $response!= false ){

                return  $response->write(json_encode($resp))->withStatus(200);
            }


        }else{

            $resp  = $usuario->listarTodosUsuarios();
           
            if($resp!= null && $response!= false ){

                return  $response->write(json_encode($resp))->withStatus(200);
            }

        }
     
      
        return  $response->write('erro')->withStatus(500);
      
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
    
