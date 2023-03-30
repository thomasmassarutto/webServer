<html>
    <head><title>Esercizio 5</title>
    </head>
    <body>
        <h2>Test</h2>
        <?php
        if($_GET['nome']=="pippo") 
        echo"<p>Questo &egrave; Pippo</p>"; 
        else  
        echo "<p>Pippo non c'&egrave; </p>";
        echo "<h2>Ciclo \"FOR\"</h2>\n<ul>";

        for($i=1;$i<=7; $i=$i+1) 
        echo "\t<li>$i</li>\n";
        //cambiare in apici singoli
        ?>
        </ul>
    </body>
</html>