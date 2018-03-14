<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" />
	<?php include "../utilities/imports.html"; ?>
	<style>
		#header{
			background-image: url("/esoes/img/others/news.jpg");
		}
	</style>
</head>
<body>
	<?php include "../utilities/menu.php" ?>
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
				temp.parent().next(".testo").toggle();
			});		
	</script>
	<?php include "../utilities/footer.html" ?>
</body>
</html>