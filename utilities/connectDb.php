<?php 
	//funzione di connessione al DB
	function connectDb(){
		return new mysqli("localhost", "root", "", "inf-5ogruppo4");
	}
?>