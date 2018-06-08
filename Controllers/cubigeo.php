<?php
include ("../modelo/Mubigeo.php");

$opeubigeo = new Mubigeo();



$intCodigoUbigeo = isset($_POST["intCodigoUbigeo"]) ? $_POST["intCodigoUbigeo"] : NULL; //idpara eliminar

$departamento = isset($_POST["departamento"]) ? $_POST["departamento"] : NULL;
$provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : NULL;

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : NULL; //variable enviada por ajax para ver el tipo de accion

global $datadepartamento, $dataprovincia, $datadistrito;
//manejo de ubigeo
$datadepartamento = null;
$dataprovincia = null;
$datadistrito = null;


if ($opcion == "mostrardepartamento") {
    echo '<option>--Departamento--</option>';
    $datadepartamento = $opeubigeo->seleccionardepartamento();
    for ($index = 1; $index < count($datadepartamento); $index++) {
        echo '<option value="' . $datadepartamento[$index][0] . '">' . $datadepartamento[$index][1] . '</option>';
    }
}
if ($opcion == "mostrarprovincia") {
    echo '<option>--Provincia--</option>';
    $dataprovincia = $opeubigeo->seleccionarprovincia($intCodigoUbigeo);
    for ($index = 1; $index < count($dataprovincia); $index++) {
        echo '<option value="' . $dataprovincia[$index][0] . '">' . $dataprovincia[$index][1] . '</option>';
    }
}
if ($opcion == "mostrardistrito") {
    echo '<option>--Distrito--</option>';
    $datadistrito = $opeubigeo->seleccionardistrito($intCodigoUbigeo);
    for ($index = 1; $index < count($datadistrito); $index++) {
        echo '<option value="' . $datadistrito[$index][0] . '">' . $datadistrito[$index][1] . '</option>';
    }
}
if ($opcion == "cargarubigeomodal") {
    echo '<option value="0001">--Distrito--</option>';
    $datadistrito = $opeubigeo->seleccionardistritoscercanos($intCodigoUbigeo);
    for ($index = 1; $index < count($datadistrito); $index++) {
        echo '<option value="' . $datadistrito[$index][0] . '">' . $datadistrito[$index][1] . '</option>';
    }
}
if ($opcion == "mostrarmodalprovincia") {
    echo '<option value="00001">--Provincia--</option>';
    $dataprovincia = $opeubigeo->seleccionarprovinciascercanas($intCodigoUbigeo);
    for ($index = 1; $index < count($dataprovincia); $index++) {
        echo '<option value="' . $dataprovincia[$index][0] . '">' . $dataprovincia[$index][1] . '</option>';
    }
}

?>