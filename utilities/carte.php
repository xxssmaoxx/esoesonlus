<?php
	require "connectDb.php";
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src, nome_clown FROM clown JOIN immagini ON (clown.id_img = immagini.id) ORDER BY nome_clown");
 echo $conn->error;
	$res = $stmt->execute();
	$res = $stmt->get_result()->fetch_all();
	
	for($i=0; $i<count($res); $i++){

		$img = "/esoes/uploads/" . $res[$i][0];

		$name = $res[$i][1];
		echo "<div class=\"carte\"><img class=\"img-clown\" src=\"$img\"><p class=\"name\">$name</p></div>";
	
	}
?>