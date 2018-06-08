<html>
    <?php include ('../Controllers/ccargo.php'); ?>
    
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
        <h1 style="text-align: center">Cargo </h1>
        
        
        <div class="container">
            <div class="panel panel-primary " >
                <div class="panel-heading">Nuevo</div>
                <div class="panel-body">
                    <form id="frm1" method="post" action="#" >
                        <div class= "form-group align-content-center" > 
                            
                            <label class=" form-text  " >Nombre del Cargo</label>
                            <input type="text" class="form-control" id="vchNombre" value=""  > 
                            <label class=" form-text  ">Detalle</label>
                            <textarea  rows="3" class=" form-control" id="vchDescripcion"  value=""  > </textarea>
                            <input type="button" class="btn btn-primary"  onclick="insertarc();" value ="Registrar">
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
                            <th>Cargo</th>
                            <th>Descripcion</th>
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

                        echo '<input type="hidden" name="idenfermedad" id="intcodigo" value="' . $datapersona[$index][0] . '">';
                        echo'<td><input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar"> </input></td>';
                        echo'<td><input type="submit" class="btn btn-warrning" name="Ver" value="Ver" >  </input></td>';
                        echo'<td><input type="button"  class="btn btn-info" onclick="editarc(' . $datapersona[$index][0] . ');" name="Ver" value="Editar" >  </input></td>';


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
                                    <label class="form-text">Id </label>   <input type="text" class="form-control " id="aintCodigo" name="aintCodigo" readonly="true"  > <br/> 
                                <label class="form-text">Nombre de Cargo</label>   <input type="text" class="form-control" id="avchNombre" name="avchNombre"   > <br/> 
                                <label class="form-text">Ddescripcion</label>     <input type="text" class="form-control"  id="avchDescripcion" name="avchDescripcion"   > <br/>
</div  > 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <input type="button" class="btn btn-primary" onclick="actualizarc();" value ="Actualizar"  >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>


 
</html> 
<script src="../Resources/js/cargo.js" type="text/javascript"></script>

<script src="../Resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>

<script src="../Resources/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.js" type="text/javascript"></script>
<script src="../Resources/js/bootstrap.bundle.min.js" type="text/javascript"></script>