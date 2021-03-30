<html>
<head>

    <title> Elenco Stampanti </title>

    <link href="style.css" rel="stylesheet">

</head><body >
<h1 >Elenco Stampanti </h1>
<?php
$host="localhost"; //inserire qui l'url del database
$user="root"; //inserire il nome utente scelto per il database
$pwd="root"; //inserire la password dell'utente sopra indicato
$dbname="fm_consumabili"; //inserire qui il nome del database
$conn=mysqli_connect($host,$user,$pwd,$dbname);
$query="select * from tipo_stampante";
$tipo=mysqli_query($conn, $query);
echo("</br>
		</br>");
if(mysqli_num_rows($tipo)>0){
    print("<table>");
    print("<tr class='header'>");
    print("<td><b>MARCA </b></td>");
    print("<td><b>MODELLO</b></td>");

}
while($record=mysqli_fetch_array($tipo)){
    echo("<tr>");
    echo("<td >".$record['idTipo_Stampante']."</td>");
    echo("<td >".$record['tipo']."</td>");

    echo("</tr>");
}
echo("</table>");
?>
</body></html>
