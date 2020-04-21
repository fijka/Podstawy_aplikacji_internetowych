<?php
    session_start();
    
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $_SESSION["msg"] = 0;
    if (isset($_POST['id_prac']) &&
        is_numeric($_POST['id_prac']) &&
        is_string($_POST['nazwisko']))
    {
        $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
        $result = $stmt->execute();

        if (!$result) {
            printf("Query failed: %s\n", mysqli_error($link));
            $_SESSION["msg"] = 1;
            $_SESSION["error"] = "Query failed: %s\n" . mysqli_error($link);
            $stmt->close();
            $link->close();
            header("Location: form06_post.php");
        } else {
            $stmt->close();
            $link->close();
            $_SESSION["msg"] = 1;
            header("Location: form06_get.php");
        }

    } else {
        $link->close();
        $_SESSION["msg"] = 1;
        header("Location: form06_post.php");
    }
?>
