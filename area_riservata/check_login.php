<?php 
	$js_back2home = "<script>alert('Accesso non effettuato!');window.location.replace('..');</script>";

	session_start();

	if(!isset($_SESSION["user"]) || $_SESSION["permission"] > $permission){
		echo $js_back2home;
		return false;				
	} 
	return true;
?>