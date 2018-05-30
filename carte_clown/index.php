<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html"; ?>
	<link href="./style.css" rel="stylesheet" />
	<link href="/esoes/css/carte.css" rel="stylesheet" />
	
	<title>EsoEs Onlus | I clown</title>
</head>
<body>
	<?php include "../utilities/menu.php"; ?>	
	<div class="contenitore">
		<h3 class="title">Ecco a voi tutti i nostri <b class="red">clown</b> che con <b class="blue">entusiamo</b> e <b class="blue">passione</b> si dedicano al volontariato:</h3>
		<?php
		$_SESSION["riservata"] = false;
		require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/carte.php";
		?>
	</div>
	<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/footer.html"; ?>
	<script type="text/javascript" src="./script.js"></script>
</body>
</html>