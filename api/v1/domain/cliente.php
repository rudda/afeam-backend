<?php
namespace afeam\api\domain;

use PDO;
    class Cliente{


        public static $DATABASE_NAME= "afeam";
        public static $DATABASE_PASS= "";
        public static $DATABASE_USER= "root";
        public static $DATABASE_PORT="80";
        public static $DATABASE_HOST= "localhost";
     
     
        public  $database;
     
         function  connect() {
     
             try {
     
                 $conn = new PDO('mysql:host='.self::$DATABASE_HOST.';dbname='.self::$DATABASE_NAME, self::$DATABASE_USER,self::$DATABASE_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 return $conn;
                 
             }
             catch(PDOException $e)
             {
                 return false;
             }
     
         }
     
         function listarTodosClientes(){
     
             $query = "select * from cliente ";
     
             $usuarios =  [];
     
             $database = $this->connect();
     
             if($database!= null && $database != false){
     
     
                 $stmt2= $database->query($query);
                
                
                 while( ($result = $stmt2->fetch(PDO::FETCH_ASSOC)) ){
             
                     array_push($usuarios, $result);
     
                     
                 }
        
     
                 return $usuarios;
     
             }else{
     
                 return false;
             }
     
         }
     
         function buscarCliente($id ){
     
             $query = "select * from cliente where id_cliente = $id";
             
             $database = $this->connect();
     
             if($database!= null && $database!= false){
     
                 $data = $database->query($query);
     
                 if($result = $data->fetch(PDO::FETCH_ASSOC) ){
     
                     return $result;
     
                 }else{
     
                     return false;
                 }
     
     
             }else{
                 return false;
             }
     
     
     
         }    
         
         function novoCliente( $nome, $cpf, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $obs, $status, $situacao,  $data_) {
     
          $database =$this->connect();
     
          
            try {
                 
                 if($database!= false && $database != null) {
                     
     
                     $query = "INSERT INTO cliente ( nome, cpf, telefone, logradouro, numero, bairro, cidade, uf, obs, status, situacao) VALUES ( '$nome', '$cpf', '$telefone', '$logradouro', '$numero', '$bairro', '$cidade', '$uf', '$obs', '$status', '$situacao')";

                        $data =  $database->prepare($query);
                     
                        
                         if($data->execute()){
     
                             $id_user =   $database->lastInsertId(); 
                          
                             return $this->buscarCliente($id_user);
                           
     
                         }else{
     
                             return false;
                         }
     
                     }else{
     
                         return false;
     
                     
                     }
                    
     
                 }catch(Exception $erro){
     
                     return false;
     
                 }            
     
          }       
     
         
          function atualizarCliente($id_cliente, $nome,$cpf, $telefone,$logradouro,$numero,$bairro,$cidade, $uf, $obs,$status, $situacao, $data_){

                $query =  "UPDATE `cliente` SET `nome`= '$nome',`cpf`='$cpf', `telefone`='$telefone',`logradouro`= '$logradouro',`numero`='$numero',`bairro`='$bairro',`cidade`= '$cidade',`uf`='$uf',`obs`='$obs',`status`= $status,`situacao`=$situacao,`data_`= '$data_' WHERE id_cliente = $id_cliente";

                $database = $this->connect();

                if($database!= false && $database != null){

                    $response = $database->prepare($query);

                    if($response->execute() && $response->rowCount() >0){


                        return $this->buscarCliente($id_cliente);

                    }else{

                        return false;

                    }

                }else{

                    return false;

                }



          }


        
          function deletarCliente($id){
     
             $query = "delete from cliente where id_cliente = $id";
     
             $database = $this->connect();
             if($database!= null && $database!= false){
     
                 $data = $database->prepare($query);
     
                 if($data->execute() && $data->rowCount()>0){

                    return true;

                 }

                 return false;
                 
             }else{
     
                 return false;
     
             }
     
     
          }
     
     
     
     




    }