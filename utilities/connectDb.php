<?php 
	
	function connectDb(){
		return new mysqli("localhost", "root", "", "tesina");
	}

?>