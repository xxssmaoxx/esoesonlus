 <?php
	$permission = 2;
	require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html"; ?>
	  <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCropper.html"; ?>
      <title>ESO ES Onlus | Inserisci immagine fotogallery</title>
      <link href='style.css' rel='stylesheet' />
      <style>
         .center{
            display:block;
            margin:auto;
            text-align:center;
            margin-bottom: 3%;
         }
      </style>
	  <script src="/esoes/area_riservata/js/crop_img.js"></script>
   </head>
   <body>
   <div class="esterno">
	   <?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
	      <div class="contenitore">
            <h2 class="center">Inserisci un'immagine per la photogallery</h2>
				<label>Carica un'immagine</label>
				<div class="load-image form-control center pointer" id="immagine"><i class=" fa fa-image"></i>				
			</div>
		</div>
	</div>
	<script>
		$("#immagine").on("click", function(){
			    var dio = window.open('/esoes/area_riservata/cropper?dest=/esoes/area_riservata/send_img.php&dim=1', '_blank', 'location=yes'); 
				dio.focus();
		});
    </script>
	
   </body>
</html>
