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
        <div class="contenitore text_center">
            <form>
                <button id="change-image" class="btn btn-primary float-right">Cambia immagine</button>
                <input type="file" id="image" class="float-right">
            </form>
            <br>
            <img class="img-fluid" src= <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT immagini.src FROM immagini JOIN clown ON immagini.id = clown.id_img WHERE user=?");
                echo $conn->error;
                $stmt->bind_param("s", $_SESSION['user']);
                echo $stmt->error;
                $stmt->execute();
                $img = $stmt->get_result()->fetch_assoc()['src'];
                echo  "\"/esoes/uploads/$img\"";
            ?>
            class="img-profilo">
            
            <br>
            <h1 id="real-name" class="red center bold" contenteditable="false">
            <?php 
                $conn = connectDb();
                $stmt = $conn->prepare("SELECT nome_clown FROM clown WHERE user=?");
                $stmt->bind_param("s", $_SESSION['user']);
                $stmt->execute();
                echo $stmt->get_result()->fetch_assoc()['nome_clown'];
            ?>
            </h1>

            <div class="right">
                <button id="submit-name" class="btn btn-primary">Cambia nome</button><button id="cancel-name" class="btn btn-danger" style="display:none;">Annulla</button><br>
                <span id="change-pwd" class="right">o <a href="#new-pwd" class="blue">Cambia password</a></span>
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
            <p id="frase" contenteditable="false">
                <?php
                        $conn = connectDb();
                        $stmt = $conn->prepare("SELECT frase FROM  clown WHERE user=?");
                        $stmt->bind_param("s", $_SESSION['user']);
                        $stmt->execute();
                        echo $stmt->get_result()->fetch_assoc()['frase'];
                ?>
            </p>
            <div class="right">
                <button id="submit-frase" class="btn btn-primary right">Cambia la tua frase</button><button id="cancel-frase" class="btn btn-danger" style="display:none;">Annulla</button>
            </div>

            <script src="./js/home.js"></script>
        </div>
    </div>
</body>

</html>