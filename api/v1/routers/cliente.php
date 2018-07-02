<?php
use afeam\api\domain\Cliente;

 $app->get('/clientes[/{id}]', function ($request, $response, $args) {
       
       $usuario =  new Cliente();

       if(isset($args['id'])){

           $resp =  $usuario->buscarCliente($args['id']);

           if($resp!= null && $response!= false ){

               return  $response->write(json_encode($resp))->withStatus(200);
           }


       }else{

           $resp  = $usuario->listarTodosClientes();
          
           if($resp!= null && $response!= false ){

               return  $response->write(json_encode($resp))->withStatus(200);
           }

       }
    
     
       return  $response->write('erro')->withStatus(500);
     
});

   
$app->post('/clientes/new', function ($request, $response, $args) {
       
        $body = $request->getBody();

        $cliente = json_decode($body);

             
       $usuario = new Cliente();
      
       
       $data_ = '';

       $data = $usuario->novoCliente($cliente->nome, $cliente->cpf,  $cliente->telefone,$cliente->logradouro, $cliente->numero, $cliente->bairro,$cliente->cidade, $cliente->uf, $cliente->obs, $cliente->status, $cliente->situacao, $data_ );

       
       if($data!= false){
          
           return $response->write(json_encode($data))->withStatus(200);
       }
       
       return $response->withStatus(500);
   
   });

   
$app->post('/clientes/update/{id}', function ($request, $response, $args) {
   
    if(isset($args['id'])){

        $body = $request->getBody();
        $cliente = json_decode($body);
     
        $data_ = date('Y-m-d H:m:s', time());
         $cli = new Cliente();

         $data = $cli->atualizarCliente($args['id'], $cliente->nome, $cliente->cpf,  $cliente->telefone,$cliente->logradouro, $cliente->numero, $cliente->bairro,$cliente->cidade, $cliente->uf, $cliente->obs, $cliente->status, $cliente->situacao, $data_ );
        if($data != false){
          
            return $response->write(json_encode($data))->withStatus(200);

        }else{

            
            return $response->withStatus(500);

        }

    }else{

        return $response->withStatus(500);
    }

});



$app->post('/clientes/delete/{id}', function ($request, $response, $args) {
   
       if(isset($args['id'])){

           $usuario = new Cliente();

           if($usuario->deletarCliente($args['id']) != false){

               return $response->withStatus(200);

           }else{

               
               return $response->withStatus(500);

           }

       }else{

           return $response->withStatus(500);
       }
   
   });
   
