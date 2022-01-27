<?php 
session_start();


$rol="1";
$usuario =$_SESSION['usuario'];
$pass =$_SESSION['pass'] ;
$us= $_SESSION['usbase'];
$ps= $_SESSION['pswbase'];
$rols= $_SESSION['rolbase']; 
if ($usuario == $us && $pass == $ps &&  $rol == $rols)
{
    include_once "encabezado.php"; 
    ?>

    <!-- End of Topbar -->

   

    <!-- Begin Page Content -->
    <div class="container-fluid">
    <h1>Cargar</h1>
        <div class="row">
        <div>
            Upload Files<br />
            <input type="file" id="files" multiple /><br /><br />
            <button id="send">Upload</button>
            <p id="uploading"></p>
            <progress value="0" max="100" id="progress"></progress>
         </div>
  <!--<div class="col-md-12 offset-md-3">
  <form action="imagen.php" method="post" enctype="multipart/form-data" id="filesForm">
    <div class="col-md-4 col-md-offset-4">
        <input class="form-control" type="file" id="file" name="file[]" multiple>
        <button type="button" onclick="subir()" class="btn btn-primary form-control" >Cargar</button>
    </div>
</form>
  </div>-->
</div>

        <!-- Page Heading -->
        <h1>Agregar</h1>
		<form action="insertar_plantilla.php" method="POST">
         <!-- form-group -->
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input required name="titulo" type="text" id="titulo" placeholder="titulo " class="form-control">
			</div>
			<div class="form-group">
				<label for="mensaje">Asunto</label>
				<input required name="asunto" type="text" id="asunto" placeholder="Asunto" class="form-control">
			</div>
            <div class="form-group">
				<label for="mensaje">Mensaje</label>
				<textarea required name="mensaje" type="text" id="mensaje" placeholder="Mensaje" class="form-control"></textarea>
			</div>
      <div class="form-group">
				<label for="mensaje">Documento</label>
				<input required name="documento" type="text" id="documento" placeholder="documento" class="form-control">
			</div>
            
     </select>	
                 
                   
            <!-- form-group -->
            </div>
			
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="plantillas.php" class="btn btn-warning">Ver todas</a>
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
            <span aria-hidden="true"></span>
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

<!-- Agregar firebase-->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-storage.js"></script>

<script>
// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyBOV5DMuyuvaPKA3ZpICPB6iyDitGC3QoE",
  authDomain: "mlml-a0a87.firebaseapp.com",
  databaseURL: "https://mlml-a0a87.firebaseio.com",
  projectId: "mlml-a0a87",
  storageBucket: "mlml-a0a87.appspot.com",
  messagingSenderId: "334815235064",
  appId: "1:334815235064:web:fa0ab89e8cd72c48bc640d"
 
  
  
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
</script>

<script>
var files = [];
document.getElementById("files").addEventListener("change", function(e) {
  files = e.target.files;
  for (let i = 0; i < files.length; i++) {
    console.log(files[i]);
  }
});

document.getElementById("send").addEventListener("click", function() {
  //checks if files are selected
  if (files.length != 0) {
    //Loops through all the selected files
    for (let i = 0; i < files.length; i++) {
      //create a storage reference
      var storage = firebase.storage().ref(files[i].name);
      //upload file
      var upload = storage.put(files[i]);
      //update progress bar
      upload.on(
        "state_changed",
        function progress(snapshot) {
          var percentage =
            (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
          document.getElementById("progress").value = percentage;
        },

        function error() {
          alert("error uploading file");
        },

        function complete() {
          document.getElementById(
            "uploading"
          ).innerHTML += `${files[i].name} upoaded <br />`;
        }
      );
    }
  } else {
    alert("No file chosen");
  }
});
function getFileUrl(filename) {
  //create a storage reference
  var storage = firebase.storage().ref(filename);
  //get file url
  storage
    .getDownloadURL()
    .then(function(url) {
      console.log(url);
    })
    .catch(function(error) {
      console.log("error encountered");
    });
}
getFileUrl('pruebas.jpg');
</script>
<!-- Fin firebase-->




<!-- Custom scripts for all pages
<script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">

    function subir()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "imagen.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
              
                alert('Archivos Agregados!');
              

            }
        });
    }

</script>
-->
</body>

</html>
<?php
}else{
    echo "fail";
    header ('Location: index.php');
  
}
?>