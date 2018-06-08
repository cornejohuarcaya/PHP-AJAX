<html>
    <?php include ('../Controllers/cespecialidad.php'); ?>

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
        <title> Clinica</title>



    </head>
    <h1 style="text-align: center">Especialidad </h1>


    <div class="container">
        <div class="panel panel-primary " >
            <div class="panel-heading">Nuevo</div>
            <div class="panel-body">
                <form id="frm1" method="post" action="#" >
                    <div class= "form-group align-content-center" > 


                        <label class="form-text" >vchNombre</label> 
                        <input type="text" class="form-control" id="vchNombre" value="">
                        <label class=" form-text  " >vchDescripcion</label> 
                        <input type="text" class="form-control" id="vchDescripcion" value=""  >
                        <label class=" form-text  " >dcPrecio</label> 
                        <input type="text" class="form-control" id="dcPrecio" value=""  >
                        <label class=" form-text  " >intMaximoPaciente</label> 
                        <input type="text" class="form-control" id="intMaximoPaciente" value=""  >
                        <label class=" form-text  " >intCantidadAdicional</label> 
                        <input type="text" class="form-control" id="intCantidadAdicional" value=""  >
                        <input type="button" class="btn btn-primary"  onclick="insertaresp();" value ="Registrar">
                        <input type="button" class="btn btn-danger" onclick="mostrartablaesp();" value ="Ver"> 
                        
                    </div>

                </form>   

            </div>
        </div>

        <div class="panel panel-primary">
            <div  class="panel-heading">Ver Enfermedades</div>
            <div id="tablacontenedor" class="panel-body">


            </div>
        </div>
        <br/>
        <br/>


        <div  id="mensaje"   >  
        </div>

        <div id="myModal" class="modal fade" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Enfermedad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  method="post" action="#" >

                        <div class="modal-body" id="post_detail">
                            <div class= "form-group align-content-center" > 


                                <label class=" form-text  " >intCodigo</label> 
                                <input type="text" class="form-control" id="aintCodigo" value="" readonly="true"  >
                                <label class=" form-text  " >vchNombre</label> 
                                <input type="text" class="form-control" id="avchNombre" value=""  >
                                <label class=" form-text  " >vchDescripcion</label> 
                                <input type="text" class="form-control" id="avchDescripcion" value=""  >
                                <label class=" form-text  " >dcPrecio</label> 
                                <input type="text" class="form-control" id="adcPrecio" value=""  >
                                <label class=" form-text  " >intMaximoPaciente</label> 
                                <input type="text" class="form-control" id="aintMaximoPaciente" value=""  >
                                <label class=" form-text  " >intCantidadAdicional</label> 
                                <input type="text" class="form-control" id="aintCantidadAdicional" value=""  >
                            </div  > 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-primary" onclick="actualizaresp();" value ="Actualizar"  >
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>



</html> 
<script src="../Resources/js/especialidad.js" type="text/javascript"></script>

<script src="../Resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>

<script src="../Resources/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>