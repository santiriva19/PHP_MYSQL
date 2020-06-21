<?php

class Carrera
{

    public $idCarrera;
    public $nomrbe;
    public $extension;
    public $foto;

    function Carrera ($idCarrera, $nombre, $extension, $foto)
    {
        $this->idCarrera= $idCarrera;
        $this->nombre= $nombre;
        $this->extension= $extension;
        $this->foto= $foto;
    }
    function set_idCarrera($idCarrera)
    {
        $this->idCarrera = $idCarrera;
    }
    function get_idCarrera()
    {
        return $this->idCarrera;
    }

    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function get_nomrbe()
    {
        return $this->nombre;
    }
    function set_extension($extension)
    {
        $this->extension = $extension;
    }
    function get_extension_funcs()
    {
        return $this->extension;
    }
    function set_foto($foto)
    {
        $this->foto = $foto;
    }
    function foto()
    {
        return $this->foto;
    }
}


?>