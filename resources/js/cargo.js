function insertarc()
{
    var n = document.getElementById("vchNombre").value;
    var d = document.getElementById("vchDescripcion").value;
    var op = "registrar";

    $.ajax({
        type: 'POST',
        url: '../Controllers/ccargo.php',
        data: { vchNombre: n, vchDescripcion: d, opcion: op},
        dataType: 'text',

        success: function (data) {


            $("#mensaje").html("<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Registrado Correctamente </div>");
            
            $(".alert").fadeTo(5000, 0).slideUp(5000, function () {
                $(this).remove();
            });


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });

}
function editarc(id)
{

   // alert("selecionando" + id);
    $.ajax({
        type: 'POST',
        url: '../Controllers/ccargo.php',
        data: {intCodigo: id, opcion: "editar"},
        dataType: 'JSON',
        success: function (regsel) {
            $("#myModal #aintCodigo").val(regsel.id);
            $("#myModal #avchNombre").val(regsel.nombre);
            $("#myModal #avchDescripcion").val(regsel.detalle);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
    $("#myModal").modal("toggle");
}

function actualizarc()
{
    var id = document.getElementById("aintCodigo").value;
    var n = document.getElementById("avchNombre").value;
    var d = document.getElementById("avchDescripcion").value;
    var op = "actualizar";

    $.ajax({
        type: 'POST',
        url: '../Controllers/ccargo.php',
        data: {intCodigo: id,  vchNombre: n, vchDescripcion: d, opcion: op},
        dataType: 'text',

        success: function (data) {
            $("#mensaje").html("<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Actualizado Correctamente </div>");
            
            $(".alert").fadeTo(5000, 0).slideUp(5000, function () {
                $(this).remove();
            });


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
$("#myModal").modal("hide");
}