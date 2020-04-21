<?php
    session_start();

    print<<<KONIEC
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <body>
            <form action="form06_redirect.php" method="post">
                id_prac <input type="text" name="id_prac">
                nazwisko <input type="text" name="nazwisko">
                <input type="submit" value="Wstaw" name="wstaw">
                <input type="reset" value="Wyczysc">
            </form>
        </body>
    KONIEC;

    if ($_SESSION["msg"] == 1) {
        echo $_SESSION["error"];
        $_SESSION["error"] = "";
        echo "<br>Dodanie pracownika nie powiodło się. Spróbuj ponownie.<br>";
        $_SESSION["msg"] = 0;
    }
    echo "<a href=\"form06_get.php\">Lista pracownikow</a>";
?>