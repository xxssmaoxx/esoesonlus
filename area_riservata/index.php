<?php
$permission = 3;
require "check_login.php";
require "./getters/getters.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php
include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html";

include "./imports_riservata.html";

require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";

?>
    <title>ESO ES Onlus | Area Riservata</title>
    <link href='./css/home.css' rel='stylesheet' />
    <style>

    </style>
</head>

<body>
    <div class="esterno">
        <?php
include "menu.php";
 ?>
        <div class="home text-center">
            <div id="header_riservata" class="sezione_riservata">
				<img src= <?php get_image_src(); ?>
				class="img-profilo center">
				<button id="cambia_immagine"  class="btn btn-primary float-right">Cambia immagine</button>
			</div>
			<div class="sezione_riservata">
				<h1 id="clown-name" class="red center bold" contenteditable="false">
				<?php get_nome(); ?>
				</h1>
				<div class="text-right">
					<button id="submit-name" class="btn btn-primary">Cambia nome</button><button id="cancel-name" class="btn btn-danger" style="display:none;">Annulla</button><br />
					<span id="change-pwd" class="text-right">o <a href="#new-pwd" class="blue">Cambia password</a></span>
				</div>
				<form id="pwd" class="text_center" style="display:none; margin:auto;">
                <span class="bold">Inserire la nuova password:</span> <input type="password" id="new-pwd" class="text_input small_text"></p>
                <span class="bold">Confermare la nuova password:</span><input type="password" id="confirm-pwd" class="text_input small_text">
                <br />
                <input type="submit" id="submit-pwd" class="btn btn-primary" value="conferma">
                <input type="button" id="cancel-pwd" class="btn btn-danger" value="annulla">
            </form>
			</div>
		    <div class="sezione_riservata">
				<p id="mail" contenteditable="false">
					<?php get_email(); ?>
				</p>
				
				<div class="text-right">
					<button id="change-mail" class="btn btn-primary">Cambia E-mail</button><button id="cancel-mail" class="btn btn-danger" style="display:none;">Annulla</button><br />
				</div>
			</div>
            
            <br />
			<div class="sezione_riservata">
            <h2>La tua frase</h2>
            <div id="frase" contenteditable="false">
                <?php get_frase(); ?>
            </div>
            <div class="text-right">
                <button id="submit-frase" class="btn btn-primary">Cambia la tua frase</button><button id="cancel-frase" class="btn btn-danger" style="display:none;">Annulla</button>
            </div>
			</div>
			<button id="delete-myself" class="btn btn-danger float-right">Cancella questo profilo</button>
	
    </div>
	</div>
	<?php get_iscrizioni(); ?>
           
            
    <script src="./js/home.js"></script>
</body>

</html>
