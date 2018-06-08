<?php

class conexion{
    
  var $cnBD;   

 function conexion(){ }
    
 function  conectarBD()
 {  
     include ("configuracion.php");
   $this -> cnBD= mysqli_connect($serverbd, $usuariobd, $passwordbd, $nombrebd);
   if (!$this->cnBD)   //-> apuntador
     {
     echo "Error en la conexion";
     }
 }

function ejecutarconsulta($con,$opcion )
{
    $data[]=Null;
    
    $recordset = mysqli_query( $this -> cnBD, $con);
    if ($opcion==1) // 1 select
    {
             while ($linea= mysqli_fetch_array($recordset))
            {
               $data[]=$linea;
            }
    }
    /*else
    {
        $data[]=null;
    }
    */
    $dat= isset($data)? $data:NULL;
    
    if ($dat)
    {
        return $dat;
    }
    
}

function cerrarBD()
{
    mysqli_close($this-> cnBD);
}
 
}
?>
