<?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/esoes/css/carte.css">	
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>

	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html" ?>
	<link href='./style.css' rel='stylesheet' />
</head>
<body>
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
</body>
</html>