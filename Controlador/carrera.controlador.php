<?php
    require '../Modelo/carrera.modelo.php';
    require '../Negocio/carrera_negocio.php';

    if($_POST)
    {
        $gestorCarrera = new GestorCarrera();

        switch($_POST["accion"])
        {
            case "CONSULTAR":
                echo json_encode($gestorCarrera->ConsultarTodo());
            break;
            case "CONSULTAR_ID":
                echo json_encode($gestorCarrera->ConsultarPorId($_POST["idCarrera"]));
            break;
            case "CONSULTAR_BUSCA":
                echo json_encode($gestorCarrera->ConsultarBusqueda($_POST["idCarrera"]));
            break;
            case "GUARDAR":
                $idCarrera = $_POST["idCarrera"];
                $nombre = $_POST["nombre"];
                $extension = $_POST["extension"];
                $foto = $_POST["foto"];

                if($idCarrera == "")
                {
                    echo json_encode("Debe ingresarle un id a la carrera");
                    return;
                }
                else if($nombre == "")
                {
                    echo json_encode("Debe ingresarle un nombre a la carrera");
                    return;
                }
                else if($extension == "")
                {
                    echo json_encode("Debe ingresarle una extension a la carrera");
                    return;
                }
                else
                {
                    $carrera = new Carrera($idCarrera, $nombre, $extension, $foto);
                    $respuesta = $gestorCarrera->Guardar($carrera);
                    echo json_encode($respuesta);
                }
            break;
            case "MODIFICAR":
                $idViejo = $_POST["idViejo"];
                $idCarrera = $_POST["idCarrera"];
                $nombre = $_POST["nombre"];
                $extension = $_POST["extension"];
                $foto = $_POST["foto"];

                if($idCarrera == "")
                {
                    echo json_encode("Debe ingresarle un id a la carrera");
                    return;
                }
                else if($nombre == "")
                {
                    echo json_encode("Debe ingresarle un nombre a la carrera");
                    return;
                }
                else if($extension == "")
                {
                    echo json_encode("Debe ingresarle una extension a la carrera");
                    return;
                }
                else
                {
                    $carrera = new Carrera($idCarrera, $nombre, $extension, $foto);
                    $respuesta = $gestorCarrera->Modificar($idViejo, $carrera);
                    echo json_encode($respuesta);
                }
            break;
            case "ELIMINAR":
                $idCarrera = $_POST["idCarrera"];
                

                if($idCarrera == "")
                {
                    echo json_encode("Debe ingresarle un id a la carrera");
                    return;
                }
                else
                {
                    $respuesta = $gestorCarrera->Eliminar($idCarrera);
                    echo json_encode($respuesta);
                }
            break;
        }
    }
?>