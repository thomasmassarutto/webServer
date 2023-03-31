<?php
$saluto = "Benvenuto!";// questo è il mio cookie
if(isset($_COOKIE["precedente"])) 
    $saluto = "Bentornato!"; 
setcookie( "precedente", time() ,time()+120);// resetta il cookie dopo 120 sec
?>

<html>
    <head>
        <title>Esercizio 8</title>
    </head>

    <body>
        <h1>
            <?php
            echo $saluto 
            ?>
            </h1>
            <?php
            echo"Data attuale:".date("d/m/Y H:i:s", time());
            if($saluto=="Bentornato!") {
                echo"<br>Visita precedente: " . 
                date( "d/m/Y H:i:s", $_COOKIE['precedente']);// date() formatta una data da unixtime
                          // " h:i, d/m/y "
                        }
            ?>
    </body>
</html>