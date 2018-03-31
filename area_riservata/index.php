<?php require "check_login.php";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php 
        include "./imports_riservata.html";
        include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html";
        require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
        ?>
    <title>ESO ES Onlus | Area Riservata</title>
    <link href='./css/home.css' rel='stylesheet' />
</head>

<body>
    <div class="esterno">
        <?php include "menu.php"; ?>
        <div class="contenitore text-center">

            
            <div id="popup">
                <span id="btn-hide" class="fas fa-angle-up"></span>
                <strong>Selezionare l'immagine da caricare</strong>
                <input type="file" id="image" class="float-right">
                <img src="">
            </div>
            <img src= <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT immagini.src FROM immagini JOIN clown ON immagini.id = clown.id_img WHERE user=?");
                echo $conn->error;
                $stmt->bind_param("s", $_SESSION['user']);
                echo $stmt->error;
                $stmt->execute();
                $stmt->bind_result($img);
                $stmt->fetch();
                echo  "\"/esoes/uploads/$img\"";
            ?>
            class="img-profilo center">
            <button id="cambia_immagine" class="btn btn-primary float-right">Cambia immagine</button>
            <br>
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
                <button id="submit-frase" class="btn btn-primary text-right">Cambia la tua frase</button><button id="cancel-frase" class="btn btn-danger" style="display:none;">Annulla</button>
            </div>

            <script src="./js/home.js"></script>
        </div>
    </div>
</body>

</html>
