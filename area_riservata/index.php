<?php 
    $permission = 3;
    require "check_login.php";
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
    #popup{
    	width: auto;
    }
    #img_load{
    	max-width: 100%;
    }

    .cropper-crop{
    	margin: 30px 0;
    }
    </style>
</head>

<body>
    <div class="esterno">
        <?php include "menu.php"; ?>
        <div class="contenitore text-center">
            <img src= <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT src FROM immagini JOIN clown ON immagini.id = clown.id_img WHERE user=?");
                echo $conn->error;
                $stmt->bind_param("s", $_SESSION['user']);
                echo $stmt->error;
                $stmt->execute();
                $stmt->bind_result($img);
                $stmt->fetch();
                echo  "\"/esoes/uploads/$img\"";
            ?>
            class="img-profilo center">
            <button id="cambia_immagine"  class="btn btn-primary float-right">Cambia immagine</button>
            <br><br>
			<hr>
            <h1 id="clown-name" class="red center bold" contenteditable="false">
            <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT nome_clown FROM clown WHERE user=?");
                $stmt->bind_param("s", $_SESSION['user']);
                $stmt->execute();
                $stmt->bind_result($nome);
                $stmt->fetch();
                echo $nome;
            ?>
            </h1>
            <div class="text-right">
                <button id="submit-name" class="btn btn-primary">Cambia nome</button><button id="cancel-name" class="btn btn-danger" style="display:none;">Annulla</button><br>
                <span id="change-pwd" class="text-right">o <a href="#new-pwd" class="blue">Cambia password</a></span>
            </div>
		    <br>
			<hr>
            <p id="mail" contenteditable="false">
            <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT mail FROM clown WHERE user=?");
                $stmt->bind_param("s", $_SESSION['user']);
                $stmt->execute();
                $stmt->bind_result($mail);
                $stmt->fetch();
                echo $mail;
            ?>
            </p>
			
            <div class="text-right">
                <button id="change-mail" class="btn btn-primary">Cambia E-mail</button><button id="cancel-mail" class="btn btn-danger" style="display:none;">Annulla</button><br>
            </div>
			<hr>
            <form id="pwd" class="text_center" style="display:none; margin:auto;">
                <span class="bold">Inserire la nuova password:</span> <input type="password" id="new-pwd" class="text_input small_text"></p>
                <span class="bold">Confermare la nuova password:</span><input type="password" id="confirm-pwd" class="text_input small_text">
                <br>
                <input type="submit" id="submit-pwd" class="btn btn-primary" value="conferma">
                <input type="button" id="cancel-pwd" class="btn btn-danger" value="annulla">
            </form>
            <br>

            <h2>La tua frase</h2>
            <div id="frase" contenteditable="false">
                <?php
                        $conn = connectDb();
                        $stmt = $conn->prepare("SELECT frase FROM clown WHERE user=?");
                        $stmt->bind_param("s", $_SESSION['user']);
                        $stmt->execute();
                        $stmt->bind_result($frase);
                        $stmt->fetch();
                        echo $frase;
                ?>
            </div>
            <div class="text-right">
                <button id="submit-frase" class="btn btn-primary">Cambia la tua frase</button><button id="cancel-frase" class="btn btn-danger" style="display:none;">Annulla</button>
            </div>
			
			<button id="delete-myself" class="btn btn-danger float-right">Cancella questo profilo</button>

    </div>
	</div>
		 <?php
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT descrizione, luogo, indirizzo, data, ora_inizio FROM eventi JOIN presenze ON eventi.id = presenze.id_evento WHERE user=? 
                    AND now() <=  data ORDER BY data, ora_inizio");
                $stmt->bind_param("s", $_SESSION["user"]);
                $stmt->execute();
                $stmt->bind_result($descrizione, $luogo, $indirizzo, $data, $ora_inizio);
                //variabile che dice se il clown è iscritto ad almeno un evento
                $has_event = false;
                if(!is_null($stmt->fetch())){
                	$has_event = true;
                	echo "
                		<div class=\"presenze\">
					        <h3>Eventi a cui partecipi</h3>
					        <table class=\"table\">
					            <thead class=\"bg-blue white\">
					                <tr>
					                    <th scope=\"col\">Titolo</th>
					                    <th scope=\"col\">Luogo</th>
					                    <th scope=\"col\">Indirizzo</th>
					                    <th scope=\"col\">Data</th>
					                    <th scope=\"col\">Ora inizio</th>
					                </tr>
					            </thead>
					            <tbody>
						            <tr>
				                        <th scope=\"row\">$descrizione</th>
				                        <td>$luogo</td>
				                        <td>$indirizzo</td>
				                        <td>$data</td>
				                        <td>$ora_inizio</td>
				                    </tr>
                	";
                }

                while(!is_null($stmt->fetch())){
                	$is_event = true;
                    echo "
                    <tr>
                        <th scope=\"row\">$descrizione</th>
                        <td>$luogo</td>
                        <td>$indirizzo</td>
                        <td>$data</td>
                        <td>$ora_inizio</td>
                    </tr>";
                }

                if($has_event){
                	echo "
                	</tbody>
		        </table>
		    </div>
                	";
                }

            ?>
           
            
    <script src="./js/home.js"></script>
</body>

</html>