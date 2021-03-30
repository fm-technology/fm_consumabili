<html lang="EN">
<head>
    <title> Carrello </title>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8">
    </head>
<body>
<h1>
    Carrello
</h1>
<?php
mysqli_close($conn);
if(!mysqli_close($conn)){
    //echo "connessione chiusa";
}
$host='localhost'; //inserire qui l'url del database
$user='root'; //inserire il nome utente scelto per il database
$pwd="root"; //inserire la password dell'utente sopra indicato
$dbname="fm_consumabili"; //inserire qui il nome del database
$conn=mysqli_connect($host,$user,$pwd,$dbname);
if(!$conn){
    die('Connessione fallita: ' . mysqli_connect_error());
}
$idStampante=$_GET['idStampante'];
$num_nero=$_GET['NERO'];
$num_giallo=$_GET['GIALLO'];
$num_ciano=$_GET['CIANO'];
$num_magenta=$_GET['MAGENTA'];
$sql = "SELECT marca,modello,colore FROM stampante";
$sql .= " WHERE ( idStampante = '{$_REQUEST['idStampante']}' )";
//$query_stampante="select * from stampante where (idStampante=2)";

$stampante= mysqli_query($conn,$sql);//oggetto result
$numRighe=mysqli_num_rows($stampante);
// print ("la query ha $numRighe righe ");
$riga=mysqli_fetch_object($stampante);
//print ("<p><b>Stampante ".$riga->marca." ".$riga->modello."   ".$riga->colore."</b></p>");//$riga[marca] $riga[modello] $riga[colore] ";
?>
<table>
    <tr class='header'>
        <th><b>Stampante </b></th>
        <th><b>Colore </b></th>
        <th><b>Quantità</b></th>
    </tr>
 <?php

 if ($_GET['NERO']) {
     echo("<tr>");
     echo("<td >" . $riga->marca . " " . $riga->modello . " </td>");
     echo("<td >Nero</td>");
     echo("<td >" . $_GET['NERO'] . "</td>");
     echo("</tr>");
 }
 if ($_GET['GIALLO']) {
     echo("<tr>");
     echo("<td >" . $riga->marca . " " . $riga->modello . " </td>");
     echo("<td >Giallo</td>");
     echo("<td >" . $_GET['GIALLO'] . "</td>");
     echo("</tr>");
 }
 if ($_GET['CIANO']) {
     echo("<tr>");
     echo("<td >" . $riga->marca . " " . $riga->modello . " </td>");
     echo("<td >Ciano</td>");
     echo("<td >" . $_GET['CIANO'] . "</td>");
     echo("</tr>");
 }
 if ($_GET['MAGENTA']) {
     echo("<tr>");
     echo("<td >" . $riga->marca . " " . $riga->modello . " </td>");
     echo("<td >Magenta</td>");
     echo("<td >" . $_GET['MAGENTA'] . "</td>");
     echo("</tr>");
 }
 if ($_GET['MULTICOLOR']) {
     echo("<tr>");
     echo("<td >" . $riga->marca . " " . $riga->modello . " </td>");
     echo("<td >Multicolor</td>");
     echo("<td >" . $_GET['MULTICOLOR'] . "</td>");
     echo("</tr>");
 }

 echo"</table>";
//$numRighe=mysqli_num_rows($stampante);
//print ("la query ha $numRighe righe ");
/*$record=mysqli_fetch_object($stampante);

$marca=$record->marca;
$modello=$record->modello;
echo "idstampante =$idStampante";
echo("<br>");
echo $num_nero;
echo("<br>");
echo $num_giallo;
echo("<br>");
echo $num_ciano;
echo("<br>");
echo $num_magenta;
echo("<br>");
echo $marca;
echo("<br>");
echo $modello;*/
/*$query="insert into ordine (COD_ARTICOLO,DES_ARTICOLO,COD_MARCA,COD_TIPOLOGIA,PREZZO_ACQ,PREZZO_VEN,PERC_IVA,IMG_PICCOLA) values
			('$_GET[cod_articolo]','$_GET[des_articolo]','$_GET[cod_marca]','$_GET[cod_tipologia]','$_GET[prezzo_acq]','$_GET[prezzo_ven]','$_GET[perc_iva]','$_GET[img_piccola]')";
$articolo=mysqli_query($conn,$query);
if($articolo)
{
    print("Nuovo Articolo Salvato nel Db");
}
else
{
    print("Ops..qualcosa è andato storto");
}*/
?>
