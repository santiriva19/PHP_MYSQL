<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Php con mySQL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Assets/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src = "../Js/Carrera.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class = "tituloCar">Carreras</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="btn-group-sm">
                            <button class  = "btn btn-outline-info" onclick="Consultar()">Consultar</button>
                            <button class  = "btn btn-outline-info" onclick="Guardar();">Guardar</button>
                            <button class  = "btn btn-outline-info" onclick="Modificar();">Modificar</button>
                            <input  
                                class  = "btn btn-outline-info" 
                                type="file" onchange="processSelectedFiles(this)"
                            >
                            <button id = "limpiar" class  = "btn btn-outline-info" onclick="Limpiar();">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-mg-6">
                            <label for = "codigo">Código: </label>
                            <input class = "form-control" type="text" placeholder="Código" autofocus id = "idCarrera">
                        </div>
                        <div class="col-mg-6">
                            <label for = "nombre">Nombre: </label>
                            <input class = "form-control" type="text" placeholder="Nombre" id = "nombre">
                        </div>
                        <div class="col-mg-6">
                            <label for = "extension">Extensión: </label>
                            <input class = "form-control" type="text" placeholder="Extensión" id = "extension">

                        </div>
                        
                    </div>
                    <br>
                    
                </div>
                <div class="card-footer">
                    <div class="card-header bg-info">
                        <h4 class = "tituloCar">Tabla de carreras</h4> 
                        <input type="text" class = "form-control" placeholder="Buscar por Id" id="buscarPorId" style="width : 30%; height : 10%; margin-left : 35%" onchange="ConsultarBusqueda();">
                    </div>
                    <table class = "table table-bordered">
                       <tr>
                           <th>Id</th>
                           <th>Nombre</th>
                           <th>Extensión</th>
                           <th style = "width : 11%">Foto</th>
                           <th>Acciones</th>
                       </tr>
                       <tbody id = "datos">

                       </tbody>

                        
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
