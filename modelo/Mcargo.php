<?php
    include ("conexion.php");
    
class Mcargo {
    

    function Mcargo(){}
    
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
    
    function insertar(Cargo $vcargo)
    {
        $sql = "INSERT INTO cargo (vchNombre, vchDescripcion) VALUES  ('$vcargo->vchNombre', '$vcargo->vchDescripcion')";
        $this->selcon($sql);
        
    }
    function eliminar($id)
    {
        $sql = "DELETE FROM cargo WHERE intCodigo = '$id'  ";
        $this->selcon($sql);
    }
    function actualizar(Cargo $vcargo)
    {
        $sql = "UPDATE `cargo` SET `vchNombre`='$vcargo->vchNombre',`vchDescripcion`='$vcargo->vchDescripcion' WHERE intCodigo = '$vcargo->intCodigo'";
        $this->selcon($sql);
    }
     function seleccionar()
    {
        $sql = "SELECT * FROM cargo";
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionaruno($id)
    {
        $sql = "SELECT intCodigo, vchNombre, vchDescripcion FROM cargo where intCodigo ='$id'" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
    
    
}

?>