<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

	$conn = connectDb();
	
	if(isset($_POST["get"])){
		$stmt = $conn->prepare("SELECT titolo, id FROM pagine WHERE tipo = 'A'");
		$stmt->execute();
		$stmt->bind_result($titolo, $id);
		$pagine = array();
		while($stmt->fetch() != NULL){
			$temp = [$id, $titolo];
			array_push($pagine, $temp);
		}
		echo json_encode($pagine);
	}

	if(isset($_POST["old"])){

		/*fare funzione quando ho poi internet */
		$stmt = $conn->prepare("UPDATE pagine SET tipo = 'A' WHERE id = ? ");
		$stmt->bind_param("i", $_POST["old"]);
		$stmt->execute();

		$stmt = $conn->prepare("UPDATE pagine SET tipo = 'H' WHERE id = ? ");
		$stmt->bind_param("i", $_POST["new"]);
		$stmt->execute();

		echo 0;

	}

	$conn->close();

?>