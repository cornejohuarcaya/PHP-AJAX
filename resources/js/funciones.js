function insertar()
{


    var e = document.getElementById("enfermedad").value;
    var d = document.getElementById("detalle").value;
    var opcion = "registrar";

    $.ajax({
        type: 'POST',
        url: '../Controllers/cenfermedad.php',
        data: {enfermedad: e, detalle: d, opcion: "registrar"},
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
function editar(id)
{

    alert("selecionando" + id);
    $.ajax({
        type: 'POST',
        url: '../Controllers/cenfermedad.php',
        data: {aidenfermedadajax: id},
        dataType: 'JSON',
        success: function (regsel) {
            $("#myModal #aidenfermedad").val(regsel.id);
            $("#myModal #aenfermedad").val(regsel.nombre);
            $("#myModal #adetalle").val(regsel.detalle);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
    $("#myModal").modal("toggle");
}


  