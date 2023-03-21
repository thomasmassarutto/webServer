<html>
    <head>
        <title>Esercizio 4</title>
    </head>
    
    <body>
        <h1>Parametri utente</h1>
        <h2>Parametri GET</h2>
        <?php
        echo"<p>indice: ". $_GET['indice']  
        ?>
        <h2>Parametri POST</h2>
        <?php
        echo"<p>indice: ".$_POST['indice']  
        ?>
    </body>
</html>