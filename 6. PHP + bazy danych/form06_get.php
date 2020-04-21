<?php
    session_start();

    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

    $result = mysqli_query($link,"SELECT * FROM pracownicy");
    if (!$result) {
        printf("Query failed: %s\n", mysqli_error($link));
    }

    printf("<h1>PRACOWNICY</h1>");

    if ($_SESSION["msg"] == 1) {
        echo "Pracownik został dodany do bazy.";
        $_SESSION["msg"] = 0;
    }

    printf("<table border=\"1\">");
    printf("<tr><th>ID_PRAC</th><th>NAZWISKO</th><th>ETAT</th><th>ZATR.</th></tr>");
    while ($obj = mysqli_fetch_object($result))
        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>",
            $obj->ID_PRAC, $obj->NAZWISKO, $obj->ETAT, $obj->ZATRUDNIONY);
    printf("</table>");
    printf("<i>query returned %d rows </i>", mysqli_num_rows($result));

    echo "<br><a href=\"form06_post.php\">Dodaj pracownika</a>";
    
    mysqli_free_result($result);
    mysqli_close($link);
?>