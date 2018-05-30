<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" />
	<title>EsoEs Onlus | News</title>
	<?php include "../utilities/imports.html"; ?>
</head>
<body>

	<?php include "../utilities/menu.php"; ?>
	<h2 class="bold title">News</h2>
	<div class="container">
		<?php
			$_SESSION["riservata"] = false;
			require "./articoli.php";
		?>
	</div>
	<script type="text/javascript">
		$(".show-text").on("click", function(e){ 
			var temp = $(e.target);
			temp.toggleClass("fa-angle-double-down");
			temp.toggleClass("fa-angle-double-up");
			temp.parent().next(".testo").slideToggle();
		});
	</script>
	<?php include "../utilities/footer.html"; ?>
</body>
</html>