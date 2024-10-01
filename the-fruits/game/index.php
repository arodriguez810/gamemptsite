<!DOCTYPE html>
<html>
<head>
	<title>SLOT THE FRUITS</title>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/orientation_utils.css" type="text/css">
	<link rel="stylesheet" href="css/ios_fullscreen.css" type="text/css">
	<link rel='shortcut icon' type='image/x-icon' href='./favicon.ico'/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui"/>
	<meta name="msapplication-tap-highlight" content="no"/>


	<?php include_once "../../access.php" ?>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/createjs-2015.11.26.min.js"></script>
	<script type="text/javascript" src="js/howler.min.js"></script>
	<script type="text/javascript" src="js/screenfull.js"></script>
	<script type="text/javascript" src="js/platform.js"></script>
	<script type="text/javascript" src="js/ios_fullscreen.js"></script>
	<script type="text/javascript" src="js/ctl_utils.js"></script>
	<script type="text/javascript" src="js/sprite_lib.js"></script>
	<script type="text/javascript" src="js/settings.js"></script>
	<script type="text/javascript" src="js/CSlotSettings.js"></script>
	<script>
		var TEXT_MONEY = FRUITS.TEXT_MONEY;
		var TEXT_PLAY = FRUITS.TEXT_PLAY;
		var TEXT_BET = FRUITS.TEXT_BET;
		var TEXT_COIN = FRUITS.TEXT_COIN;
		var TEXT_MAX_BET = FRUITS.TEXT_MAX_BET;
		var TEXT_INFO = FRUITS.TEXT_INFO;
		var TEXT_LINES = FRUITS.TEXT_LINES;
		var TEXT_SPIN = FRUITS.TEXT_SPIN;
		var TEXT_WIN = FRUITS.TEXT_WIN;
		var TEXT_HELP_WILD = FRUITS.TEXT_HELP_WILD;
		var TEXT_CREDITS_DEVELOPED = FRUITS.TEXT_CREDITS_DEVELOPED;
		var TEXT_CURRENCY = FRUITS.TEXT_CURRENCY;
		var TEXT_PRELOADER_CONTINUE = FRUITS.TEXT_PRELOADER_CONTINUE;
		var TEXT_NO_MONEY = FRUITS.TEXT_NO_MONEY;
		var TEXT_RECHARGE = FRUITS.TEXT_RECHARGE;

		var TEXT_SHARE_IMAGE = "200x200.jpg";
		var TEXT_SHARE_TITLE = FRUITS.TEXT_SHARE_TITLE;
		var TEXT_SHARE_MSG1 = FRUITS.TEXT_SHARE_MSG1;
		var TEXT_SHARE_MSG2 = FRUITS.TEXT_SHARE_MSG2;
		var TEXT_SHARE_SHARE1 = FRUITS.TEXT_SHARE_SHARE1;
		var TEXT_SHARE_SHARE2 = FRUITS.TEXT_SHARE_SHARE2;

	</script>
	<script type="text/javascript" src="js/CPreloader.js"></script>
	<script type="text/javascript" src="js/CMain.js"></script>
	<script type="text/javascript" src="js/CTextButton.js"></script>
	<script type="text/javascript" src="js/CGfxButton.js"></script>
	<script type="text/javascript" src="js/CToggle.js"></script>
	<script type="text/javascript" src="js/CBetBut.js"></script>
	<script type="text/javascript" src="js/CMenu.js"></script>
	<script type="text/javascript" src="js/CGame.js"></script>
	<script type="text/javascript" src="js/CReelColumn.js"></script>
	<script type="text/javascript" src="js/CInterface.js"></script>
	<script type="text/javascript" src="js/CPayTablePanel.js"></script>
	<script type="text/javascript" src="js/CStaticSymbolCell.js"></script>
	<script type="text/javascript" src="js/CTweenController.js"></script>
	<script type="text/javascript" src="js/CCreditsPanel.js"></script>
	<script type="text/javascript" src="js/CCTLText.js"></script>
	<script type="text/javascript" src="js/CRechargePanel.js"></script>

</head>
<body ondragstart="return false;" ondrop="return false;">
<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
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
		let d = CREDIT_FRUITS;
		let probs = [];
		if (parseInt(GANANCIAS.debug)) {
			probs.push(`Probabilidad de Ganar:<b style="color: cornflowerblue">${GANANCIAS.fruitswinrate}%</b>`);
			probs.push(`Caja:<b style="color: cornflowerblue">$${CARTA.presupuesto()}</b>`);
			probs.push(`Premios:<b style="color: cornflowerblue">$${CARTA.premioMaximo()}</b>`);
		}
		$("#datax").html(`
Estación:<b style="color: cornflowerblue">${d.comercio}/${d.estacion}</b>
Disponible: <b style="color: mediumseagreen">${formatMoney(parseInt(d.acumulado))}</b>`);

		if (probs.length) {
			$("#qax").show();
			$("#qax").html(`Monitoreo: ${probs.join("|")}`);
		}
	};
	useCredit = (count) => new Promise(async (resolve, reject) => {
		Swal.fire("GAME FORTUNE", `Actualizando Créditos`, 'info');
		await verifyMonitoreo();
		Swal.showLoading();
		CREDIT_FRUITS.credito = count;
		CREDIT_FRUITS.acumulado = count;
		let data = {
			"credito_3": CREDIT_FRUITS.credito,
			"acumulado_3": CREDIT_FRUITS.credito,
			"where": [{"value": CREDIT_FRUITS.id}]
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
		await verifyMonitoreo();
		Swal.showLoading();
		CREDIT_FRUITS.acumulado = parseInt(CREDIT_FRUITS.acumulado) + add;
		$.ajax({
			type: "POST",
			url: `${API}/estacion/update`,
			contentType: 'application/json',
			data: `{"acumulado_3":${CREDIT_FRUITS.acumulado},"where":[{"value":${CREDIT_FRUITS.id}}]}`,
			success: () => {
				Swal.close();
				updateDatax();
				resolve(true);
			}
		});
	});
	$(document).ready(() => {
		verifyMonitoreo().then(d => {
			updateDatax();
			Swal.close();
		});
	});
</script>
<script>
	$(document).ready(function () {
		oMain = new CMain({
			win_occurrence: parseInt(GANANCIAS.fruitswinrate),        //WIN PERCENTAGE.SET A VALUE FROM 0 TO 100.
			slot_cash: FRUITS.slot_cash,          //THIS IS THE CURRENT SLOT CASH AMOUNT. THE GAME CHECKS IF THERE IS AVAILABLE CASH FOR WINNINGS.
			min_reel_loop: FRUITS.min_reel_loop,          //NUMBER OF REEL LOOPS BEFORE SLOT STOPS
			reel_delay: FRUITS.reel_delay,            //NUMBER OF FRAMES TO DELAY THE REELS THAT START AFTER THE FIRST ONE
			time_show_win: FRUITS.time_show_win,       //DURATION IN MILLISECONDS OF THE WINNING COMBO SHOWING
			time_show_all_wins: FRUITS.time_show_all_wins, //DURATION IN MILLISECONDS OF ALL WINNING COMBO
			money: parseInt(CREDIT_FRUITS.acumulado),               //STARING CREDIT FOR THE USER

			/***********PAYTABLE********************/
			//EACH SYMBOL PAYTABLE HAS 5 VALUES THAT INDICATES THE MULTIPLIER FOR X1,X2,X3,X4 OR X5 COMBOS
			paytable_symbol_1: [
				parseInt(GANANCIAS.fruits_cereza1),
				parseInt(GANANCIAS.fruits_cereza2),
				parseInt(GANANCIAS.fruits_cereza3),
				parseInt(GANANCIAS.fruits_cereza4),
				parseInt(GANANCIAS.fruits_cereza5)
			],
			paytable_symbol_2: [
				parseInt(GANANCIAS.fruits_pera1),
				parseInt(GANANCIAS.fruits_pera2),
				parseInt(GANANCIAS.fruits_pera3),
				parseInt(GANANCIAS.fruits_pera4),
				parseInt(GANANCIAS.fruits_pera5)
			],  //PAYTABLE FOR SYMBOL 2
			paytable_symbol_3: [
				parseInt(GANANCIAS.fruits_sandia1),
				parseInt(GANANCIAS.fruits_sandia2),
				parseInt(GANANCIAS.fruits_sandia3),
				parseInt(GANANCIAS.fruits_sandia4),
				parseInt(GANANCIAS.fruits_sandia5)
			],  //PAYTABLE FOR SYMBOL 3
			paytable_symbol_4: [
				parseInt(GANANCIAS.fruits_naranja1),
				parseInt(GANANCIAS.fruits_naranja2),
				parseInt(GANANCIAS.fruits_naranja3),
				parseInt(GANANCIAS.fruits_naranja4),
				parseInt(GANANCIAS.fruits_naranja5)
			],  //PAYTABLE FOR SYMBOL 4
			paytable_symbol_5: [
				parseInt(GANANCIAS.fruits_k1),
				parseInt(GANANCIAS.fruits_k2),
				parseInt(GANANCIAS.fruits_k3),
				parseInt(GANANCIAS.fruits_k4),
				parseInt(GANANCIAS.fruits_k5)
			],    //PAYTABLE FOR SYMBOL 5
			paytable_symbol_6: [
				parseInt(GANANCIAS.fruits_q1),
				parseInt(GANANCIAS.fruits_q2),
				parseInt(GANANCIAS.fruits_q3),
				parseInt(GANANCIAS.fruits_q4),
				parseInt(GANANCIAS.fruits_q5)
			],    //PAYTABLE FOR SYMBOL 6
			paytable_symbol_7: [
				parseInt(GANANCIAS.fruits_j1),
				parseInt(GANANCIAS.fruits_j2),
				parseInt(GANANCIAS.fruits_j3),
				parseInt(GANANCIAS.fruits_j4),
				parseInt(GANANCIAS.fruits_j5)
			],     //PAYTABLE FOR SYMBOL 7
			/*************************************/
			audio_enable_on_startup: true, //ENABLE/DISABLE AUDIO WHEN GAME STARTS
			fullscreen: false,           //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
			check_orientation: true,    //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
			show_credits: FRUITS.show_credits,         //ENABLE/DISABLE CREDITS BUTTON IN THE MAIN SCREEN
			ad_show_counter: 3         //NUMBER OF SPIN PLAYED BEFORE AD SHOWING
			//
			//// THIS FEATURE  IS ACTIVATED ONLY WITH CTL ARCADE PLUGIN.///////////////////////////
			/////////////////// YOU CAN GET IT AT: /////////////////////////////////////////////////////////
			// http://codecanyon.net/item/ctl-arcade-wordpress-plugin/13856421///////////

		});

		$(oMain).on("recharge", function (evt) {
			//INSERT HERE YOUR RECHARGE SCRIPT THAT RETURN MONEY TO RECHARGE
			if (parseInt(CREDIT_FRUITS.credito) <= 0) {
				Swal.fire("GAME FORTUNE", `Para recargar por favor indicar al encargado`, 'error');
				return;
			}
		});


		$(oMain).on("start_session", function (evt) {
			if (getParamValue('ctl-arcade') === "true") {
				parent.__ctlArcadeStartSession();
			}
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("end_session", function (evt) {
			if (getParamValue('ctl-arcade') === "true") {
				parent.__ctlArcadeEndSession();
			}
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("bet_placed", function (evt, oBetInfo) {
			var iBet = oBetInfo.bet;
			var iTotBet = oBetInfo.tot_bet;
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("save_score", function (evt, iMoney) {
			if (getParamValue('ctl-arcade') === "true") {
				parent.__ctlArcadeSaveScore({score: iMoney});
			}
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("show_preroll_ad", function (evt) {
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("show_interlevel_ad", function (evt) {
			if (getParamValue('ctl-arcade') === "true") {
				parent.__ctlArcadeShowInterlevelAD();
			}
			//...ADD YOUR CODE HERE EVENTUALLY
		});

		$(oMain).on("share_event", function (evt, iScore) {
			if (getParamValue('ctl-arcade') === "true") {
				parent.__ctlArcadeShareEvent({
					img: TEXT_SHARE_IMAGE,
					title: TEXT_SHARE_TITLE,
					msg: TEXT_SHARE_MSG1 + iScore + TEXT_SHARE_MSG2,
					msg_share: TEXT_SHARE_SHARE1 + iScore + TEXT_SHARE_SHARE1
				});
			}
		});

		if (isIOS()) {
			setTimeout(function () {
				sizeHandler();
			}, 200);
		} else {
			sizeHandler();
		}
	});

</script>
<div class="check-fonts">
	<p class="check-font-1">test 1</p>
</div>

<!--//lareso-->
<div>
	<canvas id="canvas" class='ani_hack' width="1500" height="640"></canvas>
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
<div data-orientation="landscape" class="orientation-msg-container"><p class="orientation-msg-text">Please rotate your
		device</p></div>
<div id="block_game"
	 style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
</body>
</html>
