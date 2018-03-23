<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; ?>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
	<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php" ?>
</head>

<body>
	<div class="esterno">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
		<div class="contenitore">
		<h2 class="center">Modulo inserimento nuovo utente</h2>
		<br>
			<div>
				<div class="row form-group">
					<label class="col-sm-4">Inserisci lo user</label><input type="text" name="user" id="user" class="col-sm-8 form-control" required="true">
				</div>
				<div class="row form-group">
					<label class="col-sm-4">Inserisci il nome clown</label><input type="text" name="clown-name" id="clown-name" class="col-sm-8 form-control" required="true">
				</div>
				<div class="row form-group">
					<label class="col-sm-4">Inserisci l' email*</label><input type="email" name="email" id="email" class="col-sm-8 form-control">
				</div>
				<small class="float-right red">*La mail e' necessaria per inviare la password del nuovo utente.</small>
				<br>
				<br>
				<div class="row form-group">
				<label class="col-sm-4">Permessi</label>
				<select id="permessi" class="col-sm-8 custom-select">
					<option value="1">Clown amministratore</option>
					<option value="2">Clown editore</option>
					<option value="3">Clown semplice</option>
				</select>
				</div>
				<br>
				<br>
				<button id="create" class="btn btn-primary float-right">Crea</button>
			</div>
		</div>
	</div>
	<script>
		var confirm = document.getElementById("create");

		confirm.onclick = function(){
			var user = document.getElementById("user");
			var clownName = document.getElementById("clown-name");
			var email = document.getElementById("email");
			var perm = document.getElementById("permessi");


			var req = new XMLHttpRequest();
			req.open("POST", "create_account.php");
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.onreadystatechange = function(){
				if(req.readyState == 4){
					console.log(req.responseText);
					if(req.responseText == "0"){
						alert("ok");
					}else{
						alert("non ok");
						console.log(req.responseText);
					}
				}
			};
			req.send("user=" + user.value + "&clownName=" + clownName.value + "&email=" + email.value + "&permessi=" + perm.value);

		};
	</script>
</body>
</html>