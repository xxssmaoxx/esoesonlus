<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE HTML>
<html>
<head>
	<title>EsoEs Onlus | Aggiungi Clown</title>
	<meta charset="utf-8">	
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>

	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html" ?>
	<link href='./style.css' rel='stylesheet' />
</head>
<body>
	<div id="popup">
	<div id="btn-hide" class="fa fa-angle-up"></div>
		<div class="descrizione">
			
		</div>
		<div class="text-center"><button class="btn btn-success" id="confirm">Sì</button><button class="btn btn-danger" id="cancel">No</button></div>
	</div>
	<div class="esterno">
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
		<div class="contenitore">
			<?php
			$_SESSION["riservata"] = true;
			require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/carte.php";
			?>
			<a href="/esoes/area_riservata/new_account">
				<div class="carte"><p class="add-card fa fa-plus-circle"></p><br>
					<p class="nome">Aggiungi account</p>
				</div>
			</a>
		</div>
	</div>
	<script type="text/javascript">
		var show = $(".delete-user");
		var popup = $("#popup");
		var hide = $("#btn-hide");
		var cancel = $("#cancel");
		var confirm = $("#confirm");

		show.on("click", function(e){
			popup.toggle();
			//recupero il nome del clown per metterlo nel popup
			var name = $(e.target).next().children().next().html();
			$(".descrizione").html("Sei sicuro di voler eliminare l'utente di " + name + " ?");
			//recupero l'id del bottone cliccato
			confirm.data("name", $(e.target).attr("id"));
		});

		hide.on("click", function(){
			popup.toggle();
		});

		cancel.on("click", function(){
			popup.toggle();
		});

		confirm.on("click", function(e){
			var req = new XMLHttpRequest();
			req.open("POST", "delete_user.php");
			var data = new FormData();
			req.onreadystatechange = function(){
				if(req.readyState == 4){
					console.log(req.responseText);
					location.href = ".";
				}else{
					console.log(req.responseText);
				}
			};
			data.append("user", confirm.data("name"));
			req.send(data);
		});
	</script>
</body>
</html>