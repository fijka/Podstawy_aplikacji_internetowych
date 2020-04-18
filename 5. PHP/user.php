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
            echo " jako: " . $_SESSION["zalogowanyImie"];
        ?>

        <br>
        <a href="index1.php">Wróć do strony logowania</a>

        <fieldset>
        <legend>Wgraj zdjęcie</legend>
            <form action='user.php' method='post' enctype='multipart/form-data'>
                <input name="myfile" type="file">
                <input type="submit" value="Wyświetl zdjęcie" name="submit">
            </form>
            <img src="zdjeciaUzytkownikow\php.png" alt="Wgraj zdjęcie, by je wyświetlić">
            <?php
                if (isSet($_POST["submit"])){
                    $currentDir = getcwd();
                    $uploadDirectory = "\zdjeciaUzytkownikow\\";
                    $fileName = $_FILES["myfile"]["name"];
                    $fileSize = $_FILES["myfile"]["size"];
                    $fileTmpName = $_FILES["myfile"]["tmp_name"];
                    $fileType = $_FILES["myfile"]["type"];
                    if ($fileName != "" and ($fileType == "image/png" or $fileType == "image/jpeg"
                        or $fileType == "image/PNG" or $fileType == "image/JPEG")) {
                        $uploadPath = $currentDir . $uploadDirectory . $fileName;
                        if (move_uploaded_file($fileTmpName, $uploadPath)) {
                            echo "<br>Zdjęcie zostało załadowane";
                        }
                    }
                }
            ?>
        </fieldset>

        <form action='index1.php' method='post'>
            <input type="submit" value="Wyloguj" name="wyloguj">
        </form>
    </body>
</html>