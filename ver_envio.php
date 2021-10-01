  
<?php include_once "encabezado.php";
 include_once './seguridad.php';

 ?>
 <?php  if ($_SESSION['rol']==2)
 session_unset();
 session_destroy();
 ?>

    <!-- End of Topbar -->

     <!-- Begin Page Content -->
    <?php 
    $id_envio = $_POST['id_envio'];
    

    include_once "./config/base_de_datos.php";

    

        $sentencia = $base_de_datos->query("Select envio.id_envio, envio.tipo_campana, envio.tipo_plantilla, campana.nombre_campana,plantilla.titulo,plantilla.asunto,plantilla.mensaje,plantilla.documento
        From campana, plantilla, usuarios, envio
        Where id_envio = $id_envio  and tipo_campana = id_campana and tipo_plantilla = id_plantilla
         ");
         
       

      //validacion registro

        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        ?>  
                <div class="container-fluid">
                    <br>
                    <?php
                    foreach($usuarios as $usuario ){  
                        ?> 

                    <div class="form-group">
                            <label for="nombre">Nombre Campaña</label>
                            <p style="border: ridge #9c9c9c 1px; background-color: #ffffff ;padding: 5px; -webkit-border-radius: 5px;"><?php echo $usuario -> nombre_campana ?></p>
                        </div>
                        <div class="form-group">
                            <label for="correo">Titulo</label>
                            <p style="border: ridge #9c9c9c 1px; background-color: #ffffff ;padding: 5px; -webkit-border-radius: 5px;"><?php echo $usuario -> titulo ?></p>
                     
                        </div>
                        <div class="form-group">
                            <label for="correo">Asunto</label>
                            <p style="border: ridge #9c9c9c 1px; background-color: #ffffff ;padding: 5px; -webkit-border-radius: 5px;"><?php echo $usuario -> asunto ?></p>
                     
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <p style="border: ridge #9c9c9c 1px; background-color: #ffffff ;padding: 20px; -webkit-border-radius: 5px;"><?php echo $usuario -> mensaje ?></p>
                     
                           
                        </div>
                        <div class="form-group">
                            <label for="correo">Archivo</label>
                            <p style="border: ridge #9c9c9c 1px; background-color: #ffffff ;padding: 5px; -webkit-border-radius: 5px;">
                             
                            

                            <?php 
                            $imag= $usuario->documento;
                            echo "<img src=$imag alt=''width='50%' height='50%' >"; ?></p>
                     
                        </div>
                   
                 
                 <?php } ?>
                 

               </div>
               <div class="btn-group">
               <button class="btn btn-success">  <a href="envioMensaje.php"> Cancelar</a>
               </button>
               </div>
               <div class="btn-group">
               <button class="btn btn-success">  <a href="sparkpost.php?tipo_campana=<?php echo $usuario -> tipo_campana ?>&tipo_plantilla=<?php echo $usuario ->tipo_plantilla ?>"> Confirmar</a>
                </button>

              
               </div>
           
</div>
              
             
    
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



