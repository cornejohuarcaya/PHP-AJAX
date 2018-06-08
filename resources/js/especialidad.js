function insertaresp()
{
    //insertar 
    var a = document.getElementById("vchNombre").value;
    var b = document.getElementById("vchDescripcion").value;
    var c = document.getElementById("dcPrecio").value;
    var d = document.getElementById("intMaximoPaciente").value;
    var e = document.getElementById("intCantidadAdicional").value;
    var op = "registrar";
    alert("registrando" + a + b + c + d + e + op);
    $.ajax({
        type: 'POST',
        url: '../Controllers/cespecialidad.php',
        data: {vchNombre: a, vchDescripcion: b, dcPrecio: c, intMaximoPaciente: d, intCantidadAdicional: e, opcion: op},
        dataType: 'text',

        success: function (data) {


            $("#mensaje").html("<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Registrado Correctamente </div>");

            $(".alert").fadeTo(5000, 0).slideUp(5000, function () {
                $(this).remove();
            });
            mostrartablaesp();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });

}
function editaresp(id)
{

    // alert("selecionando" + id);
    $.ajax({
        type: 'POST',
        url: '../Controllers/cespecialidad.php',
        data: {intCodigo: id, opcion: "editar"},
        dataType: 'JSON',
        success: function (regsel) {
            $("#myModal #aintCodigo").val(regsel.id);
            $("#myModal #avchNombre").val(regsel.a);
            $("#myModal #avchDescripcion").val(regsel.b);
            $("#myModal #adcPrecio").val(regsel.c);
            $("#myModal #aintMaximoPaciente").val(regsel.d);
            $("#myModal #aintCantidadAdicional").val(regsel.e);
            

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
    $("#myModal").modal("toggle");
}

function actualizaresp()
{
    //actualizar 
    var a = document.getElementById("aintCodigo").value;
    var b = document.getElementById("avchNombre").value;
    var c = document.getElementById("avchDescripcion").value;
    var d = document.getElementById("adcPrecio").value;
    var e = document.getElementById("aintMaximoPaciente").value;
    var f = document.getElementById("aintCantidadAdicional").value;
    var op = "actualizar";

    $.ajax({
        type: 'POST',
        url: '../Controllers/cespecialidad.php',
        data: {intCodigo: a, vchNombre: b, vchDescripcion: c, dcPrecio: d, intMaximoPaciente: e, intCantidadAdicional: f, opcion: op},
        dataType: 'text',

        success: function (data) {
            $("#mensaje").html("<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Actualizado Correctamente </div>");

            $(".alert").fadeTo(5000, 0).slideUp(5000, function () {
                $(this).remove();
            });
            mostrartablaesp();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
    $("#myModal").modal("hide");
}

function mostrartablaesp()
{
    alert("viendo tabla");
    var op = "mostrartabla";

    $.ajax({
        type: 'POST',
        url: '../Controllers/cespecialidad.php',
        data: {opcion: op},
        dataType: 'text',

        success: function (data) {
            $("#tablacontenedor").html(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
}

function eliminaresp(id)
{
    alert("eliminanando registro" + id);
    var op = "eliminar";

    $.ajax({
        type: 'POST',
        url: '../Controllers/cespecialidad.php',
        data: {intCodigo: id, opcion: op},
        dataType: 'text',

        success: function (data) {
            $("#mensaje").html( "<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Eliminado Correctamente </div>");
            mostrartablaesp();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
}