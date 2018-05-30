<?php
	$permission = 1;
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";
	include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html";
    include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html";
    require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCropper.html"; ?>
	<script type="text/javascript" src="/esoes/area_riservata/js/crop_img.js"></script>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<title>EsoEs Onlus | Taglia immagini</title>
	<meta charset="utf-8">
</head>
<body>
	<h2 class="bold title">Ritaglia l'immagine</h2>
	<div class="contenitore">

		<div class="row">
			<input type="file" class="col-sm-4" id="choose-img">
		</div>
		<div class="row">
			<button class="btn btn-primary col-sm-2" id="load-image">Ritaglia</button>
			<button class="btn btn-danger col-sm-2" id="annulla">Annulla</button>
		</div>
        <img id="img_load" src="">

	</div>
	<script>
		$("#load-image").on("click",function(){
			var input = document.getElementById("choose-img");
			input.style = "display: none";
			
			<?php 
				$dim = $_GET['dim'];
				$dest = $_GET['dest'];
				echo "crop_image(input, $dim, '$dest');";
			?>			
		});
		
		
		$("#annulla").on("click", function(){
			close();
		});
	</script>
</body>
</html>	