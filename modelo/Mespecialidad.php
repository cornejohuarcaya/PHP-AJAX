<?php
    include ("conexion.php");
    
class Mespecialidad {
    

    function Mespecialidad(){}
    
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
    
    function insertar(Especialidad $vespecialidad)
    {
        $sql = "INSERT INTO especialidad( vchNombre, vchDescripcion, dcPrecio, intMaximoPaciente, intCantidadAdicional) VALUES  ('$vespecialidad->vchNombre', '$vespecialidad->vchDescripcion', '$vespecialidad->dcPrecio', '$vespecialidad->intMaximoPaciente', '$vespecialidad->intCantidadAdicional')";
        $this->selcon($sql);
        
    }
    function eliminar($id)
    {
        $sql = "DELETE FROM especialidad WHERE intCodigo = '$id'  ";
        $this->selcon($sql);
        
    }
    function actualizar(Especialidad $vespecialidad)
    {
        $sql ="UPDATE especialidad SET  vchNombre='$vespecialidad->vchNombre', vchDescripcion='$vespecialidad->vchDescripcion', dcPrecio='$vespecialidad->dcPrecio', intMaximoPaciente='$vespecialidad->intMaximoPaciente', intCantidadAdicional='$vespecialidad->intCantidadAdicional'WHERE intCodigo='$vespecialidad->intCodigo'" ;
        $this->selcon($sql);
    }
     function seleccionar()
    {
        $sql = "SELECT * FROM especialidad";
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionaruno($id)
    {
        $sql = "SELECT * FROM especialidad where intCodigo ='$id'" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
    
    
}

?>