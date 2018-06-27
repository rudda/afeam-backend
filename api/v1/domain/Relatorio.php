<?php
namespace afeam\api\domain;
use PDO;

class Relatorio{

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
 

     function execute($query){

        $database = $this->connect();

        if($database != null && $database!= false){

            $data = $database->prepare($query);

            $data_resonse= [];

            if($data->execute() && $data->rowCount()>0){
         
                while($result = $data->fetch(PDO::FETCH_ASSOC)){

                    array_push($data_resonse, $result);

                }

                return $data_resonse;

            }


            return false;

            
            
        }else{

            return false;
            
        }


     }


    function relatorioClienteComStatusEmProcesso($mes, $ano){

        $query =  "SELECT * FROM `cliente` WHERE MONTH(`data_`) = $mes and YEAR(`data_`) = $ano and status= 1";

        $reponse =  $this->execute($query);

        if($reponse!= false){

            return $this->output($reponse);


        }else{

            return false;

        }


    }

    function relatorioClientesComStatusDeferido($mes, $ano){

        
        $query =  "SELECT * FROM `cliente` WHERE MONTH(`data_`) = $mes and YEAR(`data_`) = $ano and status= 2";

        
        $reponse =  $this->execute($query);

        if($reponse!= false){

           return  $this->output($reponse);


        }else{

            return false;

        }


    }

    function relatorioClienteComStatusIndeferido($mes, $ano){

        
        $query =  "SELECT * FROM `cliente` WHERE MONTH(`data_`) = $mes and YEAR(`data_`) = $ano and status= 3";

        
        $reponse =  $this->execute($query);

        if($reponse!= false){

           return  $this->output($reponse);


        }else{

            return false;

        }


    }

    function relatorioDeTodosOsClientes($mes, $ano){

        $query =  "SELECT * FROM `cliente` WHERE MONTH(`data_`) = $mes and YEAR(`data_`) = $ano";

     

        $reponse =  $this->execute($query);

        if($reponse!= false){

            return $this->output($reponse);


        }else{

            return false;

        }


    }


    function output($array){

        $html = "";
        $row  = "";

        for($i=0; $i<count($array); $i++){

           
            $situ = $array[$i]['situacao'] == 1 ? "Analise de Documentos" : $array[$i]['situacao'] == 2 ? 'Pesquisa Cadastral' : $array[$i]['situacao'] == 3 ? 'Visita Tecnica' : $array[$i]['situacao'] == 4 ? "Assinatira de Contrato": 'Liberação'; 

            $status = $array[$i]['status'] == 1 ? "Em Processo" : $array[$i]['status'] == 2 ? 'Deferido' : 'Indeferido';

            $nome = "<h4> Nome: ".$array[$i]['nome']."</h4>";
            $cpf = "<b> cpf: </b>".$array[$i]['cpf'];
            $logradouro = "<b> logradouro: </b>".$array[$i]['logradouro'];
            $bairo = "<b> bairro: </b>".$array[$i]['bairro'];
            $cidade = "<b> cidade: </b>".$array[$i]['cidade'];
            $uf = "<b> uf: </b>".$array[$i]['uf'];
            $obs = "<b> obs: </b>".$array[$i]['obs'];
            $status = "<b> status: </b>".$status;
            $situacao = "<b> situacao: </b>".$situ;
                        
            $row .= $nome;
            $row .= $cpf."<br>";
            $row .= $logradouro."<br>";
            $row .= $bairo."<br>";
            $row .= $cidade."<br>";
            $row .= $uf."<br>";
            $row .= $obs."<br>";
            $row .= $status."<br>";
            $row .= $situacao."<br>";
            $row.= "<br> <br>";

        }

        return $row;

    }


}