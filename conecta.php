<?php  

$conect = mysql_connect("localhost", "root", "");
if (!$conect) {
	die ("<h1>Falha na coneco com o Banco de Dados!</h1>");
}

$db_selected = mysql_select_db('finest', $conect);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
//echo "coisa linda!!!"
//echo "DEU CERTO!!!"
?>