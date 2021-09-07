<?php include_once "encabezado.php" ?>
<!-- Content Wrapper -->
    
    <!-- End of Topbar -->

    <?php
include_once "./config/base_de_datos.php";
$sentenciae = $base_de_datos->query("select tipo_campana, tipo_plantilla from envio");
$envio = $sentenciae->fetchAll(PDO::FETCH_OBJ);
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1>Agregar</h1>
		<form action="./model/insertar_envio.php" method="POST">
			<div class="form-group">
				<label for="tipo_campana">Tipo Campaña</label>
				<input required name="tipo_campana" type="text" id="tipo_campana" placeholder="tipo_campana" class="form-control">
			</div>
			<div class="form-group">
				<label for="tipo_plantilla">Tipo PLantilla</label>
				<input required name="tipo_plantilla" type="text" id="tipo_plantilla" placeholder="tipo_plantilla" class="form-control">
			</div>
           
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar.php" class="btn btn-warning">Ver todas</a>
		</form>

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

</body>

</html>