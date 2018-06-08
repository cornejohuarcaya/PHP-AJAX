function insertarper()
{
    alert("registrando");
    var a = document.getElementById("vchNombre").value;
    var b = document.getElementById("vchApellido").value;
    var c = document.getElementById("chNumeroDocumento").value;
    var d = document.getElementById("vchTelefono").value;
    var e = document.getElementById("nvchCorreo").value;
    var f = document.getElementById("daFechaNacimiento").value;
    var g = document.getElementById("nvchDireccion").value;
    var h = document.getElementById("intCodigoUbigeo").value;
    var i = document.getElementById("vchFoto").value;
    var j = document.getElementById("intCodigoSexo").value;
    var k = document.getElementById("intCodigoEstadoCivil").value;
    var l = document.getElementById("intCodigoTipoDocumento").value;
    var m = document.getElementById("intCodigoTipoPersona").value;
    var op = "registrar";
    alert("registrando" + a);

    $.ajax({
        type: 'POST',
        url: '../Controllers/cpersona.php',
        data: {vchNombre: a, vchApellido: b, chNumeroDocumento: c, vchTelefono: d, nvchCorreo: e, daFechaNacimiento: f, nvchDireccion: g, intCodigoUbigeo: h, vchFoto: i, intCodigoSexo: j, intCodigoEstadoCivil: k, intCodigoTipoDocumento: l, intCodigoTipoPersona: m, opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#mensaje").html(data + "<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Registrado Correctamente </div>");
        }
    });

}

function mostrartablaper()
{
    //alert("viendo tabla");
    var op = "mostrartabla";

    $.ajax({
        type: 'POST',
        url: '../Controllers/cpersona.php',
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
function editarper(id)
{
    
    
    //mostrardepartamento();
    // alert("selecionando" + id);
    var ubigeo=0;
    $.ajax({
        type: 'POST',
        url: '../Controllers/cpersona.php',
        data: {intCodigo: id, opcion: "editar"},
        dataType: 'JSON',
        success: function (regsel) {
            $("#myModal #aintCodigo").val(regsel.intCodigo);
            $("#myModal #avchNombre").val(regsel.vchNombre);
            $("#myModal #avchApellido").val(regsel.vchApellido);
            $("#myModal #achNumeroDocumento").val(regsel.chNumeroDocumento);
            $("#myModal #avchTelefono").val(regsel.vchTelefono);
            $("#myModal #adaFechaNacimiento").val(regsel.daFechaNacimiento);
            $("#myModal #anvchDireccion").val(regsel.nvchDireccion);
            $("#myModal #avchFoto").val(regsel.vchFoto);
            $("#myModal #anvchCorreo").val(regsel.nvchCorreo);
            ubigeo=regsel.intCodigoUbigeo;
            
            cargarcomboubigeocercanos(ubigeo);
            
            //autosaleccionando combo
            
            selectInCombovalue('aintCodigoSexo', regsel.intCodigoSexo);
            selectInCombovalue('aintCodigoEstadoCivil', regsel.intCodigoEstadoCivil);
            selectInCombovalue('aintCodigoTipoDocumento', regsel.intCodigoTipoDocumento);
            selectInCombovalue('aintCodigoTipoPersona', regsel.intCodigoTipoPersona);
            
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });

    
    $("#myModal").modal("toggle");
    //
}

function actualizarper()
{
    alert("actualizando");
    var a = document.getElementById("aintCodigo").value;
    var b = document.getElementById("avchNombre").value;
    var c = document.getElementById("avchApellido").value;
    var d = document.getElementById("achNumeroDocumento").value;
    var e = document.getElementById("avchTelefono").value;
    var f = document.getElementById("anvchCorreo").value;
    var g = document.getElementById("adaFechaNacimiento").value;
    var h = document.getElementById("anvchDireccion").value;
    var i = document.getElementById("aintCodigoUbigeo").value;
    var j = document.getElementById("avchFoto").value;
    var k = document.getElementById("aintCodigoSexo").value;
    var l = document.getElementById("aintCodigoEstadoCivil").value;
    var m = document.getElementById("aintCodigoTipoDocumento").value;
    var n = document.getElementById("aintCodigoTipoPersona").value;

    var op = "actualizar";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cpersona.php',

        data: {intCodigo: a, vchNombre: b, vchApellido: c, chNumeroDocumento: d, vchTelefono: e, nvchCorreo: f, daFechaNacimiento: g, nvchDireccion: h, intCodigoUbigeo: i, vchFoto: j, intCodigoSexo: k, intCodigoEstadoCivil: l, intCodigoTipoDocumento: m, intCodigoTipoPersona: n, opcion: op},
        dataType: 'text',

        success: function (data) {
            $("#mensaje").html(data + "<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Actualizado Correctamente </div>");

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


function eliminarper(id)
{
    alert("eliminanando registro" + id);
    var op = "eliminar";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cpersona.php',
        data: {intCodigo: id, opcion: op},
        success: function (data) {
            $("#mensaje").html(data + "<div  id='mensaje' class=' alert alert-primary alert-dismissible  fade  show'   >Eliminado Correctamente </div>");
            mostrartablaesp();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error " + jqXHR.toString() + textStatus + errorThrown);
        }
    });
}

function selectInCombovalue(combo, val)
{
    //alert("seleccionando " + val);
    for (var indice = 0; indice < document.getElementById(combo).length; indice++)
    {
      //  alert("valor del combo " + combo + "  " + document.getElementById(combo).options[indice].value)
        if (document.getElementById(combo).options[indice].value === val)
            document.getElementById(combo).selectedIndex = indice;
    }
}
function selectInCombotext(combo , val)
{
    
    for (var indice = 0; indice < document.getElementById(combo).length; indice++)
    {
        if (document.getElementById(combo).options[indice].text === val)
            document.getElementById(combo).selectedIndex = indice;
    }
}