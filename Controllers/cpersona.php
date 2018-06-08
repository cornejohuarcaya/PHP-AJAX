<?php

include ("../modelo/Mpersona.php");
include ("../modelo/modeloBd/Persona.php");
$persona = new Persona();
$opepersona = new Mpersona();



$intCodigo = isset($_POST["intCodigo"]) ? $_POST["intCodigo"] : NULL; //idpara eliminar
$vchNombre = isset($_POST["vchNombre"]) ? $_POST["vchNombre"] : NULL;
$vchApellido = isset($_POST["vchApellido"]) ? $_POST["vchApellido"] : NULL;
$chNumeroDocumento = isset($_POST["chNumeroDocumento"]) ? $_POST["chNumeroDocumento"] : NULL;
$vchTelefono = isset($_POST["vchTelefono"]) ? $_POST["vchTelefono"] : NULL;
$nvchCorreo = isset($_POST["nvchCorreo"]) ? $_POST["nvchCorreo"] : NULL;
$daFechaNacimiento = isset($_POST["daFechaNacimiento"]) ? $_POST["daFechaNacimiento"] : NULL;
$nvchDireccion = isset($_POST["nvchDireccion"]) ? $_POST["nvchDireccion"] : NULL;
$intCodigoUbigeo = isset($_POST["intCodigoUbigeo"]) ? $_POST["intCodigoUbigeo"] : NULL;
$vchFoto = isset($_POST["vchFoto"]) ? $_POST["vchFoto"] : NULL;
$intCodigoSexo = isset($_POST["intCodigoSexo"]) ? $_POST["intCodigoSexo"] : NULL;
$intCodigoEstadoCivil = isset($_POST["intCodigoEstadoCivil"]) ? $_POST["intCodigoEstadoCivil"] : NULL;
$intCodigoTipoDocumento = isset($_POST["intCodigoTipoDocumento"]) ? $_POST["intCodigoTipoDocumento"] : NULL;
$intCodigoTipoPersona = isset($_POST["intCodigoTipoPersona"]) ? $_POST["intCodigoTipoPersona"] : NULL;

$departamento = isset($_POST["departamento"]) ? $_POST["departamento"] : NULL;
$provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : NULL;

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : NULL; //variable enviada por ajax para ver el tipo de accion

global $datapersona, $regpersona;
$datapersona = NULL;
$regpersona = null;
$regeditar = null;


$persona->intCodigo = $intCodigo;
$persona->vchNombre = $vchNombre;
$persona->vchApellido = $vchApellido;

$persona->chNumeroDocumento = $chNumeroDocumento;
$persona->vchTelefono = $vchTelefono;
$persona->nvchCorreo = $nvchCorreo;
$persona->daFechaNacimiento = $daFechaNacimiento;
$persona->nvchDireccion = $nvchDireccion;
$persona->intCodigoUbigeo = $intCodigoUbigeo;
$persona->vchFoto = $vchFoto;
$persona->intCodigoSexo = $intCodigoSexo;
$persona->intCodigoEstadoCivil = $intCodigoEstadoCivil;
$persona->intCodigoTipoDocumento = $intCodigoTipoDocumento;
$persona->intCodigoTipoPersona = $intCodigoTipoPersona;

if ($opcion == "editar") {//si la opcion enviada por ajax es igual a editar retorna datos en json al modal para actualizar
    $regeditar = $opepersona->seleccionaruno($intCodigo);
    //6 M          7 F

    $regsel["intCodigo"] = $regeditar[1][0];
    $regsel["vchNombre"] = $regeditar[1][1];
    $regsel["vchApellido"] = $regeditar[1][2];
    $regsel["chNumeroDocumento"] = $regeditar[1][3];
    $regsel["vchTelefono"] = $regeditar[1][4];
    $regsel["nvchCorreo"] = $regeditar[1][5];
    $regsel["daFechaNacimiento"] = $regeditar[1][6];
    $regsel["nvchDireccion"] = $regeditar[1][7];
    $regsel["intCodigoUbigeo"] = $regeditar[1][8];
    $regsel["vchFoto"] = $regeditar[1][9];
    $regsel["intCodigoSexo"] = $regeditar[1][10];

    $regsel["intCodigoEstadoCivil"] = $regeditar[1][11];
    $regsel["intCodigoTipoDocumento"] = $regeditar[1][12];
    $regsel["intCodigoTipoPersona"] = $regeditar[1][13];


    echo json_encode($regsel);
}
if ($opcion == "registrar") {// insertando enfermedad
    $opepersona->insertar($persona);
    echo "Guardado Correctamente";
}

if (isset($_POST["Visualizar"])) { // ver la tabla completa de registros
    $datapersona = $opepersona->seleccionar();
}
if ($opcion == "eliminar") { //eliminar tablas
    $opepersona->eliminar($intCodigo);
}

if ($opcion == "actualizar") { // actualizando desde el modal
    $opepersona->actualizar($persona);
}

if ($opcion == "mostrartabla") {
    $datapersona = $opepersona->seleccionar();

    echo '<table class="table " >';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Nombre</th>';
    echo '<th>Apellido</th>';
    echo '<th>NumDoc</th>';
    echo '<th>Telefono</th>';
    echo '<th>Correo</th>';
    echo '<th>Fec. Nac.</th>';
    echo '<th>Sexo</th>';
    echo '<tr>';

    echo '</thead>';
    for ($index = 1; $index < count($datapersona); $index++) {
        echo'<form method="post" action="#"  >';
        echo "<tr>";
        echo "<td>" . $datapersona[$index][0] . "</td>";
        echo "<td>" . $datapersona[$index][1] . "</td>";
        echo "<td>" . $datapersona[$index][2] . "</td>";
        echo "<td>" . $datapersona[$index][3] . "</td>";
        echo "<td>" . $datapersona[$index][4] . "</td>";
        echo "<td>" . $datapersona[$index][5] . "</td>";
        echo "<td>" . $datapersona[$index][6] . "</td>";
        if ($datapersona[$index][10] == "6") {
            echo "<td>M</td>";
        } elseif ($datapersona[$index][10] == "7"){
            echo "<td>F</td>";
        }




        echo'<td><input type="button" class="btn btn-danger" value="Eliminar" onclick="eliminarper(' . $datapersona[$index][0] . ');"> </input></td>';
        echo'<td><input type="submit" class="btn btn-warrning" name="Ver" value="Ver" >  </input></td>';
        echo'<td><input type="button"  class="btn btn-info" onclick="editarper(' . $datapersona[$index][0] . ');" name="Ver" value="Editar" >  </input></td>';


        echo '</tr>';
        echo '</form>';
    }
    echo '</table>';
}
?>