<?php 
	$permission = 1;
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html";
      		include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; 
      ?>
      <title>ESO ES Onlus | Modifica Articolo</title>
      <link href='style.css' rel='stylesheet' />
   <body>
   <div class="esterno">
	   <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
	      <div class="contenitore">
			<h2>Modifica il contenuto delle 3 pagine nella home page</h2>
			<h4>Puoi modificarne una alla volta</h4>
			<br>
			<div id="top">
					<?php 
						$conn = connectDb();
						$stmt = $conn->prepare("SELECT id, titolo FROM pagine WHERE tipo = 'H'");
						$stmt->execute();
						$stmt->bind_result($id, $page);
						$temp = 0;
						while($stmt->fetch() != NULL){
							$temp++;
							echo "<div class='row' style='margin-bottom: 20px;'><label class='col-sm-4'>$temp ° pagina:&nbsp;</label><button class='change-page btn btn-dark col-sm-8' id='$id'>$page</button></div>";
						}
					?>
				</div>
			</div>								
	    </div>
	    <button class='btn btn-primary float-right' id='confirm'>Conferma</button>
	</div>

	<script type="text/javascript" src="./script.js"></script>
   </body>
</html>
