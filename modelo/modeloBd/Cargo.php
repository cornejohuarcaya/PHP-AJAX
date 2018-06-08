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
class Cargo {
  public   $intCodigo ="";
   public  $vchNombre = "";
   public  $vchDescripcion="";
    
    function Cargo()
    {}
    
public function getintCodigo()
{
    return $this->intCodigo;
}
public function getvchNombre()
{
    return $this->vchNombre;
}
public function getvchDescripcion()
{
    return $this->vchDescripcion;
}
    
    
    
}
