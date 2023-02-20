<?php
    require('./model/connection.php');

    $requete = $bdd->prepare('SELECT title, date, texte FROM Articles');
    $requete->execute();

    while($result = $requete->fetch()) {
        echo "<h2>{$result['title']}</h2>";
        $date_en = $result['date'];
        $date_time = strtotime($date_en);
        $date_fr = date("d/m/y H:i", $date_time);
        echo "<p>$date_fr</p>";
        echo "<p>{$result['texte']}</p>";
    }
?>