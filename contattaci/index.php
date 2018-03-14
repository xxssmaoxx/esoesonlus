<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include "../utilities/imports.html" ?>
        <link href='./style.css' rel='stylesheet' />
        <title>ESO ES Onlus | Contattaci</title>
    </head>
    <body>
        
        <?php include "../utilities/menu.php"; ?>
        <div class="container">
            <p class="cit text_center">Contattaci: saremo felici di rispondere ad ogni domanda o semplice curiosità senza alcun impegno!</p>
            <p>&nbsp;</p>
            <form method="post" action="./contact.php">
                <p>Il tuo nome: <input type="text" class="form-control" name="name" required></p>
                <p>La tua e-mail: <input type="text" class="form-control" name="sender" required></p>
                <p>Il tuo telefono: <input type="text" class="form-control" name="phone"></p>
                <p>Comunica con noi! <textarea rows="5" class="form-control" name="message" required></textarea></p>
                <p>&nbsp;</p>
                <p class="text_center">
                <input class="btn btn-primary pointer" type="submit" value="Invia"></p>
            </form>
        </div>
        <?php include "../utilities/footer.html"; ?>
    </body>
</html>