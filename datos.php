  
<?php 
session_start();
include_once "encabezado.php";
include_once "./conexion.php";
include_once "./config/base_de_datos.php";


$rol="1";
$usuario =$_SESSION['usuario'];
$pass =$_SESSION['pass'] ;
$us= $_SESSION['usbase'];
$ps= $_SESSION['pswbase'];
$rols= $_SESSION['rolbase']; 
if ($usuario == $us && $pass == $ps &&  $rol == $rols)
{



   
	



$sentencia = $base_de_datos->query("select id_usuario, nombre,apellido, correo, plantilla from usuarios");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1>Contactos</h1>
    

		
		<br>
		
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>correo</th>
						<th>plantilla</th>
						<th>Editar</th>
						<th>Eliminar</th>

					</tr>
				</thead>
				<tbody>
					<!--
					Atención aquí, sólo esto cambiará
					Pd: no ignores las llaves de inicio y cierre {}
					-->
					<?php foreach($usuarios as $usuario){ ?>
						<tr>
							<td><?php echo $usuario->id_usuario ?></td>
							<td><?php echo $usuario->nombre ?></td>
							<td><?php echo $usuario->apellido ?></td>
							<td><?php echo $usuario->correo ?></td>
							<td><?php echo $usuario->plantilla ?></td>
						
							<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $usuario->id_usuario?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php  echo "eliminar.php?id=" . $usuario->id_usuario?>">Eliminar 🗑️</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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

<?php

}else{
    echo "fail";
    header ('Location: index.php');
  
}
?>