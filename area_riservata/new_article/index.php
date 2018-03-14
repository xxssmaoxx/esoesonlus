<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; ?>
      <title>ESO ES Onlus | Inserisci Articolo</title>
      <link href='style.css' rel='stylesheet' />
      <script type="text/javascript" src="/esoes/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="/esoes/js/tinymce/jquery.tinymce.min.js"></script>
   </head>
   <body>
   <div class="esterno">
	   <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
	      <div class="contenitore">
			<h2 class="center">Inserire l'articolo</h2>
			<form action="insert_article.php" method="post" enctype="multipart/form-data">
				<div class="row form-group">
					<label class="col-form-label col-sm-4">Tipo</label>
					<select name="tipo" class="col-sm-8 form-control">
						<option value="0">Articolo</option>
						<option value="1">Pagina</option>
					</select>
				</div>
					<div class="row form-group">

						<label class="col-sm-4">Inserire un titolo</label>
						<input type="text" name="titolo" class="form-control col-sm-8" required>
			</div>
				<label>Carica un'immagine (facoltativo)</label>
				<div class="load-image form-control center pointer" id="immagine"><i class=" fa fa-image"></i></div>
				<input style="" type="file" id ="load" name="load" accept=".jpg, .gif, .png">
				<br>
				<label>Inserire il testo</label>
				<textarea id="testo" class="form-control" name = "testo" rows="15" contenteditable="true" ></textarea>
				<br>
				<br>
				<input id ="invia" class="btn btn-primary center" type="submit" value="Inserisci articolo">
			</form>
	    </div>
	</div>
	<script src='../js/editor.js'>
		
	</script>
	<script>
		document.getElementById("immagine").addEventListener("click", loadImmagine);
		function loadImmagine(){
			document.getElementById("load").click();
		}
    </script>
   </body>
</html>
