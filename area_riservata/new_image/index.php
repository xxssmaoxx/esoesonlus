<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; ?>
      <title>ESO ES Onlus | Inserisci Articolo</title>
      <link href='style.css' rel='stylesheet' />
   </head>
   <body>
   <div class="esterno">
	   <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
	      <div class="contenitore">
				<label>Carica un'immagine</label>
				<div class="load-image form-control center pointer" id="immagine"><i class=" fa fa-image"></i></div>
				<input style="" type="file" id ="load" name="load" accept=".jpg, .gif, .png">
	<script>
		document.getElementById("immagine").addEventListener("click", loadImmagine);
		function loadImmagine(){
			document.getElementById("load").click();
		}
    </script>
   </body>
</html>
