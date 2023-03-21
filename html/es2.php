<?php
$passwords=array('bart' => 'calzino',
                'homer' => 'birra',
                'lisa' => 'nobel',
                'marge' => 'caspiterina',
                'maggie' => '' );
        $numprimi[0] = 2;$numprimi[1] = 3;$numprimi[2] = 5;
?>
<html>
    <head>
       <title>Esercizio 2</title>
    </head>
    <body>
        <h1>Array</h1>
            <?php
            $indice=2; $nome="homer";
             //NB doppio script
             echo "<p>Password di $nome: $passwords[$nome]</p>";
             echo "<p>Il numero primo con indice $indice: $numprimi[$indice]</p>";
             ?>
     </body>     
</html>