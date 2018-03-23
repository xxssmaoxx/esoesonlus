<?php
	require "connectDb.php";
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src, nome_clown, user, frase FROM clown JOIN immagini ON (clown.id_img = immagini.id) ORDER BY nome_clown");
	$res = $stmt->execute();
	$res = $stmt->get_result()->fetch_all();
	
	for($i=0; $i<count($res); $i++){

		$img = "/esoes/uploads/" . $res[$i][0];
		$name = $res[$i][1];
		$user = $res[$i][2];
		$frase = $res[$i][3];

		echo "
		<div class=\"carte animated pulseHover\">
			<span class=\"fa fa-times-circle delete-user\" id=\"$user\"></span>
			<div class=\"info\">
				<img class=\"img-clown\" src=\"$img\">
				<p class=\"name\">$name</p>
				<p class=\"frase\">$frase</p>
			</div>
		</div>";	
	}
?>