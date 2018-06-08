
<html>
    <?php include ('../Controllers/cpersona.php'); 
           // include ('../Controllers/cubigeo.php'); ?>

    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../Resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
        <link href="../Resources/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <title> </title>

    </head>

    <body onload="mostrardepartamento();">
        <h1 style="text-align: center">Persona </h1>


        <div class="container">
            <div class="panel panel-primary " >
                <div class="panel-heading">Nuevo</div>
                <div class="panel-body">
                    <form id="frm1" method="post" action="#" >
                        <div class= "form-group align-content-center" > 
                            <label class=" form-text  " >Nombre</label>
                            <input type="text" class="form-control" id="vchNombre" value=""  > 
                            <label class=" form-text  ">Apellido</label>
                            <input type="text" class="form-control" id="vchApellido" value=""  > 
                            <label class=" form-text  ">Documento de Identidad</label>
                            <select type="" class="form-control" id="intCodigoTipoDocumento" value=""  > 
                                <option value="2">D.N.I </option>
                                <option value="3">RUC </option>
                                <option value="4">Pasaporte </option>
                            </select>
                            <label class=" form-text  " >Número de Documento</label>
                            <input type="text" class="form-control" id="chNumeroDocumento" value=""  > 
                            <label class=" form-text  " >Sexo</label>
                            <select type="" class="form-control" id="intCodigoSexo" value=""  > 
                                <option value="6">Masculino</option>
                                <option value="7">Femenino </option>
                            </select>
                            <label class=" form-text  " >Fecha de Nacimiento</label>
                            <input type="date" class="form-control " id="daFechaNacimiento" value=""  > 

                            <label class=" form-text  " >Estado Civil</label>
                            <select type="" class="form-control" id="intCodigoEstadoCivil" value=""  > 
                                <option value="9">Soltero/a </option>
                                <option value="10">Casado/a </option>
                                <option value="11">Viudo/a </option>
                                <option value="12">Divordiado/a </option>
                            </select>

                            <label class=" form-text  " >Tipo de Persona</label>
                            <select type="" class="form-control" id="intCodigoTipoPersona" value=""  > 
                                <option value="14"> Empleado </option>
                                <option value="15">Paciente </option>
                            </select>

                            <label class=" form-text  " >Direccion</label>
                            <input type="text" class="form-control" id="nvchDireccion" value=""  > 

                            <label class=" form-text  " >Departamento</label>
                            <select type="" id="departamento" class="form-control" id="departamento" value=""  > 
                                <option>--Departamento</option>
                            </select>
                            <label class=" form-text  " >provincia</label>
                            <select type="" id="provincia" class="form-control" id="provincia" value=""  > 
                                <option>--Provincia--</option>

                            </select>
                            <label class=" form-text " >Distrito</label>
                            <select type=""  class="form-control" id="intCodigoUbigeo" value=""  > 
                                <option>--Distrito-- </option>

                            </select>

                            <label class=" form-text  " >Correo</label>
                            <input type="email" class="form-control" id="nvchCorreo" value=""  > 

                            <label class=" form-text  " >Telefono</label>
                            <input type="text" class="form-control" id="vchTelefono" value=""  > 

                            <label class=" form-text  " >Foto</label>
                            <input type="file" id="vchFoto"class="" >

                            <input type="button" class="btn btn-primary"  onclick="insertarper();" value ="Registrar">
                            <input type="button" class="btn btn-danger" onclick="mostrartablaper();"  value ="Ver"> 

                        </div>

                    </form>   

                </div>
            </div>
            <div class="panel panel-primary">
                <div  class="panel-heading">Ver Personas</div>
                <div id="tablacontenedor" class="panel-body">


                </div>
            </div>

            <br/>
            <br/>


            <?php
            for ($index = 1; $index < count($regpersona); $index++) {

                echo "Id: " . $regpersona[$index][0] . "<br/>";
                echo "Nombre de Enfermedad: " . $regpersona[$index][1] . "<br/>";
                echo "Detalle" . $regpersona[$index][2] . "<br/>";
            }
            ?>


            <div  id="mensaje"   >  
            </div>

            <div id="myModal" class="modal fade" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Persona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="frmmodal"   method="post" action="#" >

                            <div class="modal-body" id="post_detail">
                                <div class= "form-group align-content-center" > 
                                    <!--  MODALL         -->
                                    <label class=" form-text  " >Id</label>
                                    <input type="text" class="form-control" id="aintCodigo"  readonly="true"  >
                                  <label class=" form-text  " >Nombre</label>
                            <input type="text" class="form-control" id="avchNombre" value=""  > 
                            <label class=" form-text  ">Apellido</label>
                            <input type="text" class="form-control" id="avchApellido" value=""  > 
                            <label class=" form-text  ">Documento de Identidad</label>
                            <select type="" class="form-control" id="aintCodigoTipoDocumento" value=""  > 
                                <option value="2">D.N.I </option>
                                <option value="3">RUC </option>
                                <option value="4">Pasaporte </option>
                            </select>
                            <label class=" form-text  " >Número de Documento</label>
                            <input type="text" class="form-control" id="achNumeroDocumento" value=""  > 
                            <label class=" form-text  " >Sexo</label>
                            <select type="" class="form-control" id="aintCodigoSexo" value=""  > 
                                <option value="6">Masculino</option>
                                <option value="7">Femenino </option>
                            </select>
                            <label class=" form-text  " >Fecha de Nacimiento</label>
                            <input type="date" class="form-control " id="adaFechaNacimiento" value=""  > 

                            <label class=" form-text  " >Estado Civil</label>
                            <select type="" class="form-control" id="aintCodigoEstadoCivil" value=""  > 
                                <option value="9">Soltero/a </option>
                                <option value="10">Casado/a </option>
                                <option value="11">Viudo/a </option>
                                <option value="12">Divordiado/a </option>
                            </select>

                            <label class=" form-text  " >Tipo de Persona</label>
                            <select type="" class="form-control" id="aintCodigoTipoPersona" value=""  > 
                                <option value="14"> Empleado </option>
                                <option value="15">Paciente </option>
                            </select>

                            <label class=" form-text  " >Direccion</label>
                            <input type="text" class="form-control" id="anvchDireccion" value=""  > 

                            <label class=" form-text  " >Departamento</label>
                            <select type=""  class="form-control" id="adepartamento" value=""  > 
                                <option>--Departamento</option>
                                
                            </select>
                            <label class=" form-text  " >provincia</label>
                            <select type=""  class="form-control" id="aprovincia" value=""  > 
                                <option>--Provincia--</option>

                            </select>
                            <label class=" form-text " >Distrito</label>
                            <select type=""  class="form-control" id="aintCodigoUbigeo"   > 
                                <option>--Distrito-- </option>
                            </select>

                            <label class=" form-text  " >Correo</label>
                            <input type="email" class="form-control" id="anvchCorreo" value=""  > 

                            <label class=" form-text  " >Telefono</label>
                            <input type="text" class="form-control" id="avchTelefono" value=""  > 

                            <label class=" form-text  " >Foto</label>
                            <input type="file" id="avchFoto"class="" >
                                    
                                
                                
                                </div  > 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="button" class="btn btn-primary" onclick="actualizarper();" value ="Actualizar"  >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>



    <script src="../Resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../Resources/js/ubigeo.js" type="text/javascript"></script>
    <script src="../Resources/js/persona.js" type="text/javascript"></script>

    <script src="../Resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../Resources/js/bootstrap.js" type="text/javascript"></script>
    <script src="../Resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>


</html> 
