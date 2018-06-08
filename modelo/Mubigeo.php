<?php
    include ("conexion.php");
    
class Mubigeo {
    

    function Mubigeo(){}
    
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
    
   
     function seleccionardepartamento()
    {
        $sql = "SELECT DISTINCT substring(vchCodigo,1,2),`vchDepartamento` FROM ubigeo";
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionarprovincia($id)
    {
        $sql = "SELECT DISTINCT substring(vchCodigo, 1,4),  `vchProvincia` FROM ubigeo WHERE `vchCodigo` like Concat(substring('$id',1,2),'%')";
        $data=$this->selcontabla($sql);
        return $data;
    }
      function seleccionardistrito($id)
    {
        $sql = "SELECT DISTINCT substring(vchCodigo, 1,6),  `vchDistrito` FROM ubigeo WHERE `vchCodigo` like Concat(substring('$id',1,4),'%')";
        $data=$this->selcontabla($sql);
        echo $sql;
        return $data;
    }
    //cargando datos para actualizar direccion de personas
      function seleccionardistritoscercanos($id)
    {
        $sql = "SELECT vchCodigo, vchDistrito FROM ubigeo where vchCodigo like Concat(substring('$id',1,4),'%')" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionarprovinciascercanas($id)
    {
        $sql = "SELECT DISTINCT vchProvincia FROM ubigeo where vchDepartamento=(SELECT  vchDepartamento FROM ubigeo WHERE `intCodigo`='$id');" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
    
    
}

?>