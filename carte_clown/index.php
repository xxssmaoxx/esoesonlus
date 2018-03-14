<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="/esoes/css/carte.css" rel="stylesheet" />
	<?php include "../utilities/imports.html" ?>
</head>
<body>
	<?php include "../utilities/menu.php" ?>
	<div class="contenitore">
		<?php
		$_SESSION["riservata"] = false;
		require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/carte.php";
		?>
	</div>
	<?php include "../utilities/footer.html" ?>
</body>
</html>