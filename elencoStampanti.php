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
$query="select * from stampante";
$stampanti=mysqli_query($conn, $query);
$query_tipi="select * from tipo_stampante";
$tipi=mysqli_query($conn, $query_tipi);
//$tipologia="";
/*foreach ($stampanti as $stampante){
    foreach ($tipi as $tipo){
        if($stampante['idTipo']==$tipo['idTipo_Stampante']){
            $tipologia=$tipo['tipo'];
        }
    }

}*/
echo("</br>
		</br>
		</br>
		</br>");
if(mysqli_num_rows($stampanti)>0){
    print("<table>");
    print("<tr class='header'>");
    print("<td><b>MARCA </b></td>");
    print("<td><b>MODELLO</b></td>");
    //print("<td><b>TIPO</b></td>");
    print("<td><b>COLORE</b></td>");
    print("</tr>");
}

while($record=mysqli_fetch_array($stampanti)){

    echo("<tr>");
    echo("<td >".$record['marca']."</td>");
    echo("<td >".$record['modello']."</td>");
    //echo("<td >".$tipologia."</td>");
    echo("<td >".$record['colore']."</td>");
    echo("</tr>");
}
echo("</table>");
?>
</body></html>
