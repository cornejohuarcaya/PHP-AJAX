<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mcargo
 *
 * @author Erick
 */
class Persona {
  public   $intCodigo ="";
   public  $vchNombre = "";
   public  $vchApellido="";
   public  $chNumeroDocumento="";
   public  $vchTelefono="";
   public  $nvchCorreo="";
   public  $daFechaNacimiento="";
   public  $nvchDireccion="";
   public  $intCodigoUbigeo="";
   public  $vchFoto="";
   public  $intCodigoSexo="";
   public  $intCodigoEstadoCivil="";
   public  $intCodigoTipoDocumento="";
   public  $intCodigoTipoPersona="";
    
    function Persona()
    {}
    
public function getintCodigo()
{
    return $this->intCodigo;
}
public function getvchNombre()
{
    return $this->vchNombre;
}
public function getvchApellido()
{
    return $this->vchApellido;
}
public function getchNumeroDocumento()
{
    return $this->chNumeroDocumento;
}
public function vchTelefono()
{
    return $this->vchTelefono;
}
public function getnvchCorreo()
{
    return $this->nvchCorreo;
}
public function getdaFechaNacimiento()
{
    return $this->daFechaNacimiento;
}
public function getnvchDireccion()
{
    return $this->nvchDireccion;
}
public function getintCodigoUbigeo()
{
    return $this->intCodigoUbigeo;
}
public function getvchFoto()
{
    return $this->vchFoto;
}
public function getintCodigoSexo()
{
    return $this->intCodigoSexo;
}
public function getintCodigoEstadoCivil()
{
    return $this->intCodigoEstadoCivil;
}
public function getintCodigoTipoDocumento()
{
    return $this->intCodigoTipoDocumento;
}
public function getintCodigoTipoPersona()
{
    return $this->intCodigoTipoPersona;
}
    
    
}
