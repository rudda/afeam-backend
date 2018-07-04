<?php
use afeam\api\domain\Usuario;


    $app->get('/atendentes[/{id}]', function ($request, $response, $args) {
       
        $usuario =  new Usuario();

        if(isset($args['id'])){

            $usuario->login("01102312345", "123");
            
            

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

    

    
    $app->post('/atendentes/new', function ($request, $response, $args) {
        
        $body = $request->getBody();

        $atendente = json_decode($body);

        $usuario = new Usuario();
        $data = $usuario->novoUsuario($atendente->nome, $atendente->cpf, $atendente->email, $atendente->senha, $atendente->tipo);

        if($data!= false){
           
            return $response->write(json_encode($data))->withStatus(200);
        }
        
        return $response->withStatus(500);
    
    });


    $app->post('/atendentes/delete/{id}', function ($request, $response, $args) {
    
        if(isset($args['id'])){

            $usuario = new Usuario();

            if($data = $usuario->deletarUsuario($args['id']) != false){

                return $response->withStatus(200);

            }else{

                
                return $response->withStatus(500);

            }

        }else{

            return $response->withStatus(500);
        }
    
    });
    
