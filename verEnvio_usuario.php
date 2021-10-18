

  
  
<?php include_once "encabezado_usuario.php";
 //include_once './seguridad.php';

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

    

        $sentencia = $base_de_datos->query("Select  campana.nombre_campana,
        plantilla.titulo,plantilla.asunto,plantilla.mensaje,plantilla.documento
		,envio.tipo_campana,envio.tipo_plantilla
        	
        From campana, plantilla,  envio
        Where envio.id_envio = $id_envio and campana.id_campana = envio.tipo_campana
		and plantilla.id_plantilla = envio.tipo_plantilla 
         ");
        
        $sentenciaCon = $base_de_datos->query("Select  usuarios.nombre,usuarios.apellido,usuarios.correo
        From usuarios,envio
        Where id_envio = $id_envio and  usuarios.plantilla = envio.tipo_plantilla ")
         
        ?>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <h3>Contactos</h3>

<table class="table table-bordered table-striped mb-0">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
       $contactos = $sentenciaCon->fetchAll(PDO::FETCH_OBJ); 
  foreach($contactos as $contacto ){  
      ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $contacto -> nombre ?></td>
      <td><?php echo $contacto -> apellido ?></td>
      <td><?php echo $contacto -> correo ?></td>
    </tr>
   </tbody>
   <?php } ?>
</table>

</div>
        <?php
       

      //validacion registro

        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        ?>  
        <h3>Plantilla</h3>
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
                            $Base64Img = "data:image/png;base64,$usuario->documento";               
                               
                            echo "<img src= data:image/png;base64,$usuario->documento alt='unodepiera'/>";
                             //$imag= $usuario->documento;
                            //echo "<img src=$imag alt=''width='50%' height='50%' >"; ?></p>
                     
                        </div>

                      
                   
                 
                 <?php } ?>

                 <div class="btn-group">
               <button class="btn btn-success">  <a href="envioMensaje.php"> Cancelar</a>
               </button>
               </div>
               <div class="btn-group">
               <button class="btn btn-success"> 
               <?php  
                 
                
                 ?>
                  <?php  
                 
                 echo "<a href='sparkpost.php?id_envio=$id_envio &tipo_plantilla=$usuario->tipo_plantilla &tipo_campana=$usuario->tipo_campana          '>confirmar</a>";
                 
                 ?>
                 
                 
                </button>

              
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


