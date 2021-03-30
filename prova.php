<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Stampanti
    </title>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="generator" content="AlterVista - Editor HTML"/>

</head>
<body>
<h1>
    Scegli Stampante
</h1>
<?php
$host='localhost';
$user='root';
$pwd='root';
$dbname='fm_consumabili';
$conn=mysqli_connect($host,$user,$pwd,$dbname);
$query_stampanti='select * from stampante ';
$stampanti=mysqli_query($conn,$query_stampanti);
$numRigheStampanti=mysqli_num_rows($stampanti);
//print ("result stampanti ha $numRigheStampanti righe ");
$query_tipi='select * from tipo_stampante ';
$tipi=mysqli_query($conn,$query_tipi);
$tipologia="";
$color="";
$colori=array();
$idCliente=2;
?>

 <br>


<form  action="<?php $_SERVER['PHP_SELF'];?>" method="GET">

<label for='stampanti'>Scegli una stampante :</label>
    <select name='idStampante' id='stampanti'>
<?php
//unset($_REQUEST);
if(!isset($_REQUEST['idStampante'])){
    echo"<option selected hidden>Seleziona dal menù a tendina</option>";
}
else{

    //print("<option value=''>".$_REQUEST['idStampante']. "</option> ");
    print("<option value=''>Stampante Selezionata</option> ");
}

foreach ($stampanti as $stampante){
    foreach ($tipi as $tipo){

        if($stampante['idTipo']==$tipo['idTipo_Stampante']){
          global $color;
          $tipologia=$tipo['tipo'];
          //$color=$stampante['colore'];
        }
    }

  print( "<option value='".$stampante['idStampante']."'>".$stampante['marca']."  ".$stampante['modello']." ".$tipologia."  ".$stampante['colore']."</option>");
}

?>
</select>
    <input type='submit' value='Conferma Stampante' >
    <!--<input type="reset" value="Cancella scelta">-->

</form>
<br>
<?php
 if (!isset($_REQUEST['idStampante'])){
echo "";
 }
 else{

     $sql = "SELECT marca,modello,colore FROM stampante";
     $sql .= " WHERE ( idStampante = '{$_REQUEST['idStampante']}' )";
     $stampante=mysqli_query($conn,$sql);
     $numRighe=mysqli_num_rows($stampante);
    // print ("la query ha $numRighe righe ");
     $riga=mysqli_fetch_object($stampante);
     print ("<p><b>Stampante ".$riga->marca." ".$riga->modello."   ".$riga->colore."</b></p>");//$riga[marca] $riga[modello] $riga[colore] ";



    print("	<h3>
            Scegli la quantità di Cartucce o Toner in base al colore
        </h3>
        <br>");
    ?>
   <form  action="ordine.php" method="GET">
<table>
<tr class='header'>
<td><b>Colore </b></td>
<td><b>Quantità</b></td>
</tr>
<?php
if( $riga->colore == 'Monocromatica'){
    $colori=array('NERO');
    }
elseif ( $riga->colore == 'a colori'){
    $colori=array('NERO','GIALLO','CIANO','MAGENTA');
}
elseif ( $riga->colore == 'Multicolor'){
    $colori=array('NERO','MULTICOLOR');
}



foreach ($colori as $colore) {
    echo("<tr>");
    echo("<td >".$colore."</td>");
    echo("<td ><select name='".$colore."' id='colore'>");
    print ("<option selected hidden>0</option>");
    for ($i=0;$i<=10;$i++){
        print( "<option id='opt' value='".$i."'>".$i."</option>");
    }

    echo ("</select>");
    echo("</td>");
    echo("</tr>");

                }



echo ("</table>");
  echo ("<input type='submit' value='Inserisci nel carrello' >");
   echo ("</form>");
}
?>
</body>
</html>
