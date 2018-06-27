<?php

    class Usuario {

        public static $DATABASE_NAME= "afeam";
        public static $DATABASE_PASS= "";
        public static $DATABASE_USER= "root";
        public static $DATABASE_PORT="80";
        public static $DATABASE_HOST= "localhost";


       public  $database;

       function connect(){

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

    function listarTodosUsuarios($tipo){

        $query = "select * from usuario where tipo = $tipo";

        $usuarios =  [];

        $database = $this->connect();
        if($database!= null && $database != false){


            $stmt2= $database->query($query);
           
            while( ($result = $stmt2->fetch(PDO::FETCH_ASSOC)) != null ){
        
                array_push($usuarios, $result);

                
            }
           

            return $usuarios;

        }else{

            return false;
        }

    }

    function buscarUsuario($id=0, $tipo=1){

        $query = "select * from usuario where id_usuario = $id and tipo = $tipo";




    }    
    
    function novoUsuario( $nome, $cpf, $email, $senha, $tipo) {

            $database =$this->connect();

            if($database!= false && $database != null){

                $query = "INSERT INTO `usuario`( `nome`, `cpf`, `email`, `senha`, `tipo`) VALUES ( $nome , $cpf, $email, $senha, $tipo)";
                
                if($database->execute($query)){

                    return true;

                }else{

                    return false;
                }

            }else{

                return false;

            }


        }



    }
