
$(document).ready(function(){
   $("#departamento").change(function () {
           mostrarprovincia();
   });
});

$(document).ready(function(){
   $("#provincia").change(function () {
           mostrardistrito();
   });
});


$(document).ready(function(){
   $(" #adepartamento").change(function () {
        //alert("seleccionando modal dep");   
       mostrarprovinciam();
   });
});

$(document).ready(function(){
   $("#aprovincia").change(function () {
           mostrardistritom();
   });
});

function mostrardepartamento()
{   
    var op = "mostrardepartamento";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: {  opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#departamento").html(data);
             $("#adepartamento").html(data);
        }    });
}
function mostrarprovincia()
{
    var iddep= document.getElementById("departamento").value;
    
    var op = "mostrarprovincia";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: iddep, opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#provincia").html(data);
            //alert(data);
           // $("#frmmodal #aprovincia").html(data);
        }    });
}
function mostrardistrito()
{
    var id= document.getElementById("provincia").value;
    //alert("cargando dep");
    var op = "mostrardistrito";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: id, opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#intCodigoUbigeo").html(data);
        }    });
}

//cargando modales
function mostrarprovinciam()
{
    var iddep= document.getElementById("adepartamento").value;
    
//    alert("cargando dep" + departamento);
    var op = "mostrarprovincia";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: iddep, opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#frmmodal #aprovincia").html(data);
        }    });
}
function mostrardistritom()
{
    var id= document.getElementById("aprovincia").value;
    //alert("cargando dep");
    var op = "mostrardistrito";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: id, opcion: op},
        dataType: 'text',
        success: function (data) {
            $("#aintCodigoUbigeo").html(data);
        }    });
}
//cargar  dep prov dist del lugar seleccionado
function cargarcomboubigeocercanos(ubigeo)
{
  //  alert("seleccionaodo departamento modal " + ubigeo.substr(0,2));
  // alert("cargando distritos " + ubigeo);
    var op = "cargarubigeomodal";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: ubigeo, opcion: op},
        dataType: 'text',
        success: function (dat) {
            $("#aintCodigoUbigeo").html(dat);
            selectInCombovalue('aintCodigoUbigeo', ubigeo);
            
        }    });
    
   // alert("cargando provincias " + ubigeo);
     op = "mostrarprovincia";
    $.ajax({
        type: 'POST',
        url: '../Controllers/cubigeo.php',
        data: { intCodigoUbigeo: ubigeo, opcion: op},
        dataType: 'text',
        success: function (prov) {
            $("#aprovincia").html(prov);
            //alert("seleccionaodo departamento modal " + ubigeo.substr(0,2));
            selectInCombovalue('aprovincia',  ubigeo.substr(0,4) );
            selectInCombovalue('adepartamento',  ubigeo.substr(0,2) );
            
            //var combo = document.getElementById("aintCodigoUbigeo");
            //var selected = combo.options[combo.selectedIndex].text;
            //alert("seleccionar "+selected);
            //selectInCombotext('aprovincia', selected);
        }    });
    
    
}