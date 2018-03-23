<?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
	$conn = connectDb();
	if(isset($_POST['tipo'])){
		if(!$stmt = $conn->prepare("SELECT id, titolo FROM pagine")) echo $conn->error;
		$res = $stmt->execute();

		$res = $stmt->get_result()->fetch_all();
		
		for($i=0; $i<count($res); $i++){

			$titolo = $res[$i][1];
			$id = $res[$i][0];

			echo "<option value=\"$id\">$titolo</option>";
		
		}
	}

	if(isset($_POST['titolo'])){
		$conn->prepare("SELECT testo FROM ")
	}
?>