<?php

class Conexion extends PDO
{

    public function __construct()
    {
        try
        {
            parent::__construct("mysql:host=127.0.0.1;dbname=mydb" , "root" , "root");
            parent::exec("set names utf-8");
        }
        catch(PDOException $e)
        {
            echo "Error al cnectar " . $e->getMessage();
        }

    }
    
}


?>