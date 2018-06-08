<?php
 include ("../modelo/Mcargo.php");
 include ("../modelo/modeloBd/Cargo.php");
 $especialidad= new Cargo();
  $opeespecialidad= new Mcargo();
  
  $nombre = isset($_POST["vchNombre"]) ? $_POST["vchNombre"]:NULL;
  $descripcion = isset($_POST["vchDescripcion"]) ? $_POST["vchDescripcion"]:NULL;
  $intcodigo = isset($_POST["intCodigo"]) ? $_POST["intCodigo"]:NULL; //idpara eliminar

   $opcion=isset($_POST["opcion"]) ? $_POST["opcion"]:NULL; //variable enviada por ajax para ver el tipo de accion
   
   global $datapersona, $regpersona;
   $datapersona =NULL;
   $regpersona=null;
   $regeditar=null;
   
   $especialidad->intCodigo=$intcodigo;
   $especialidad->vchNombre=$nombre;
   $especialidad->vchDescripcion=$descripcion;

    if ($opcion=="editar")//si la opcion enviada por ajax es igual a editar retorna datos en json al modal para actualizar
    {
    //echo "editando " . $aid . " asd";
     
      $regeditar =$opeespecialidad->seleccionaruno($intcodigo);
      $regsel["id"]=$regeditar[1][0];
      $regsel["nombre"]=$regeditar[1][1];
      $regsel["detalle"]=$regeditar[1][2];
      
     echo json_encode($regsel);
    }
    if( $opcion=='registrar' )// insertando enfermedad
        { 
        $especialidad->vchNombre=$nombre;
        $especialidad->vchDescripcion=$descripcion;
     
        $opeespecialidad-> insertar($especialidad);
        echo "Guardado Correctamente";
    }  
    
    if (isset($_POST["Visualizar"])) // ver la tabla completa de registros
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
    
   if ($opcion== "actualizar") // actualizando desde el modal
    {
    $opeespecialidad->actualizar($especialidad );
    }
    

?>