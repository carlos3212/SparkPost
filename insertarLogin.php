<?php include_once "encabezado.php" ?>
<!-- Content Wrapper -->
    
    <!-- End of Topbar -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
   
        <h1>Agregar</h1>
          
			<form action="./model/insertar.php" method="POST"> 
                <div class="form-group">
				<label for="email">Email</label>
				<input required name="email" type="text" id="email" placeholder="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input required name="password" type="password" id="password" placeholder="password" class="form-control">
			</div>
            <div class="form-group">
				<label for="rol">Rol</label>
				<input required name="rol" type="text" id="rol" placeholder="rol" class="form-control">
			</div>
            <div class="form-group">
				<label for="usuario">Nombre Usuario</label>
				<input required name="usuario" type="text" id="usuario" placeholder="usuario" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listarLogin.php" class="btn btn-warning">Ver todas</a> 
            
                         
        

        
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