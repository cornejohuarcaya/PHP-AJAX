<?php
 include ("../modelo/Menfermedad.php");
 
  $opeespecialidad= new Menfermedad();
  
  $nombre = isset($_POST["enfermedad"]) ? $_POST["enfermedad"]:NULL;
  
  $descripcion = isset($_POST["detalle"]) ? $_POST["detalle"]:NULL;
  $intcodigo = isset($_POST["idenfermedad"]) ? $_POST["idenfermedad"]:NULL;

    $aenfermedad = isset($_POST["aenfermedad"]) ? $_POST["aenfermedad"]:NULL;
  $adetalle = isset($_POST["adetalle"]) ? $_POST["adetalle"]:NULL;
  $aidajax = isset($_POST["aidenfermedadajax"]) ? $_POST["aidenfermedadajax"]:NULL;
  $aid = isset($_POST["aidenfermedad"]) ? $_POST["aidenfermedad"]:NULL;
   $opcion=isset($_POST["opcion"]) ? $_POST["opcion"]:NULL;
   
   global $datapersona, $regpersona;
   $datapersona =NULL;
   $regpersona=null;
   $regeditar=null;

    if (isset($_POST["aidenfermedadajax"]))//mostrando datos al modal
    {
    //echo "editando " . $aid . " asd";
     
      $regeditar =$opeespecialidad->seleccionaruno($aidajax);
      $regsel["id"]=$regeditar[1][0];
      $regsel["nombre"]=$regeditar[1][1];
      $regsel["detalle"]=$regeditar[1][2];
      
     echo json_encode($regsel);
    }
    if( $opcion=='registrar' )// insertando enfermedad
        { 
        //if($enfermedad && $detalle)  { 
     
        $opeespecialidad-> insertar($nombre, $descripcion);
        echo "Guardado Correctamente";
    }  
    
    if (isset($_POST["Visualizar"])) // ver la tabla
    {
            $datapersona =$opeespecialidad->seleccionar();
    }
    if (isset($_POST["Eliminar"])) //eliminar tablas
    {
    $opeespecialidad->eliminar($intcodigo);
    }
    
   elseif (isset($_POST["Ver"]))  //ver todo el registro completo
  {
   $regpersona =$opeespecialidad->seleccionaruno($intcodigo);    
  }
    
   if (isset($_POST["Actualizar"])) // actualizando desde el modal
    {
    $opeespecialidad->actualizar($aid, $aenfermedad, $adetalle );
     echo "Actualizado ";
    }
    

?>