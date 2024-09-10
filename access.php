<?php
$servername = "151.106.62.86";
$username = "arr";
$password = '%Luch@134679()^^()Mortero$CC';
$database = "gamempt";
$estacion = str_replace("estacion=", "", $_SERVER['QUERY_STRING']);

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ganancia";
$result = $conn->query($sql);
$myArray = array();
while ($row = $result->fetch_assoc()) {
	$myArray[] = $row;
}
$json = json_encode($myArray);
$sql2 = "SELECT * FROM gameconfig";
$result2 = $conn->query($sql2);
$myArray2 = array();
while ($row = $result2->fetch_assoc()) {
	$myArray2[] = $row;
}
$json2 = json_encode($myArray2);
echo "var GANANCIAS = $json; GANANCIAS=GANANCIAS[0];";
echo "var GAMECONFIG = $json2; GAMECONFIG=GAMECONFIG[0];";
echo "var API = 'http://151.106.62.86:6060/api';";
echo "LOTERY = JSON.parse(GAMECONFIG.lotery);";
echo "RASPADITA = JSON.parse(GAMECONFIG.raspadita);";
echo "FRUITS = JSON.parse(GAMECONFIG.fruits);";

$sql = "SELECT * FROM vw_estacion_data where id=$estacion";
$result = $conn->query($sql);
$myArray = array();
while ($row = $result->fetch_assoc()) {
	$myArray[] = $row;
}
$json3 = json_encode($myArray);
echo "var ESTACION = $json3;";
echo "var CREDIT_LOTERIA = ESTACION.filter(d=>d.juego_id==1)[0];";
echo "var CREDIT_RASPADITA = ESTACION.filter(d=>d.juego_id==2)[0];";
echo "var CREDIT_FRUITS = ESTACION.filter(d=>d.juego_id==3)[0];";
echo "USECREDIT = (estacion,juego,cantidad)=>{}";
?>
