<?php
if($_REQUEST['nome'] && $_REQUEST['eta']){

    echo "Ciao ".$_REQUEST['nome']."<br/>";
    echo "Tu hai ".$_REQUEST['eta']."anni";
    exit();
}
?>
<html lang="eng">
    <body>
        <form action="<?php $_SERVER[PHP_SELF];?>" method="post">
            Nome: <label>
                <input type="text" name="nome" />
            </label><br>
            Età: <label>
                <input type="text" name="eta" />
            </label>

            <input type="submit" value="Invia Query">


        </form>
    </body>
</html>
