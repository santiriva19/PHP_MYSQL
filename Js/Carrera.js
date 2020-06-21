var url = "./../Controlador/carrera.controlador.php";

var idViejo = "";
var rutaImagen = "./../Assets/Imagenes/";
var foto = "sinFoto.jpeg";

function Consultar()
{
    $.ajax({
        url : url,
        data : {"accion" : "CONSULTAR"},
        type : 'POST',
        dataType : 'json'

    }).done(function(response){
        var html = "";
        $.each(response, function(index, data)
        {
            html += "<tr>";

                html += "<td>"+ data.idCarrera +"</td>";
                html += "<td>"+ data.nombre +"</td>";
                html += "<td>"+ data.extension +"</td>";
                html += "<td>"+ "<img style = 'heigth : 100%; width : 100%' src= '../Assets/Imagenes/"+data.foto+"'/>"+"</td>";
                html += "<td>";
                    html += "<button class = 'btn btn-warning' onclick = 'ConsultarPorId("+ data.idCarrera +");'>Modificar</button>";
                    html += "<button class = 'btn btn-danger' onclick = 'Eliminar("+ data.idCarrera +");'>Eliminar</button>";
                html += "</td>";

            html += "</tr>";

            document.getElementById("datos").innerHTML = html;
        }
        );

    }).fail(function(response){
        console.log(response)
    })
}
function ConsultarBusqueda()
{
    var textoBusqueda = document.getElementById("buscarPorId").value;

    if(textoBusqueda == "")
    {
        this.Consultar();
    }
    else
    {
        $.ajax({
            url : url,
            data : {"idCarrera" : textoBusqueda, "accion" : "CONSULTAR_BUSCA"},
            type : 'POST',
            dataType : 'json'

        }).done(function(response){
            var html = "";
            $.each(response, function(index, data)
            {
                html += "<tr>";

                    html += "<td>"+ data.idCarrera +"</td>";
                    html += "<td>"+ data.nombre +"</td>";
                    html += "<td>"+ data.extension +"</td>";
                    html += "<td>";
                        html += "<img style = 'heigth : 100%; width : 100%' src= '../Assets/Imagenes/"+data.foto+"'/>"
                    html += "</td>";
                    html += "<td>";
                        html += "<button class = 'btn btn-warning' onclick = 'ConsultarPorId("+ data.idCarrera +");'>Modificar</button>";
                        html += "<button class = 'btn btn-danger' onclick = 'Eliminar("+ data.idCarrera +");'>Eliminar</button>";
                    html += "</td>";

                html += "</tr>";

                document.getElementById("datos").innerHTML = html;
            }
            );

        }).fail(function(response){
            console.log(response)
        })
    }
}
function ConsultarPorId(idCarrera)
{
    $.ajax({
        url : url,
        data : {"idCarrera" : idCarrera, "accion" : "CONSULTAR_ID"},
        type : 'POST',
        dataType : 'json'

    }).done(function(response){

        document.getElementById('idCarrera').value = response.idCarrera;
        document.getElementById('nombre').value = response.nombre;
        document.getElementById('extension').value = response.extension;

    }).fail(function(response){
        console.log(response)
    })
    idViejo = idCarrera;
}
function Guardar()
{
    $.ajax({
        url : url,
        data : retornarDatos("GUARDAR"),
        type : 'POST',
        dataType : 'json'

    }).done(function(response){
        if(response == "OK")
        {
            alert("Datos guardados con éxito");
            Limpiar();
            Consultar();

        }
        else
        {
            alert(response);
        }
    }).fail(function(response){
        console.log(response)
    })
    
}
function Modificar()
{
    $.ajax({
        url : url,
        data : retornarDatos("MODIFICAR"),
        type : 'POST',
        dataType : 'json'

    }).done(function(response){
        if(response == "OK")
        {
            alert("Datos modificados con éxito");
            Limpiar();
            Consultar();
        }
        else
        {
            alert(response);
        }

    }).fail(function(response){
        console.log(response)
    })
}
function Eliminar(idCarrera)
{
    $.ajax({
        url: url,
        data: { "idCarrera": idCarrera, "accion": "ELIMINAR" },
        type: 'POST',
        dataType: 'json'
    }).done(function(response) {
        if (response == "OK") {
            alert("Datos eliminados con éxito");
        } else {
            alert(response);
        }
        Consultar();
    }).fail(function(response) {
        console.log(response);
    });
    
}

function processSelectedFiles(fileInput) 
{
    var files = fileInput.files;
    this.foto = files[0].name;
}

function retornarDatos(accion)
{
    return{
        "idCarrera" : document.getElementById('idCarrera').value,
        "nombre" : document.getElementById('nombre').value,
        "extension" : document.getElementById('extension').value,
        "foto" : this.foto,
        "idViejo" : idViejo,
        "accion" : accion,
    }
}

function Limpiar()
{
    document.getElementById("idCarrera").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("extension").value = "";
}
