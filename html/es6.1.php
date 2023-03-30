<html>
    <head>
        <title>Calcolatrice</title>
    </head>
    <body>
        <h1>Calcolatrice</h1>

        <form method= "get" action= "<?php echo $_SERVER['PHP_SELF'] ?>" >
            <p> 
                <input type="text" name="op1"/>

                <select name="operazione">
                    <option value="+" <?php if ($_GET['operazione'] == '+') echo "selected"; ?> >+</option>
                    <option value="-" <?php if ($_GET['operazione'] == '-') echo "selected"; ?> >-</option>
                    <option value="*" <?php if ($_GET['operazione'] == '*') echo "selected"; ?> >*</option>
                    <option value="/" <?php if ($_GET['operazione'] == '/') echo "selected"; ?> >/</option>
                </select>

                <input type="text" name="op2"/>

                <input type="submit" value="="/>

                <input type="text" name="res" placeholder="Risultato" disabled/>
            </p>
        </form>

        <?php

        if (isset($_GET['op1']) && isset($_GET['op2']) ){
            $op1= $_GET['op1']; 
            $op2= $_GET['op2'];
            $operazione= $_GET['operazione']; 
            $res= null;

            switch ($operazione) {
                case '+' : $res=$op1+$op2;break;
                case '-' : $res=$op1-$op2;break;
                case '*' : $res=$op1*$op2;break;
                case '/' : $res=$op1/$op2;break;
            }

            echo '<script>
                    document.getElementsByName("op1")[0].value  = "'.$op1.'";
                    document.getElementsByName("op2")[0].value  = "'.$op2.'";
                    document.getElementsByName("res")[0].value  = "'.$res.'";
                </script>';
        }
        ?>
    </body>
</html>
