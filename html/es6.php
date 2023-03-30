<html>
    <head><title>Calcolatrice</title>
    </head>
    <body>
        <h1>Calcolatrice</h1>
        <?php
        if (isset($_GET['op1']) && isset($_GET['op2']) ){

            $op1=$_GET['op1']; 
            $op2=$_GET['op2'];

            switch($_GET['operazione']) {
                case '+' : $res=$op1+$op2;break;
                case '-' : $res=$op1-$op2;break;
                case '*' : $res=$op1*$op2;break;
                case '/' : $res=$op1/$op2;break;
            };
            echo "<h2>Risultato</h2>\n<p>$op1" .$_GET['operazione'] ."$op2 = $res</p>";
            $script= $_SERVER['PHP_SELF'];

            echo "<p><a href=\"$script\">Calcolatrice</a></p>";
            echo "<p>".$_SERVER['REMOTE_ADDR'] ."</p>";
            exit;
        }
        else{

        ?> 
        <form method="get" 
            action= "<?php echo $_SERVER['PHP_SELF'] ?>" >
            <p> 
                <input type="text" name="op1" />

                <select name="operazione">
                <option value="+" selected="selected" >+</option>
                <option value="-"  >-</option>
                <option value="*"  >*</option>
                <option value="/"  >/</option>
        
                </select><input type="text" name="op2" />

                <input type="submit" value="=" />
            </p>
        </form>

        <?php } ?>

    </body>
</html>