<?php
session_unset();
session_destroy();
header("Location: http://localhost:8080/sparkpost/index.php");
?>