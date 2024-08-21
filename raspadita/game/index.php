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
<script>
	<?php include_once "../../access.php" ?>
</script>
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
				value: 5,
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
		credit: 100, //start credit
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
