<?php
    include ("conexion.php");

class Menfermedad {
    

    function Menfermedad(){}
    
    function selcon($sql){
        $conBD= new conexion();
        $conBD->conectarBD();
        $conBD->ejecutarconsulta($sql, 2);
        $conBD->cerrarBD();
    }
    function selcontabla($sql){
        $conBD= new conexion();
        $conBD->conectarBD();
        $data = $conBD->ejecutarconsulta($sql, 1);
        $conBD->cerrarBD();
        return $data;
    }
    
    function insertar($nombre, $detalle)
    {
        $sql = "INSERT INTO enfermedad (nombre, detalle) VALUES  ('$nombre', '$detalle')";
        $this->selcon($sql);
        
    }
    function eliminar($idenfermedad)
    {
        $sql = "DELETE FROM enfermedad WHERE idenfermedad = '$idenfermedad'   ";
        $this->selcon($sql);
    }
    function actualizar($idenfermedad, $enfermedad, $detalle)
    {
        $sql = "UPDATE `enfermedad` SET `nombre`='$enfermedad',`detalle`='$detalle' WHERE idenfermedad = '$idenfermedad'";
        $this->selcon($sql);
    }
     function seleccionar()
    {
        $sql = "SELECT * FROM enfermedad";
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionaruno($idenfermedad)
    {
        $sql = "SELECT idenfermedad, nombre, detalle FROM enfermedad where idenfermedad ='$idenfermedad'" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
    
    
}

?>