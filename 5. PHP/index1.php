<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <?php
            require("funkcje.php");
            echo "<h1> Nasz system </h1>";

            if (isSet($_POST["wyloguj"])) {
                $_SESSION["zalogowany"] = 0;
            }
        ?>

        <fieldset>
            <legend>Wprowadź dane</legend>
            <form action="logowanie.php" method="post">
                Login: <input type="text" name="login"><br>
                Hasło: <input type="text" name="haslo"><br>
                <input type="submit" value="Zaloguj" name="zaloguj">
            </form>
            <a href="user.php">Jesteś zalogowany? Przejdź do swojego konta</a>
        </fieldset>

        <fieldset>
            <legend>Cookies</legend>
            <form action="cookie.php" method=get>
                Czas [s]: <input type="number" name="czas">
                <input type="submit" value="Utwórz cookie" name="utworzCookie">
            </form>
            <?php
                if (isSet($_COOKIE["nazwa"]))
                    echo "Wartość cookie: " . $_COOKIE["nazwa"];
            ?>
        </fieldset>

    </body>
</html>
