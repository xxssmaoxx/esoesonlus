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
			<form class="form" method="post" enctype="multipart/form-data">
				<div class="row form-group">
					<label class="col-form-label col-sm-2">Tipo</label>
					<select id="tipo" class="col-sm-10 form-control">
						<option value="0">Articolo</option>
						<option value="1">Pagina</option>
					</select>
				</div>
				<div class="row form-group">
					<label class="col-form-label col-sm-2">Titolo</label>
					<select id="titolo" class="col-sm-10 form-control">
						
					</select>
					<script type="text/javascript">

						function cambiato(){
							var tipo = document.getElementById("tipo");
							var req = new XMLHttpRequest();
							req.open("POST", "edit_article.php");
								req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								req.onreadystatechange = function(){
									if(req.readyState == 4 && req.status == 200){
										document.getElementById("titolo").innerHTML = req.responseText;	
									}
								};
							req.send("tipo=" + tipo.value);
						}

						cambiato();
						var tipo = document.getElementById("tipo");
						tipo.onchange = cambiato;

						
						
					</script>
				</div>
				<div class="row form-group">
					<label class="col-sm-2">Titolo</label>
					<input type="text" id="txt-titolo" class="form-control col-sm-10" required>
				</div>
				<br>
				<label>Testo</label>
				<textarea id="testo" class="form-control" name = "testo" rows="15" contenteditable="true"></textarea>
				<br>
				<br>
				<input id ="invia" class="btn btn-primary center" type="submit" value="Inserisci articolo">
			</form>
	    </div>
	</div>
	<script src='../js/editor.js'></script>
   </body>
</html>
