<?php

$servername = "localhost";
$username ="root";
$passaword = "";
$db_name ="academia";



$connect = mysqli_connect($servername,$username,$passaword,$db_name);
mysqli_set_charset($connect, "utf8");
if (mysqli_connect_error()):
	echo "Erro na conex�o".mysqli_connect_error();

endif;