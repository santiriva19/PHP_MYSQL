<?php

require 'conexion.php';

class GestorCarrera
{
    public function ConsultarTodo()
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL selectAllCarrs(); ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function ConsultarPorId($idCarrera)
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL selectOneCarr(?); ");
        $stmt->bindParam(1, $idCarrera);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function ConsultarBusqueda($idCarrera)
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL selectOneCarr(?); ");
        $stmt->bindParam(1, $idCarrera);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function Guardar($carrera)
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL guardarCarr(?,?,?,?); ");
        $stmt->bindParam(1, $carrera->idCarrera);
        $stmt->bindParam(2, $carrera->nombre);
        $stmt->bindParam(3, $carrera->extension);
        $stmt->bindParam(4, $carrera->foto);
   
        if($stmt->execute())
        {
            return "OK";
        }
        else
        {
            return "Error: Se ha generado un error al guardar la información";
        }

    }
    public function Modificar($idViejo, $carrera)
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL modificarCarr(?,?,?,?,?); ");
        $stmt->bindParam(1, $idViejo);
        $stmt->bindParam(2, $carrera->idCarrera);
        $stmt->bindParam(3, $carrera->nombre);
        $stmt->bindParam(4, $carrera->extension);
        $stmt->bindParam(5, $carrera->foto);
   
        if($stmt->execute())
        {
            return "OK";
        }
        else
        {
            return "Error: Se ha generado un error al modificar la información";
        }
    }
    public function Eliminar($idCarrera)
    {
        $conexion = new Conexion();
        $stmt = $conexion->prepare(" CALL eliminarCarr(?); ");
        $stmt->bindParam(1, $idCarrera);
        $stmt->execute();
        if($stmt->execute())
        {
            return "OK";
        }
        else
        {
            return "Error: Se ha generado un error al elimianr la información";
        }
    }


}


?>