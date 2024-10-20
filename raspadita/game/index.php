<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Scratch & Win</title>

	<meta name="Title" content="Scratch & Win"/>
	<meta name="description"
		  content="Scratch & Win is a HTML5 game where user given a card which can be revealed by scratching off an opaque covering, select up to 5 different scratch cards including bonus, match 3, winning numbers, every scratch card give chance to win prizes.">
	<meta name="keywords"
		  content="scratch, win, gamble, card, coin, numbers, lucky, chance, match, ticket, prize, rewards">

	<!-- for Facebook -->
	<meta property="og:title" content="Scratch & Win"/>
	<meta property="og:site_name" content="Scratch & Win"/>
	<meta property="og:image" content="https://demonisblack.com/code/2024/scratchandwin/game/share.jpg"/>
	<meta property="og:url" content="https://demonisblack.com/code/2024/scratchandwin/game/"/>
	<meta property="og:description"
		  content="Scratch & Win is a HTML5 game where user given a card which can be revealed by scratching off an opaque covering, select up to 5 different scratch cards including bonus, match 3, winning numbers, every scratch card give chance to win prizes.">

	<!-- for Twitter -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="Scratch & Win"/>
	<meta name="twitter:description"
		  content="Scratch & Win is a HTML5 game where user given a card which can be revealed by scratching off an opaque covering, select up to 5 different scratch cards including bonus, match 3, winning numbers, every scratch card give chance to win prizes."/>
	<meta name="twitter:image" content="https://demonisblack.com/code/2024/scratchandwin/game/share.jpg"/>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script>
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
			var msViewportStyle = document.createElement("style");
			msViewportStyle.appendChild(
				document.createTextNode(
					"@-ms-viewport{width:device-width}"
				)
			);
			document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
		}
	</script>

	<link rel="shortcut icon" href="icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!-- PERCENT LOADER START-->
<div id="mainLoader"><img src="assets/loader.png"/><br/><span>0</span></div>
<!-- PERCENT LOADER END-->

<!-- CONTENT START-->
<div id="mainHolder">

	<!-- BROWSER NOT SUPPORT START-->
	<div id="notSupportHolder">
		<div class="notSupport">Your browser isn't supported.<br/>Please update your browser in order to run the game.
		</div>
	</div>
	<!-- BROWSER NOT SUPPORT END-->

	<!-- CANVAS START-->
	<div id="canvasHolder">
		<canvas id="gameCanvas" width="1280" height="768"></canvas>
		<style>
			.datax {
				width: 100%;
				height: 5%;
				left: 0;
				font-size: 3vh;
				bottom: 0;
				background-color: #2c2c2c;
				vertical-align: middle;
				color: white;
				position: fixed;
				text-align: center;
			}

		</style>
		<div id="datax" class="datax">

		</div>
		<div id="qax" class="datax" style="top:0 !important;font-size: 1.5vh;height: 2%;display: none">

		</div>
	</div>
	<!-- CANVAS END-->

</div>
<!-- CONTENT END-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>

<script src="js/vendor/detectmobilebrowser.js"></script>
<script src="js/vendor/createjs.min.js"></script>
<script src="js/vendor/TweenMax.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/sound.js"></script>
<script src="js/canvas.js"></script>

<?php include_once "../../access.php" ?>

<script>

	////////////////////////////////////////////////////////////
	// SETTINGS
	////////////////////////////////////////////////////////////

	//cards settings
	var cardsSettings = [
		{
			assets: {
				landscape: {
					background: 'assets/card_bg_landscape.png',
					logo: 'assets/card_logo_landscape_2.png',
					scratch: 'assets/card_scratch_landscape_2.png',
				},
				portrait: {
					background: 'assets/card_bg_portrait.png',
					logo: 'assets/card_logo_portrait_2.png',
					scratch: 'assets/card_scratch_portrait_2.png',
				},
			},
			matchedItems: 3,
			numbers: [],
			bonusMax: 0,
			overallPercent: 100,
			price: {
				value: parseInt(GANANCIAS.raspadita_cost_per_game),
				x: 25,
				y: 50
			},
			items: [
				{
					x: 114,
					y: 130,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 220,
					y: 130,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 330,
					y: 130,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 430,
					y: 130,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 114,
					y: 225,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 220,
					y: 225,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 330,
					y: 225,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 430,
					y: 225,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 114,
					y: 320,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 220,
					y: 320,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 330,
					y: 320,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
				{
					x: 430,
					y: 320,
					width: 15,
					height: 15,
					image: {
						offsetX: 0,
						offsetY: 0,
					},
					prize: {
						offsetX: 0,
						offsetY: 0,
					},
					number: {
						offsetX: 0,
						offsetY: 0,
						fontSize: 30,
						lineHeight: 10,
						color: '#2E303A',
					},
					type: 'prize'
				},
			],
			prizes: [
				{
					value: parseInt(GANANCIAS.raspadita_price1),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price1),
						fontSize: 32,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad1),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price2),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price2),
						fontSize: 32,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad2),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price3),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price3),
						fontSize: 32,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad3),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price4),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price4),
						fontSize: 25,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad4),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price5),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price5),
						fontSize: 25,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad5),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price6),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price6),
						fontSize: 20,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad6),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price7),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price7),
						fontSize: 20,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad7),
				},
				{
					value: parseInt(GANANCIAS.raspadita_price8),
					text: {
						display: '$' + parseInt(GANANCIAS.raspadita_price8),
						fontSize: 20,
						lineHeight: 0,
						color: '#2E303A',
					},
					image: '',
					percent: parseInt(GANANCIAS.raspadita_probabilidad8),
				}
			],
			bonus: [],
			symbols: []
		}
	];

	//game settings
	var gameSettings = {
		score: { //score position
			x: 100,
			y: 0
		},
		credit: parseInt(CREDIT_RASPADITA.credito), //start credit
		scratchStrokeNum: [20, 30], //scratch stroke number
		revealScratchStrokeNum: [25, 35], //scratch stroke number
		revealSpeed: RASPADITA.gameSettings.revealSpeed, //reveal speed
		revealCurviness: RASPADITA.gameSettings.revealCurviness, //reveal curviness
		winColorFilter: [140, 35, 0],
		enablePercentage: RASPADITA.gameSettings.enablePercentage, //option to have result base on percentage
	};

	//game test display
	var textDisplay = RASPADITA.textDisplay;

	//Social share, [SCORE] will replace with game score
	var shareEnable = false; //toggle share
	var shareTitle = RASPADITA.shareTitle;//social share score title
	var shareMessage = RASPADITA.shareMessage; //social share score message

</script>
<script src="js/game.js"></script>
<script src="js/mobile.js"></script>
<script src="js/main.js"></script>
<script src="js/loader.js"></script>
<script src="js/init.js"></script>
<script src="js/sweetalert2.js"></script>
<script>
	formatMoney = (nStr) => {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	updateDatax = () => {
		let d = CREDIT_RASPADITA;
		let probs = [];
		if (parseInt(GANANCIAS.debug)) {
			for (let i = 0; i < cardsSettings[0].prizes.length; i++) {
				probs.push(`(${cardsSettings[0].prizes[i].value})=<b style="color: cornflowerblue">${cardsSettings[0].prizes[i].percent}%</b>`);
			}
			if (CARTA.presupuesto()) {
				probs.push(`Caja:<b style="color: cornflowerblue">$${CARTA.presupuesto()}</b>`);
				probs.push(`Premios:<b style="color: cornflowerblue">$${CARTA.premioMaximo()}</b>`);
			}
			// $("#datax").css("height", "12%");
		}

		$("#datax").html(`
Estación: <b style="color: cornflowerblue">${d.comercio}/${d.estacion}</b>
Disponible: <b style="color: mediumseagreen">${formatMoney(parseInt(d.acumulado))}</b>`
			+ (probs.length ? `<br>Monitoreo: ${probs.join("|")}` : ``));

		if (probs.length) {
			$("#qax").show();
			$("#qax").html(`Monitoreo: ${probs.join("|")}`);
		}
	};
	verifyData = () => new Promise(async (resolve, reject) => {
		Swal.fire("GAME FORTUNE", `Verificando Créditos`, 'info');
		await verifyMonitoreo();
		Swal.showLoading();
		if (typeof cardsSettings !== "undefined") {
			for (let i = 0; i < cardsSettings[0].prizes.length; i++) {
				cardsSettings[0].prizes[i].percent = Math.floor(CARTA.probabilidad(GANANCIAS[`raspadita_probabilidad${i + 1}`], GANANCIAS[`raspadita_price${i + 1}`], "raspa"));
				cardsSettings[0].prizes[i].value = Math.floor(CARTA.monto(GANANCIAS[`raspadita_price${i + 1}`]));
				cardsSettings[0].prizes[i].text.display = `${cardsSettings[0].prizes[i].value}`;
			}
		}
		$.ajax({
			type: "POST",
			url: `${API}/estacion/list`,
			contentType: 'application/json',
			data: JSON.stringify({
				"limit": 1,
				order: "asc",
				orderby: "id",
				page: 1,
				"where": [{"value": CREDIT_RASPADITA.id}]
			}),
			success: (data) => {
				if (data.data !== undefined) {
					let newData = data.data[0];
					CREDIT_RASPADITA.credito = parseFloat(newData.credito_2);
					CREDIT_RASPADITA.acumulado = CREDIT_RASPADITA.credito;
					updateDatax();
				}
				Swal.close();
				resolve(true);
			}
		});
	});
	useCredit = (count) => new Promise(async (resolve, reject) => {
		Swal.fire("GAME FORTUNE", `Actualizando Créditos`, 'info');
		Swal.showLoading();
		CREDIT_RASPADITA.credito = count;
		CREDIT_RASPADITA.acumulado = count;
		let data = {
			"credito_2": CREDIT_RASPADITA.credito,
			"acumulado_2": CREDIT_RASPADITA.credito,
			"where": [{"value": CREDIT_RASPADITA.id}]
		};
		$.ajax({
			type: "POST",
			url: `${API}/estacion/update`,
			contentType: 'application/json',
			data: JSON.stringify(data),
			success: () => {
				Swal.close();
				updateDatax();
				resolve(true);
			}
		});
	});
	Acumular = (add) => new Promise(async (resolve, reject) => {
		Swal.fire("GAME FORTUNE", `Acumulando Premio`, 'info');
		Swal.showLoading();
		CREDIT_RASPADITA.acumulado = parseInt(CREDIT_RASPADITA.acumulado) + add;
		$.ajax({
			type: "POST",
			url: `${API}/estacion/update`,
			contentType: 'application/json',
			data: `{"acumulado_2":${CREDIT_RASPADITA.acumulado},"where":[{"value":${CREDIT_RASPADITA.id}}]}`,
			success: () => {
				Swal.close();
				updateDatax();
				resolve(true);
			}
		});
	});
	$(document).ready(() => {
		verifyData();
		updateDatax();
		setTimeout(() => {
			toggleFullScreen();
		}, 1000)
	});
</script>
</body>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HLLD36WVRF"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}

	gtag('js', new Date());

	gtag('config', 'G-HLLD36WVRF');
</script>

</html>
