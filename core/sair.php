<?php  include "../core/verifica_session.php";
	session_start();
	session_destroy();
	
	header("Location: ../index.php");
?>