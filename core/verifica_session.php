<?php
session_start();

if(!isset($_SESSION["login"]) || !isset($_SESSION["id_usuario"])){ 
	header("Location: ../index.php"); 
}

?>
