<?php

$app->get('/cliente[/{id}]', function ($request, $response, $args) {
       
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

   

   
   $app->post('/cliente/new', function ($request, $response, $args) {
       
       $atendente = $request->getBody();

       $usuario = new Usuario();
       $data = $usuario->novoUsuario($atendente->nome, $atendente->cpf, $atendente->email, $atendente->senha, 2 );

       if($data!= false){
          
           return $response->write(json_encode($data))->withStatus(200);
       }
       
       return $response->withStatus(500);
   
   });

   
   $app->post('/cliente/update/{id}', function ($request, $response, $args) {
   
    if(isset($args['id'])){

        $usuario = new Usuario();

        if($usuario->deletarUsuario($args['id']) != false){

            return $response->withStatus(200);

        }else{

            
            return $response->withStatus(500);

        }

    }else{

        return $response->withStatus(500);
    }

});



   $app->post('/cliente/delete/{id}', function ($request, $response, $args) {
   
       if(isset($args['id'])){

           $usuario = new Usuario();

           if($usuario->deletarUsuario($args['id']) != false){

               return $response->withStatus(200);

           }else{

               
               return $response->withStatus(500);

           }

       }else{

           return $response->withStatus(500);
       }
   
   });
   
