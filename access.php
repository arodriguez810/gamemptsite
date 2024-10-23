<script>
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
	echo "USECREDIT = (estacion,juego,cantidad)=>{};";
	?>
	verifyMonitoreo = () => new Promise(async (resolve, reject) => {
		Swal.showLoading();
		$.ajax({
			type: "POST",
			url: `${API}/vw_monitoreo/list`,
			contentType: 'application/json',
			data: JSON.stringify({
				"limit": 1,
				order: "asc",
				orderby: "id",
				page: 1
			}),
			success: (data) => {
				if (data.data !== undefined) {
					let monitoreo = data.data[0];
					if (monitoreo) {
						GANANCIAS.balance_dinamico = monitoreo.balance_dinamico;
						GANANCIAS.balance_inicial = monitoreo.balance_inicial;
						GANANCIAS.presupuesto = monitoreo.presupuesto;
						GANANCIAS.probabilidad_dinamica = monitoreo.probabilidad_dinamica;
					}
					console.log(monitoreo)
					updateDatax();
				}
				resolve(true);
			}
		});
	});
	CARTA = {
		presupuesto: () => parseFloat(GANANCIAS.presupuesto) || 0,
		fondoInicial: () => parseFloat(GANANCIAS.fondo_inicial) || 0,
		indice: () => {
			return (CARTA.presupuesto() * 100 / (parseFloat(GANANCIAS.balance_inicial))) - 100;
		},
		premioMaximo: () => {
			let inicial = parseFloat(GANANCIAS.balance_inicial);
			return CARTA.presupuesto() - inicial;
		},
		excedePremioMax: (premio) => {
			if (GANANCIAS.balance_dinamico)
				return false;
			return premio > CARTA.premioMaximo();
		},
		riesgo: () => {
			let montoAdvertencia = (CARTA.fondoInicial() * GANANCIAS.indice_ganancia) / 100;
			return montoAdvertencia >= CARTA.premioMaximo();
		},
		probabilidad: (prob, premio, game) => {
			if (CARTA.riesgo())
				return prob || 0;
			if (premio !== undefined && !GANANCIAS.balance_dinamico) {
				if (CARTA.excedePremioMax(premio))
					return 0;
			}
			if (!GANANCIAS.probabilidad_dinamica)
				return prob || 0;
			let probINicial = prob;
			let modifier = CARTA.indice() / 100;
			let result = probINicial * modifier;
			if (isNaN(result))
				return 0;
			result = result > 100 ? 100 : result;
			result = result < 0 ? 0 : result;
			if (result > prob)
				result = result / (game ? ((parseInt(GANANCIAS[`balance_${game}`]) || 1)) : 1);
			return result;
		},
		monto: (prob) => {
			if (CARTA.riesgo())
				return prob || 0;
			if (!GANANCIAS.balance_dinamico)
				return prob || 0;
			let probINicial = prob;
			let modifier = CARTA.indice() / 100;
			let result = probINicial * modifier;
			if (isNaN(result) || result < 0)
				return 1;
			if (GANANCIAS.balance_dinamico)
				if (Math.ceil(result) > CARTA.premioMaximo())
					return Math.floor(CARTA.premioMaximo());
			return Math.ceil(result);
		}
	};
</script>
