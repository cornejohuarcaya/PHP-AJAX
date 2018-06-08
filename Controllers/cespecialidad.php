<?php

include ("../modelo/Mespecialidad.php");
include ("../modelo/modeloBd/Especialidad.php");
$especialidad = new Especialidad();
$opeespecialidad = new Mespecialidad();

$intCodigo = isset($_POST["intCodigo"]) ? $_POST["intCodigo"] : NULL;
$vchNombre = isset($_POST["vchNombre"]) ? $_POST["vchNombre"] : NULL;
$vchDescripcion = isset($_POST["vchDescripcion"]) ? $_POST["vchDescripcion"] : NULL;
$dcPrecio = isset($_POST["dcPrecio"]) ? $_POST["dcPrecio"] : NULL;
$intMaximoPaciente = isset($_POST["intMaximoPaciente"]) ? $_POST["intMaximoPaciente"] : NULL;
$intCantidadAdicional = isset($_POST["intCantidadAdicional"]) ? $_POST["intCantidadAdicional"] : NULL;

$opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : NULL; //variable enviada por ajax para ver el tipo de accion

global $datapersona, $regpersona;
$datapersona = NULL;
$regpersona = null;
$regeditar = null;

//asignacion de los campos al objetoespecialidad
$especialidad->intCodigo = $intCodigo;
$especialidad->vchNombre = $vchNombre;
$especialidad->vchDescripcion = $vchDescripcion;
$especialidad->dcPrecio = $dcPrecio;
$especialidad->intMaximoPaciente = $intMaximoPaciente;
$especialidad->intCantidadAdicional = $intCantidadAdicional;

if ($opcion == "editar") {//si la opcion enviada por ajax es igual a editar retorna datos en json al modal para actualizar
    //echo "editando " . $aid . " asd";

    $regeditar = $opeespecialidad->seleccionaruno($intCodigo);
    $regsel["id"] = $regeditar[1][0];
    $regsel["a"] = $regeditar[1][1];
    $regsel["b"] = $regeditar[1][2];
    $regsel["c"] = $regeditar[1][3];
    $regsel["d"] = $regeditar[1][4];
    $regsel["e"] = $regeditar[1][5];

    echo json_encode($regsel);
}
if ($opcion == 'registrar') {// insertando enfermedad

    $opeespecialidad->insertar($especialidad);
    echo "Guardado Correctamente" + $especialidad->vchNombre;
}

if (isset($_POST["Visualizar"])) { // ver la tabla completa de registros
    $datapersona = $opeespecialidad->seleccionar();
}
if ($opcion=="eliminar") { //eliminar tablas
    $opeespecialidad->eliminar($intCodigo);
    
} elseif (isset($_POST["Ver"])) {  //ver todo el registro completo
    $regpersona = $opeespecialidad->seleccionaruno($intCodigo);
}

if ($opcion == "actualizar") { // actualizando desde el modal
    $opeespecialidad->actualizar($especialidad);
}


if ($opcion == "mostrartabla") {
    $datapersona = $opeespecialidad->seleccionar();

    echo '<table class="table " >';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Especialidad</th>';
    echo '<th>Descripcion</th>';
    echo '<th>Precio</th>';
    echo '<th>Max. Pacientes</th>';
    echo '<th>Pacientes Adicionales</th>';
    echo '<th>Eliminar</th>';
    echo '<th>Ver</th>';
    echo '<th>Editar</th>';
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

        echo '<input type="hidden" name="idenfermedad" id="intcodigo" value="' . $datapersona[$index][0] . '">';
        echo'<td><input type="submit" class="btn btn-danger" value="Eliminar" onclick="eliminaresp('.$datapersona[$index][0].');"> </input></td>';
        echo'<td><input type="submit" class="btn btn-warrning" name="Ver" value="Ver" >  </input></td>';
        echo'<td><input type="button"  class="btn btn-info" onclick="editaresp(' . $datapersona[$index][0] . ');" name="Ver" value="Editar" >  </input></td>';


        echo '</tr>';
        echo '</form>';
    }
    echo '</table>';
}
?>