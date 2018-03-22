<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" />
	<title>EsoEs Onlus | Attimi di EsoEs</title>
	<?php include "../utilities/imports.html"; ?>
</head>
<body>
	<?php include "../utilities/menu.php" ?>
	<div class="contenitore">
		<?php require "./immagini.php"; ?>
	</div>
	<?php include "../utilities/footer.html" ?>
	<script type="text/javascript" src="./script.js"></script>
	<script type="text/javascript">
		var block = $(".block-img");
		block.hide();
		$(block[0]).show();
		$(".divisor").on("click", function(e){ 
			var temp = $(e.target);
			temp.parent().next(".block-img").slideToggle();
		});
	</script>
</body>
</html>