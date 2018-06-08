<?php
    include ("conexion.php");
    
class Mpersona {
    

    function Mpersona(){}
    
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
    
    function insertar(Persona $vpersona)
    {
        $sql = "INSERT INTO persona( vchNombre, vchApellido, chNumeroDocumento, vchTelefono, nvchCorreo, daFechaNacimiento, nvchDireccion, vchCodigoUbigeo, vchFoto, intCodigoSexo, intCodigoEstadoCivil, intCodigoTipoDocumento, intCodigoTipoPersona) VALUES  ('$vpersona->vchNombre', '$vpersona->vchApellido', '$vpersona->chNumeroDocumento', '$vpersona->vchTelefono', '$vpersona->nvchCorreo', '$vpersona->daFechaNacimiento', '$vpersona->nvchDireccion', '$vpersona->intCodigoUbigeo', '$vpersona->vchFoto', '$vpersona->intCodigoSexo', '$vpersona->intCodigoEstadoCivil', '$vpersona->intCodigoTipoDocumento', '$vpersona->intCodigoTipoPersona')";
        $this->selcon($sql);
        
    }
    function eliminar($id)
    {
        $sql = "DELETE FROM `persona` WHERE  `intCodigo`= '$id'  ";
        $this->selcon($sql);
        
    }
    function actualizar(Persona $vpersona)
    {
        $sql = "UPDATE `persona` SET vchNombre='$vpersona->vchNombre', vchApellido= '$vpersona->vchApellido', chNumeroDocumento='$vpersona->chNumeroDocumento', vchTelefono='$vpersona->vchTelefono', nvchCorreo='$vpersona->nvchCorreo', daFechaNacimiento='$vpersona->daFechaNacimiento', nvchDireccion='$vpersona->nvchDireccion', vchCodigoUbigeo='$vpersona->intCodigoUbigeo', vchFoto='$vpersona->vchFoto', intCodigoSexo='$vpersona->intCodigoSexo', intCodigoEstadoCivil='$vpersona->intCodigoEstadoCivil', intCodigoTipoDocumento='$vpersona->intCodigoTipoDocumento', intCodigoTipoPersona='$vpersona->intCodigoTipoPersona' WHERE `intCodigo` = '$vpersona->intCodigo'";
        $this->selcon($sql);
    }
     function seleccionar()
    {
        $sql = "SELECT * FROM persona";
        $data=$this->selcontabla($sql);
        return $data;
    }
     function seleccionaruno($id)
    {
        $sql = "SELECT * FROM persona WHERE  `intCodigo`  ='$id'" ;
        $data=$this->selcontabla($sql);
        return $data;
    }
    
    
}

?>