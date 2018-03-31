<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <?php 
        include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html";
        include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html";
        require $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/connectDb.php";
        ?>
    <title>ESO ES Onlus | Area Riservata</title>
    <link href='./style.css' rel='stylesheet' />
</head>

<body>
    <div class="esterno">
        <?php require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php"; ?>
        <div class="contenitore text-center">
            <div class="presenze">
                <?php require "./presenze.php" ?>
            </div>
        </div>
    </div>
</body>

</html>