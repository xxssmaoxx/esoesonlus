<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; ?>
      <title>ESO ES Onlus | Modifica Articolo</title>
      <link href='style.css' rel='stylesheet' />
      <script type="text/javascript" src="/esoes/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="/esoes/js/tinymce/jquery.tinymce.min.js"></script>
   </head>
   <body>
   <div class="esterno">
	   <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
	      <div class="contenitore">
			<h2 class="center">Modificare l'articolo</h2>
				<div class="row form-group">
					<label class="col-form-label col-sm-2">Tipo</label>
					<select id="tipo" class="col-sm-10 form-control">
						<option>Scegli il tipo</option>
						<option value="0">Articolo</option>
						<option value="1">Pagina</option>
					</select>
				</div>
				<div class="row form-group">
					<label class="col-form-label col-sm-2">Titolo</label>
					<select id="titolo" class="col-sm-10 form-control" disabled="true">
						
					</select>
				</div>
				<div class="row form-group">
					<label class="col-sm-2">Nuovo titolo</label>
					<input type="text" id="txt-titolo" class="form-control col-sm-10" disabled="true">
				</div>
				<br>
				<label>Testo</label>
				<textarea id="testo" name="testo" class="form-control" rows="15" contenteditable="true"></textarea>
				<br>
				<br>
				<input id ="invia" class="btn btn-primary center" type="submit" value="Inserisci articolo">		
				<script type="text/javascript">
					var nuovo_titolo;
					var titolo; 
					var tipo;
					var tosend; //sarebbe il titolo nel caso delle pagine, oppure l'id dell'articolo nel caso degli articoli

					function cambiato(){
						var tipo = document.getElementById("tipo");
						var req = new XMLHttpRequest();
						req.open("POST", "edit_article.php");
							req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							req.onreadystatechange = function(){
								if(req.readyState == 4 && req.status == 200){
									titolo.innerHTML = req.responseText;	
									titolo.disabled = false;
								}else{
									//console.log(req.responseText);
								}
							};
						req.send("tipo=" + tipo.value);
					}

					function title_changed(){
						var req = new XMLHttpRequest();
						req.open("POST", "edit_article.php");	
						var data = new FormData();
							req.onreadystatechange = function(){
								nuovo_titolo = document.getElementById("txt-titolo");
								if(req.readyState == 4 && req.status == 200){
									nuovo_titolo.value = titolo.item(titolo.selectedIndex).innerHTML;
									nuovo_titolo.disabled = false;
									tinyMCE.activeEditor.setContent(req.responseText);
								}else{
									//console.log(req.responseText);
								}
							};
							data.append("tipo", tipo.value);
							tosend = tipo.value == 0?titolo.value:titolo.item(titolo.selectedIndex).innerHTML;
							data.append("titolo", tosend);
						
						req.send(data);
					}

					function submit_edit(){
						alert("l'evento c'è ");
						var req = new XMLHttpRequest();
						req.open("POST", "edit_article.php");
						var data = new FormData();
						req.onreadystatechange = function(){
							if(req.readyState == 4 && req.status == 200){
								if(req.responseText == "OK"){
									alert("Modifica effettuata correttamente!");
									location.href = ".";
								}else{
									console.log(req.responseText);	
								}
							}else{
								console.log(req.responseText);
							}
						}
						data.append("tipo", tipo.value);
						data.append("titolo", tosend);
						data.append("testo", tinyMCE.activeEditor.getContent());
						data.append("nuovo_titolo", nuovo_titolo.value);
						data.append("id", titolo.value);
						req.send(data);

					}


					window.onload = function(){
						titolo = document.getElementById("titolo");
						tipo = document.getElementById("tipo");
						var submit = document.getElementById("invia");
						submit.onclick = submit_edit;
						tipo.onchange = cambiato;													
						titolo.onchange = title_changed;	
					}						
				</script>
	    </div>
	</div>
	<script src='../js/editor.js'></script>
   </body>
</html>
