<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            require_once("funkcje.php");
            if ($_SESSION["zalogowany"] != 1) {
                header("Location: index1.php");
                echo "eaf";
            }
            echo "Zalogowano";
            echo " jako: " . $_SESSION["zalogowanyImie"] . "<br>";

            if (isSet($_GET["utworzCookie"])) {
                setcookie("nazwa", $_GET["czas"], time() + (86400 * 30), "/");
                echo "Dodano ciasteczko";
            }
            echo "<br><a href=\"index1.php\">Wróć do strony logowania</a>"
        ?>
    </body>
</html>