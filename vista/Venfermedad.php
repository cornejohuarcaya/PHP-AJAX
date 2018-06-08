<html>
    <?php include ('../Controllers/Cenfermedad.php'); ?>
    
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
    <body>
        <h1 style="text-align: center">Clínica </h1>
        
        
        <div class="container">
            <div class="panel panel-primary " >
                <div class="panel-heading">Nuevo</div>
                <div class="panel-body">
                    <form id="frm1" method="post" action="#" >
                        <div class= "form-group align-content-center" > 
                            <label class=" form-text  " >Enfermedad</label>
                            <input type="text" class="form-control" id="enfermedad" name="enfermedad" value=""  > 
                            <label class=" form-text  ">Detalle</label>
                            <textarea  rows="3" class=" form-control" id="detalle" name="detalle" value=""  > </textarea>
                            <input type="button" class="btn btn-primary"  onclick="insertar();" value ="Registrar">
                            <input type="submit" class="btn btn-danger" name="Visualizar"  value ="Ver"> 
                        </div>
                       
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Ver Enfermedades</div>
                <table class="table " >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Enfermedad</th>
                            <th>Detalle</th>
                            <th>Eliminar</th>
                            <th>Ver</th>
                            <th>Update</th>
                        <tr>

                    </thead>


                    <?php
                    for ($index = 1; $index < count($datapersona); $index++) {
                        echo'<form method="post" action="#"  >';
                        echo "<tr>";
                        echo "<td>" . $datapersona[$index][0] . "</td>";
                        echo "<td>" . $datapersona[$index][1] . "</td>";
                        echo "<td>" . $datapersona[$index][2] . "</td>";

                        echo '<input type="hidden" name="idenfermedad" id="idenfermedad" value="' . $datapersona[$index][0] . '">';
                        echo'<td><input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar"> </input></td>';
                        echo'<td><input type="submit" class="btn btn-warrning" name="Ver" value="Ver" >  </input></td>';
                        echo'<td><input type="button"  class="btn btn-info" onclick="editar(' . $datapersona[$index][0] . ');" name="Ver" value="Editar" >  </input></td>';


                        echo "</tr>";
                        echo '</form>';
                    }
                    ?>
                </table>
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
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Enfermedad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  method="post" action="#" >

                            <div class="modal-body" id="post_detail">
                                <div class= "form-group align-content-center" > 
                                    <label class="form-text">Id </label>   <input type="text" class="form-control " id="aidenfermedad" name="aidenfermedad" readonly="true"  > <br/> 
                                <label class="form-text">Enfermedad</label>   <input type="text" class="form-control" id="aenfermedad" name="aenfermedad"   > <br/> 
                                <label class="form-text">Detalle</label>     <input type="text" class="form-control"  id="adetalle" name="adetalle"   > <br/>
</div  > 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary"  name="Actualizar" value ="Actualizar"  >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>


 
</html> 


<script src="../Resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="../Resources/js/funciones.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>