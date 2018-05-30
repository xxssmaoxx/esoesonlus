 <?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";	
	$tmp_name = $_FILES["immagine"]["tmp_name"];
	$name = time() . basename($tmp_name);
	move_uploaded_file($tmp_name, $_SERVER["DOCUMENT_ROOT"] . "/esoes/uploads/".  $name);

	$conn = connectDb();
	$stmt = $conn->prepare("INSERT INTO immagini VALUES(NULL, ?, ?)");
	$type = "F";
	$stmt->bind_param("ss", $name, $type);
	$stmt->execute();
	echo "0";
 ?>