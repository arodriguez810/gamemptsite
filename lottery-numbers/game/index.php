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
	<title>Lottery Numbers</title>

	<meta name="Title" content="Lottery Numbers"/>
	<meta name="description"
		  content="Lottery Numbers is a HTML5 game which player choosing the numbered tickets and giving prizes to the holders of numbers drawn at random.">
	<meta name="keywords" content="lottery, win, gamle, card, ball, lucky, chance, match, number, ticket, prize">

	<!-- for Facebook -->
	<meta property="og:title" content="Lottery Numbers"/>
	<meta property="og:site_name" content="Lottery Numbers"/>
	<meta property="og:image" content="https://demonisblack.com/code/2017/lotterynumbers/game/share.jpg"/>
	<meta property="og:url" content="https://demonisblack.com/code/2017/lotterynumbers/game/"/>
	<meta property="og:description"
		  content="Lottery Numbers is a HTML5 game which player choosing the numbered tickets and giving prizes to the holders of numbers drawn at random.">

	<!-- for Twitter -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="Lottery Numbers"/>
	<meta name="twitter:description"
		  content="Lottery Numbers is a HTML5 game which player choosing the numbered tickets and giving prizes to the holders of numbers drawn at random."/>
	<meta name="twitter:image" content="https://demonisblack.com/code/2017/lotterynumbers/game/share.jpg"/>

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
<div id="mainLoader"><img src="assets/loader.png"/><br><span>0</span></div>
<!-- PERCENT LOADER END-->

<!-- CONTENT START-->
<div id="mainHolder">

	<!-- BROWSER NOT SUPPORT START-->
	<div id="notSupportHolder">
		<div class="notSupport">YOUR BROWSER ISN'T SUPPORTED.<br/>PLEASE UPDATE YOUR BROWSER IN ORDER TO RUN THE GAME
		</div>
	</div>
	<!-- BROWSER NOT SUPPORT END-->

	<!-- ROTATE INSTRUCTION START-->
	<div id="rotateHolder">
		<div class="mobileRotate">
			<div class="rotateDesc">
				<div class="rotateImg"><img src="assets/rotate.png"/></div>
				Rotate your device <br/>to landscape
			</div>
		</div>
	</div>
	<!-- ROTATE INSTRUCTION END-->

	<!-- CANVAS START-->
	<div id="canvasHolder">
		<canvas id="gameCanvas" width="1500" height="680"></canvas>
	</div>
	<!-- CANVAS END-->

</div>
<!-- CONTENT END-->

<script>
	<?php include_once "../../access.php" ?>
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>

<script src="js/vendor/detectmobilebrowser.js"></script>
<script src="js/vendor/createjs.min.js"></script>
<script src="js/vendor/TweenMax.min.js"></script>
<script src="js/vendor/p2.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/sound.js"></script>
<script src="js/canvas.js"></script>
<script src="js/p2.js"></script>

<script>

	////////////////////////////////////////////////////////////
	// GAME v2.6
	////////////////////////////////////////////////////////////

	/*!
	 *
	 * GAME SETTING CUSTOMIZATION START
	 *
	 */

	var gameSettings = LOTERY.gameSettings;

	var textDisplay = LOTERY.textDisplay;

	//score points array and also the total number to reveal
	var score_arr = [
		{prize: parseInt(GANANCIAS.lottery_acierto1), percent: parseInt(GANANCIAS.lottery_probabilidad1)},
		{prize: parseInt(GANANCIAS.lottery_acierto2), percent: parseInt(GANANCIAS.lottery_probabilidad2)},
		{prize: parseInt(GANANCIAS.lottery_acierto3), percent: parseInt(GANANCIAS.lottery_probabilidad3)},
		{prize: parseInt(GANANCIAS.lottery_acierto4), percent: parseInt(GANANCIAS.lottery_probabilidad4)},
		{prize: parseInt(GANANCIAS.lottery_acierto5), percent: parseInt(GANANCIAS.lottery_probabilidad5)},
		{prize: parseInt(GANANCIAS.lottery_acierto6), percent: parseInt(GANANCIAS.lottery_probabilidad6)}
	];

	//bonus score point
	var bonusScore = [
		{prize: 50000, percent: 1}
	];

	//Social share, [SCORE] will replace with game score
	var shareEnable = true; //toggle share
	var shareText = LOTERY.shareText; //social share message
	var shareTitle = LOTERY.shareTitle;
	var shareMessage = LOTERY.shareMessage;

	/*!
	 *
	 * GAME SETTING CUSTOMIZATION END
	 *
	 */

	var playerData = {score: 0};
	var gameData = {
		paused: true,
		sphereX: 400,
		sphereY: 325,
		cageRadius: 225,
		radius: 0,
		spin: false,
		selectNum: 0,
		numberNum: 0,
		numberArray: [],
		selectArray: [],
		winArray: [],
		buttonArray: [],
		indexArray: [],
		dimArray: [],
		matchNum: 0,
		ballsArray: [],
		cageArray: [],
		revealArray: [],
		totalBall: [],
		ballNumber: []
	};
	var radiusTweenData = {radius: 0};
	var soundTweenData = {volume: 0};
	var optimizeData = {balls: 40};
	var cardData = LOTERY.cardData;
	var ballData = LOTERY.ballData;

	/*!
	 *
	 * GAME BUTTONS - This is the function that runs to setup button event
	 *
	 */
	function buildGameButton() {
		$(window).focus(function () {
			if (!buttonSoundOn.visible) {
				toggleSoundInMute(false);
			}

			if (typeof buttonMusicOn != "undefined") {
				if (!buttonMusicOn.visible) {
					toggleMusicInMute(false);
				}
			}
		});

		$(window).blur(function () {
			if (!buttonSoundOn.visible) {
				toggleSoundInMute(true);
			}

			if (typeof buttonMusicOn != "undefined") {
				if (!buttonMusicOn.visible) {
					toggleMusicInMute(true);
				}
			}
		});

		if ($.browser.mobile || isTablet) {

		} else {
			var isInIframe = (window.location != window.parent.location) ? true : false;
			if (isInIframe) {
				$(window).blur(function () {
					appendFocusFrame();
				});
				appendFocusFrame();
			}
		}

		if (gameSettings.enablePercentage) {
			createPercentage();
		}

		buttonStart.cursor = "pointer";
		buttonStart.addEventListener("click", function (evt) {
			playSound('soundClick');
			goPage('game');
		});

		buttonContinue.cursor = "pointer";
		buttonContinue.addEventListener("click", function (evt) {
			playSound('soundClick');
			goPage('main');
		});

		buttonFacebook.cursor = "pointer";
		buttonFacebook.addEventListener("click", function (evt) {
			share('facebook');
		});
		buttonTwitter.cursor = "pointer";
		buttonTwitter.addEventListener("click", function (evt) {
			share('twitter');
		});
		buttonWhatsapp.cursor = "pointer";
		buttonWhatsapp.addEventListener("click", function (evt) {
			share('whatsapp');
		});

		buttonSoundOff.cursor = "pointer";
		buttonSoundOff.addEventListener("click", function (evt) {
			toggleSoundMute(true);
		});

		buttonSoundOn.cursor = "pointer";
		buttonSoundOn.addEventListener("click", function (evt) {
			toggleSoundMute(false);
		});

		if (typeof buttonMusicOff != "undefined") {
			buttonMusicOff.cursor = "pointer";
			buttonMusicOff.addEventListener("click", function (evt) {
				toggleMusicMute(true);
			});
		}

		if (typeof buttonMusicOn != "undefined") {
			buttonMusicOn.cursor = "pointer";
			buttonMusicOn.addEventListener("click", function (evt) {
				toggleMusicMute(false);
			});
		}

		buttonFullscreen.cursor = "pointer";
		buttonFullscreen.addEventListener("click", function (evt) {
			toggleFullScreen();
		});

		buttonExit.cursor = "pointer";
		buttonExit.addEventListener("click", function (evt) {
			toggleConfirm(true);
		});

		buttonSettings.cursor = "pointer";
		buttonSettings.addEventListener("click", function (evt) {
			toggleOption();
		});

		buttonConfirm.cursor = "pointer";
		buttonConfirm.addEventListener("click", function (evt) {
			toggleConfirm(false);
			stopGame();
			goPage('main');
		});

		buttonCancel.cursor = "pointer";
		buttonCancel.addEventListener("click", function (evt) {
			toggleConfirm(false);
		});

		buttonLucky.cursor = "pointer";
		buttonLucky.addEventListener("click", function (evt) {
			playSound('soundRandom')
			randomizeNumber();
		});

		buttonSphereStart.cursor = "pointer";
		buttonSphereStart.addEventListener("click", function (evt) {
			startSpin();
		});

		buttonLeft.cursor = "pointer";
		buttonLeft.addEventListener("click", function (evt) {
			playSound('soundClick');
			toggleNumberCard(false);
		});

		buttonRight.cursor = "pointer";
		buttonRight.addEventListener("click", function (evt) {
			playSound('soundClick');
			toggleNumberCard(true);
		});
	}

	function appendFocusFrame() {
		$('#mainHolder').prepend('<div id="focus" style="position:absolute; width:100%; height:100%; z-index:1000;"></div');
		$('#focus').click(function () {
			$('#focus').remove();
		});
	}

	/*!
	 *
	 * DISPLAY PAGES - This is the function that runs to display pages
	 *
	 */
	var curPage = ''

	function goPage(page) {
		curPage = page;

		mainContainer.visible = false;
		gameContainer.visible = false;
		resultContainer.visible = false;

		var targetContainer = null;
		switch (page) {
			case 'main':
				targetContainer = mainContainer;
				break;

			case 'game':
				targetContainer = gameContainer;
				startGame();
				break;

			case 'result':
				targetContainer = resultContainer;
				stopGame();

				if (gameData.matchNum != -1) {
					playSound('soundComplete');
					resultTitleTxt.text = textDisplay.resultCompleteText.replace('[NUMBER]', addCommas(playerData.score));
					saveGame(playerData.score);
				} else {
					playSound('soundFail');
					resultTitleTxt.text = textDisplay.resultFailText;
					saveGame(0);
				}
				break;
		}

		if (targetContainer != null) {
			targetContainer.visible = true;
			targetContainer.alpha = 0;
			TweenMax.to(targetContainer, .5, {alpha: 1, overwrite: true});
		}

		resizeCanvas();
	}

	function toggleConfirm(con) {
		confirmContainer.visible = con;

		if (con) {
			TweenMax.pauseAll(true, true);
			gameData.paused = true;
		} else {
			TweenMax.resumeAll(true, true)
			gameData.paused = false;
		}
	}

	/*!
	 *
	 * START GAME - This is the function that runs to start play game
	 *
	 */

	function startGame() {
		playerData.score = 0;

		gameData.spin = false;
		gameData.selectArray = [];
		gameData.winArray = [];
		gameData.radius = 0;
		gameData.matchNum = -1;
		gameData.numberNum = 0;
		radiusTweenData.radius = 0;

		resetCard();
		shuffle(gameData.numberArray);
		shuffle(gameData.indexArray);

		var thisTotalBall = gameSettings.totalBall > optimizeData.balls ? optimizeData.balls : gameSettings.totalBall;
		for (var n = 0; n < thisTotalBall; n++) {
			var targetIndex = gameData.indexArray[n];
			var targetBall = gameData.ballsArray[targetIndex].obj;
			targetBall.scaleX = targetBall.scaleY = ballData.scale * .9;

			targetBall.x = randomIntFromInterval(gameData.sphereX - 100, gameData.sphereX + 100);
			targetBall.y = gameData.sphereY;
			ballsContainer.setChildIndex(targetBall, n);
		}
		resetBallsTimer();

		//randomize numbers
		gameData.ballNumber = [];

		shuffle(gameData.totalBall);
		for (var n = 0; n < gameData.ballsArray.length; n++) {
			var currentNumber = Number(gameData.totalBall[n]);
			gameData.ballNumber.push({index: n, number: currentNumber, status: false});
			if (gameSettings.numberStartZero) {
				currentNumber = pad(currentNumber, 2);
			} else {
				currentNumber = pad(currentNumber + 1, 2);
			}

			for (var p = 0; p < gameData.ballsArray[n].text.length; p++) {
				gameData.ballsArray[n].text[p].text = currentNumber;
				gameData.ballsArray[n].rotate.cache(-30, -30, 120, 120);
			}
		}

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		var totalNum = score_arr.length + extraBall;
		for (var n = 0; n < totalNum; n++) {
			$.prize['bg' + n].alpha = 1;
			$.prize['bgselect' + n].alpha = 1;
			$.prize['text' + n].color = $.prize['score' + n].color = "#8d6d2c";
		}

		//gameData.revealArray = [12,25,10,3,5,15];

		itemBarUser.visible = false;
		buttonSphereStart.visible = true;
		buttonLucky.visible = true;
		cardContainer.visible = true;
		tableContainer.visible = false;

		gameData.paused = false;
		setRevealBalls();
		playSoundLoop('soundBalls');
		setSoundLoopVolume('soundBalls', 0.1);
		playSoundLoop('soundCage');
		setSoundLoopVolume('soundCage', 0.1);

		selectTitleTxt.text = textDisplay.selectTextDisplay.replace('[NUMBER]', score_arr.length);

		cardData.page = 1;
		toggleNumberCard(false);

		displayNumberCard();
	}

	/*!
	 *
	 * START SPIN - This is the function that runs to start spin
	 *
	 */
	function startSpin() {
		//memberpayment
		if (typeof memberData != 'undefined' && memberSettings.enableMembership && !memberData.ready) {
			return;
		}

		gameData.selectArray = [];

		for (var n = 0; n < gameSettings.totalBall; n++) {
			var targetNumber = gameData.buttonArray[n].bg;
			if (targetNumber.isSelected) {
				gameData.selectArray.push(n);
			}
		}

		if (gameData.selectArray.length == score_arr.length) {
			//memberpayment
			if (typeof memberData != 'undefined' && memberSettings.enableMembership && !memberData.ready) {
				return;
			}

			if (typeof memberData != 'undefined' && memberSettings.enableMembership) {
				if (!checkMemberGameType()) {
					goMemberPage('user');
					return;
				} else {
					playerData.chance--;
					getUserResult("proceedStartSpin", gameData.selectArray);
					//updateUserPoint("proceedStartSpin");
				}
			} else {
				proceedStartSpin();
			}
		}
	}

	function proceedStartSpin(result) {
		if (result != undefined) {
			gameData.revealArray = result.numbers;
		}

		playSound('soundStartSpin');
		itemBarUser.visible = true;
		buttonSphereStart.visible = false;
		buttonLucky.visible = false;
		cardContainer.visible = false;
		tableContainer.visible = true;

		selectTitleTxt.text = textDisplay.prizeTableDisplay;

		shuffle(gameData.numberArray);
		setSelectBalls();
		gameData.spin = true;

		if (gameData.revealArray.length == 0 && gameSettings.enablePercentage) {
			getResultOnPercent();
		}

		if (gameData.revealArray.length == 0) {
			var extraBall = gameSettings.bonusBall == true ? 1 : 0;
			for (var b = 0; b < score_arr.length + extraBall; b++) {
				gameData.revealArray.push(gameData.numberArray[b]);
			}
		}

		for (var n = 0; n < gameData.revealArray.length; n++) {
			var currentNumber = gameData.revealArray[n];

			for (var p = 0; p < gameData.ballNumber.length; p++) {
				if (currentNumber == gameData.ballNumber[p].number) {
					gameData.ballNumber[p].status = true;
				}
			}
		}

		TweenMax.to(radiusTweenData, gameSettings.spinStartSpeed, {
			radius: gameSettings.spinSpeed,
			overwrite: true,
			onComplete: beginWinNumberTimer
		});
		TweenMax.to(soundTweenData, gameSettings.spinStartSpeed, {
			volume: 1,
			overwrite: true,
			onUpdate: updateBallsVolume
		});
	}

	function updateBallsVolume() {
		setSoundLoopVolume('soundBalls', soundTweenData.volume);
		setSoundLoopVolume('soundCage', soundTweenData.volume);
	}

	/*!
	*
	* STOP GAME - This is the function that runs to stop play game
	*
	*/
	function stopGame() {
		stopSoundLoop('soundBalls');
		stopSoundLoop('soundCage');

		gameData.paused = true;
		gameData.spin = false;
		gameData.selectArray = [];
		gameData.winArray = [];
		gameData.revealArray = [];
		gameData.radius = 0;
		radiusTweenData.radius = 0;
		TweenMax.killAll();

		ballsSelectContainer.removeAllChildren();
		ballsRevealContainer.removeAllChildren();
	}

	/*!
	 *
	 * SAVE GAME - This is the function that runs to save game
	 *
	 */
	function saveGame(score) {
		if (typeof toggleScoreboardSave == 'function') {
			$.scoreData.score = score;
			if (typeof type != 'undefined') {
				$.scoreData.type = type;
			}
			toggleScoreboardSave(true);
		}

		/*$.ajax({
		  type: "POST",
		  url: 'saveResults.php',
		  data: {score:score},
		  success: function (result) {
			  console.log(result);
		  }
		});*/
	}

	/*!
	 *
	 * READY GAME - This is the function that runs to setup card and physics
	 *
	 */
	function readyGame() {
		var startX = 707;
		var startY = 260;
		var currentX = startX;
		var currentY = startY;
		var spaceX = 65;
		var spaceY = 55;
		var columnNum = 0;

		var countNum = 0;
		for (var n = 0; n < gameSettings.totalBall; n++) {
			gameData.totalBall.push(n);

			var newNumberBg = itemNumberBg.clone();
			var newNumberSelectBg = itemNumberSelectBg.clone();

			newNumberBg.x = currentX;
			newNumberBg.y = currentY;

			newNumberSelectBg.x = currentX;
			newNumberSelectBg.y = currentY;

			var newText = new createjs.Text();
			newText.font = "35px quantifybold";
			newText.color = "#000";
			newText.textAlign = "center";
			newText.textBaseline = 'alphabetic';
			if (gameSettings.numberStartZero) {
				newText.text = pad(n, 2);
			} else {
				newText.text = pad(n + 1, 2);
			}
			newText.x = currentX;
			newText.y = currentY + 11;

			newNumberBg.highlight = newNumberSelectBg;
			newNumberBg.text = newText;

			cardContainer.addChild(newNumberBg, newNumberSelectBg, newText);
			gameData.buttonArray.push({bg: newNumberBg, select: newNumberSelectBg, text: newText});

			newNumberBg.cursor = "pointer";
			newNumberBg.addEventListener("click", function (evt) {
				if (!gameData.spin) {
					playSound('soundNumber')
					toggleNumber(evt.target);
				}
			});

			currentX += spaceX;

			columnNum++;
			if (columnNum > 5) {
				columnNum = 0;
				currentX = startX;
				currentY += spaceY;
			}

			countNum++;
			if (countNum >= cardData.max) {
				countNum = 0;
				currentX = startX;
				currentY = startY;
			}

			gameData.numberArray.push(n);
		}

		var thisTotalBall = gameSettings.totalBall > optimizeData.balls ? optimizeData.balls : gameSettings.totalBall;
		for (var n = 0; n < thisTotalBall; n++) {
			gameData.indexArray.push(n);
			createBall(n);
		}

		itemBarBonus.visible = false;
		if (gameSettings.bonusBall) {
			itemBar.visible = false;
			itemBarBonus.visible = true;
		}

		cardData.maxPage = gameSettings.totalBall / cardData.max;
		if (String(cardData.maxPage).indexOf('.') > -1) {
			cardData.maxPage = Math.floor(cardData.maxPage) + 1;
		}

		createCages();
		createPhysics();
	}

	function toggleNumber(obj) {
		if (!obj.highlight.visible) {
			if (gameData.selectNum < score_arr.length) {
				obj.isSelected = true;

				if (obj.visible) {
					obj.highlight.visible = true;
					obj.text.color = "#fff";
				}
				gameData.selectNum++;
			}
		} else {
			obj.isSelected = false;

			if (obj.visible) {
				obj.highlight.visible = false;
				obj.text.color = "#000";
			}
			gameData.selectNum--;
		}
	}

	function toggleNumberCard(con) {
		if (con) {
			cardData.page++;
			cardData.page = cardData.page > cardData.maxPage ? cardData.maxPage : cardData.page;
		} else {
			cardData.page--;
			cardData.page = cardData.page < 1 ? 1 : cardData.page;
		}

		buttonLeft.visible = false;
		if (cardData.page > 1) {
			buttonLeft.visible = true;
		}

		buttonRight.visible = false;
		if (cardData.page != cardData.maxPage && cardData.maxPage > 1) {
			buttonRight.visible = true;
		}

		displayNumberCard();
	}

	function displayNumberCard() {
		var startNum = (cardData.page - 1) * cardData.max;
		var endNum = startNum + cardData.max;

		for (var n = 0; n < gameData.buttonArray.length; n++) {
			gameData.buttonArray[n].text.color = "#000";
			gameData.buttonArray[n].bg.visible = false;
			gameData.buttonArray[n].select.visible = false;
			gameData.buttonArray[n].text.visible = false;

			if (n >= startNum && n < endNum) {
				gameData.buttonArray[n].bg.visible = true;
				gameData.buttonArray[n].text.visible = true;

				if (gameData.buttonArray[n].bg.isSelected) {
					gameData.buttonArray[n].select.visible = true;
					gameData.buttonArray[n].text.color = "#fff";
				}
			}
		}
	}

	/*!
	 *
	 * RESET CARD - This is the function that runs to reset card
	 *
	 */
	function resetCard() {
		gameData.selectNum = 0;

		for (var n = 0; n < gameSettings.totalBall; n++) {
			var targetNumber = gameData.buttonArray[n].bg;
			targetNumber.isSelected = false;
			targetNumber.highlight.visible = false;
			targetNumber.text.color = "#000";
		}
	}

	/*!
	 *
	 * RANDOMIZE NUMBERS - This is the function that runs to randomize numbers
	 *
	 */
	function randomizeNumber() {
		resetCard();
		shuffle(gameData.numberArray);
		for (var n = 0; n < score_arr.length; n++) {
			toggleNumber(gameData.buttonArray[gameData.numberArray[n]].bg);
		}
	}

	/*!
	 *
	 * LOOP UPDATE GAME - This is the function that runs to update game loop
	 *
	 */

	function updateGame() {
		spinCage();
		updatePhysics();

		if (gameSettings.spinDirection) {
			gameData.radius -= radiusTweenData.radius;
			gameData.radius = gameData.radius < -360 ? 0 : gameData.radius;
		} else {
			gameData.radius += radiusTweenData.radius;
			gameData.radius = gameData.radius > 360 ? 0 : gameData.radius;
		}
		itemStick.rotation = itemShine.rotation = gameData.radius;
	}

	/*!
	 *
	 * CREATE BALL - This is the function that runs to create ball
	 *
	 */
	function createBall(number) {
		var newBallContainer = new createjs.Container();
		var newBall = itemBallBg.clone();
		newBall.x = 0;
		newBall.y = 0;
		newBall.regX = 30;
		newBall.regY = 30;

		var newBallShadow = itemBallShadow.clone();
		newBallShadow.x = 0;
		newBallShadow.y = 0;

		var ballNumber;
		if (gameSettings.numberStartZero) {
			ballNumber = pad(number, 2);
		} else {
			ballNumber = pad(number + 1, 2);
		}

		var space = 53;
		var newText = new createjs.Text();
		newText.font = "25px quantifybold";
		newText.color = "#000";
		newText.textAlign = "center";
		newText.textBaseline = 'alphabetic';
		newText.text = ballNumber;
		newText.x = 0;
		newText.y = 10;

		var newText2 = new createjs.Text();
		newText2.font = "25px quantifybold";
		newText2.color = "#000";
		newText2.textAlign = "center";
		newText2.textBaseline = 'alphabetic';
		newText2.text = ballNumber;
		newText2.x = space;
		newText2.y = 10;

		var newText3 = new createjs.Text();
		newText3.font = "25px quantifybold";
		newText3.color = "#000";
		newText3.textAlign = "center";
		newText3.textBaseline = 'alphabetic';
		newText3.text = ballNumber;
		newText3.x = 0;
		newText3.y = space + 10;

		var newText4 = new createjs.Text();
		newText4.font = "25px quantifybold";
		newText4.color = "#000";
		newText4.textAlign = "center";
		newText4.textBaseline = 'alphabetic';
		newText4.text = ballNumber;
		newText4.x = space;
		newText4.y = space + 10;

		var newBallInsideContainer = new createjs.Container();
		newBallInsideContainer.addChild(newBall, newText, newText2, newText3, newText4);

		var ballMask = new createjs.Shape();
		ballMask.graphics.beginFill('red').drawCircle(0, 0, 30);
		newBallInsideContainer.cache(-30, -30, 120, 120);
		newBallInsideContainer.mask = ballMask;

		ballData.scale = gameSettings.ballRadius / ballData.radius;
		newBallContainer.x = randomIntFromInterval(gameData.sphereX - 150, gameData.sphereX + 150);
		newBallContainer.y = gameData.sphereY;
		newBallContainer.addChild(newBallShadow, newBallInsideContainer);
		newBallContainer.scaleX = newBallContainer.scaleY = ballData.scale;

		ballsContainer.addChild(newBallContainer);
		gameData.ballsArray.push({
			obj: newBallContainer,
			rotate: newBallInsideContainer,
			text: [newText, newText2, newText3, newText4]
		});
	}

	function updateBallRotate(num, velX, velY, angle) {
		if (!gameSettings.rotateBall) {
			return;
		}

		var targetBall = gameData.ballsArray[num].obj;
		var targetRotateBall = gameData.ballsArray[num].rotate;

		targetRotateBall.x += velX;
		targetRotateBall.y += velY;

		var end = -53;
		targetRotateBall.x = targetRotateBall.x > 0 ? end : targetRotateBall.x;
		targetRotateBall.x = targetRotateBall.x < end ? 0 : targetRotateBall.x;

		targetRotateBall.y = targetRotateBall.y > 0 ? end : targetRotateBall.y;
		targetRotateBall.y = targetRotateBall.y < end ? 0 : targetRotateBall.y;
	}

	function createCages() {
		var totalNum = 35;
		var wheelRadius = 360 / totalNum;

		for (var n = 0; n < totalNum; n++) {
			var currentRadius = wheelRadius * n;
			var newPos = getAnglePositionByValue(gameData.sphereX, gameData.sphereY, gameData.cageRadius, currentRadius);
			var newHit = itemBallHit.clone();
			newHit.x = newPos.x;
			newHit.y = newPos.y;
			newHit.radius = currentRadius;

			gameData.cageArray.push(newHit);
		}
	}

	function spinCage() {
		for (var n = 0; n < gameData.cageArray.length; n++) {
			var targetHit = gameData.cageArray[n];
			var newPos = getAnglePositionByValue(gameData.sphereX, gameData.sphereY, gameData.cageRadius, targetHit.radius + gameData.radius);
			targetHit.x = newPos.x;
			targetHit.y = newPos.y;
		}
	}

	/*!
	 *
	 * WIN NUMBERS - This is the function that runs to reveal win numbers
	 *
	 */

	function beginWinNumberTimer() {
		TweenMax.to(ballsContainer, gameSettings.revealTimer, {overwrite: true, onComplete: revealWinNumber});
	}

	function revealWinNumber() {
		var tweenNum = gameData.revealArray[gameData.numberNum];
		var revealNum = gameData.revealArray[gameData.numberNum];

		var findBallClone = false;
		for (var p = 0; p < gameData.ballNumber.length; p++) {
			if (tweenNum == gameData.ballNumber[p].number) {
				findBallClone = true;
				tweenNum = gameData.ballNumber[p].index;
				p = gameData.ballNumber.length;
			}
		}

		if (!findBallClone) {
			for (var p = 0; p < gameData.ballNumber.length; p++) {
				if (!gameData.ballNumber[p].status) {
					gameData.ballNumber[p].status = true;
					tweenNum = gameData.ballNumber[p].index;
					p = gameData.ballNumber.length;
				}
			}
		}

		gameData.revealIndex = tweenNum;
		gameData.winArray.push(tweenNum);

		var targetBall = gameData.ballsArray[tweenNum].obj;
		var targetBallRotate = gameData.ballsArray[tweenNum].rotate;
		var currentNumber = gameData.revealArray[gameData.numberNum];
		if (gameSettings.numberStartZero) {
			currentNumber = pad(currentNumber, 2);
		} else {
			currentNumber = pad(currentNumber + 1, 2);
		}
		for (var p = 0; p < gameData.ballsArray[tweenNum].text.length; p++) {
			gameData.ballsArray[tweenNum].text[p].text = currentNumber;
			gameData.ballsArray[tweenNum].rotate.cache(-30, -30, 120, 120);
		}
		gameData.numberNum++;

		playSound('soundSuck');
		TweenMax.to(targetBallRotate, .5, {x: 0, y: 0, rotation: 0, overwrite: true});
		TweenMax.to(targetBall, .5, {
			x: gameData.sphereX,
			y: canvasH / 100 * 71,
			rotation: 0,
			scaleX: 1,
			scaleY: 1,
			overwrite: true,
			onComplete: function () {
				playSound('soundReveal');
				setRevealBalls();
				matchWinBalls(revealNum);

				TweenMax.to(targetBall, .2, {
					delay: 1,
					x: gameData.sphereX,
					y: canvasH / 100 * 80,
					rotation: 0,
					overwrite: true
				});
			}
		});

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		if (gameData.numberNum < score_arr.length + extraBall) {
			beginWinNumberTimer();
		} else {
			endGame();
		}
	}

	/*!
	 *
	 * REVEAL BALLS - This is the function that runs to reveal balls
	 *
	 */
	function setRevealBalls() {
		ballsRevealContainer.removeAllChildren();

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		var totalBalls = score_arr.length + extraBall;
		var totalSplit = Math.floor(totalBalls / 2);
		var spaceX = 65;
		var startX = itemBar.x - (spaceX * totalSplit);

		if (isEven(totalBalls)) {
			startX += spaceX / 2;
		}
		if (gameSettings.bonusBall) {
			startX -= spaceX / 5;
		}
		var startY = itemBar.y - 3;

		for (var n = 0; n < score_arr.length; n++) {
			if (n < gameData.winArray.length) {
				var currentBallRotate = gameData.ballsArray[gameData.winArray[n]].rotate;
				currentBallRotate.x = currentBallRotate.y = 0;
				var newGuessBall = gameData.ballsArray[gameData.winArray[n]].obj.clone(true);
				newGuessBall.x = startX;
				newGuessBall.y = startY;
			} else {
				var newGuessBall = itemBallGuess.clone();
				newGuessBall.x = startX;
				newGuessBall.y = startY;
			}

			ballsRevealContainer.addChild(newGuessBall);
			startX += spaceX;
		}

		if (gameSettings.bonusBall) {
			startX += spaceX / 3;

			if (gameData.winArray.length > score_arr.length) {
				var currentBallRotate = gameData.ballsArray[gameData.winArray[gameData.winArray.length - 1]].rotate;
				currentBallRotate.x = currentBallRotate.y = 0;
				var newGuessBall = gameData.ballsArray[gameData.winArray[gameData.winArray.length - 1]].obj.clone(true);
				newGuessBall.x = startX;
				newGuessBall.y = startY;
			} else {
				var newGuessBall = itemBallBonus.clone();
				newGuessBall.x = startX;
				newGuessBall.y = startY;
			}

			ballsRevealContainer.addChild(newGuessBall);
		}
	}

	/*!
	 *
	 * SELECT BALLS - This is the function that runs to select balls
	 *
	 */
	function setSelectBalls() {
		ballsSelectContainer.removeAllChildren();
		gameData.dimArray = []

		var totalSplit = Math.floor(score_arr.length / 2);
		var spaceX = 65;
		var startX = itemBarUser.x - (spaceX * totalSplit);
		if (isEven(score_arr.length)) {
			startX += spaceX / 2;
		}
		var startY = itemBarUser.y - 3;

		var storeNumber = gameData.ballsArray[0].text[0].text;

		for (var n = 0; n < gameData.selectArray.length; n++) {
			var currentBallRotate = gameData.ballsArray[0].rotate;
			currentBallRotate.x = currentBallRotate.y = 0;

			//set current number
			var currentNumber = gameData.selectArray[n];
			if (gameSettings.numberStartZero) {
				currentNumber = pad(currentNumber, 2);
			} else {
				currentNumber = pad(currentNumber + 1, 2);
			}
			for (var p = 0; p < gameData.ballsArray[n].text.length; p++) {
				gameData.ballsArray[0].text[p].text = currentNumber;
				gameData.ballsArray[0].rotate.cache(-30, -30, 120, 120);
			}

			var newGuessBall = gameData.ballsArray[0].obj.clone(true);
			newGuessBall.scaleX = newGuessBall.scaleY = 1;
			newGuessBall.x = startX;
			newGuessBall.y = startY;
			newGuessBall.rotation = 0;

			var newDimBall = itemBallDim.clone();
			newDimBall.x = startX;
			newDimBall.y = startY;
			newDimBall.active = true;
			newDimBall.selectNumber = gameData.selectArray[n];
			gameData.dimArray.push(newDimBall);

			startX += spaceX;
			ballsSelectContainer.addChild(newGuessBall, newDimBall);
		}

		//set back number
		for (var p = 0; p < gameData.ballsArray[n].text.length; p++) {
			gameData.ballsArray[0].text[p].text = storeNumber;
			gameData.ballsArray[0].rotate.cache(-30, -30, 120, 120);
		}
	}

	/*!
	 *
	 * MATCH PRIZE - This is the function that runs to match prize
	 *
	 */
	function matchWinBalls(number) {
		var oldMatch = gameData.matchNum;

		for (var n = 0; n < gameData.selectArray.length; n++) {
			//if(gameData.winArray.indexOf(gameData.selectArray[n]) != -1){
			if (gameData.dimArray[n].selectNumber == number) {
				if (gameData.dimArray[n].active) {
					gameData.matchNum++;
					gameData.dimArray[n].active = false;
					animateHighlight(gameData.dimArray[n]);
				}
			}
		}

		if (oldMatch == gameData.matchNum) {
			return;
		}

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		var totalMatchNum = score_arr.length + extraBall;
		totalMatchNum--;

		for (var n = 0; n < score_arr.length; n++) {
			if (gameData.matchNum == n) {
				var targetNum = totalMatchNum - n;
				if (gameSettings.bonusBall && gameData.matchNum == (score_arr.length - 1)) {
					if (gameData.winArray.length > score_arr.length) {
						//bonus
					} else {
						targetNum = 0;
					}
				}
				TweenMax.to($.prize['bg' + targetNum], 1, {
					overwrite: true,
					onComplete: animatePrize,
					onCompleteParams: [targetNum]
				});
			}
		}
	}

	function animatePrize(num) {
		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		for (var n = 0; n < score_arr.length + extraBall; n++) {
			$.prize['bg' + n].alpha = 1;
			$.prize['bgselect' + n].alpha = 1;
			$.prize['text' + n].color = $.prize['score' + n].color = "#8d6d2c";
		}

		playSound('soundWin');
		animateHighlight($.prize['bg' + num]);
		$.prize['text' + num].color = $.prize['score' + num].color = "#fff";
		playerData.score = $.prize['score' + num].score;
	}

	/*!
	 *
	 * ANIMATE HIGHLIGHT - This is the function that runs to animate highlight
	 *
	 */
	function animateHighlight(obj) {
		TweenMax.to(obj, .1, {
			alpha: .2, overwrite: true, onComplete: function () {
				TweenMax.to(obj, .1, {
					alpha: 1, overwrite: true, onComplete: function () {
						TweenMax.to(obj, .1, {
							alpha: .2, overwrite: true, onComplete: function () {
								TweenMax.to(obj, .1, {
									alpha: 1, overwrite: true, onComplete: function () {
										TweenMax.to(obj, .1, {
											alpha: 0, overwrite: true, onComplete: function () {

											}
										});
									}
								});
							}
						});
					}
				});
			}
		});
	}

	/*!
	 *
	 * END GAME - This is the function that runs to end game
	 *
	 */
	function endGame() {
		TweenMax.to(radiusTweenData, gameSettings.spinEndSpeed, {radius: 0, overwrite: true});
		TweenMax.to(soundTweenData, gameSettings.spinEndSpeed, {
			volume: .1,
			overwrite: true,
			onUpdate: updateBallsVolume
		});

		TweenMax.to(ballsContainer, 4, {
			overwrite: true, onComplete: function () {
				//memberpayment
				if (typeof memberData != 'undefined' && memberSettings.enableMembership) {
					var returnPoint = {chance: playerData.chance, point: memberData.point + playerData.score, score: 0};
					matchUserResult("proceedGoResult", returnPoint);
					//updateUserPoint("proceedGoResult");
				} else {
					goPage('result');
				}
			}
		});
	}

	function proceedGoResult() {
		goPage('result');
	}

	/*!
	 *
	 * PERCENTAGE - This is the function that runs to create result percentage
	 *
	 */
	function createPercentage() {
		gameData.percentageArray = [];

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		var totalNum = score_arr.length + extraBall;
		var totalBall = 0;
		var percent = 0;
		var isBonusBall = false;

		for (var n = 0; n < score_arr.length + extraBall; n++) {
			isBonusBall = false;

			if (gameSettings.bonusBall) {
				if (n == 0) {
					totalNum--;
					totalBall = totalNum;
					percent = score_arr[totalNum - 1].percent;
				} else if (n == 1) {
					totalBall = totalNum;
					percent = bonusScore[0].percent;
					totalNum++;
					isBonusBall = true;
				} else {
					totalBall = totalNum;
					percent = score_arr[totalNum - 1].percent;
				}
			} else {
				totalBall = totalNum;
				percent = score_arr[totalNum - 1].percent;
			}

			totalNum--;

			if (!isNaN(percent)) {
				if (percent > 0) {
					for (var p = 0; p < percent; p++) {
						gameData.percentageArray.push({total: totalBall, bonus: isBonusBall});
					}
				}
			}
		}

		for (var n = gameData.percentageArray.length; n < 100; n++) {
			gameData.percentageArray.push({total: 0, bonus: false});
		}
	}

	function getResultOnPercent() {
		shuffle(gameData.percentageArray);

		var selectArray = [];
		for (var n = 0; n < gameData.selectArray.length; n++) {
			selectArray.push(gameData.selectArray[n]);
		}

		shuffle(selectArray);

		var extraBall = gameSettings.bonusBall == true ? 1 : 0;
		var numberIndex = 0;
		for (var b = 0; b < score_arr.length; b++) {
			if (selectArray.indexOf(gameData.numberArray[numberIndex]) == -1) {
				gameData.revealArray.push(gameData.numberArray[numberIndex]);
			} else {
				b--;
			}
			numberIndex++;
		}

		var bonusNum = 0;
		if (gameData.percentageArray[0].total > 0) {
			for (var n = 0; n < gameData.percentageArray[0].total; n++) {
				gameData.revealArray[n] = selectArray[n];

				if (gameData.percentageArray[0].bonus && n == gameData.percentageArray[0].total - 1) {
					bonusNum = selectArray[n + 1];
				}
			}
			shuffle(gameData.revealArray);
		}

		if (extraBall) {
			if (gameData.percentageArray[0].bonus) {
				gameData.revealArray.push(bonusNum);
			} else {
				for (var b = 0; b < 1; b++) {
					if (selectArray.indexOf(gameData.numberArray[numberIndex]) == -1) {
						gameData.revealArray.push(gameData.numberArray[numberIndex]);
					} else {
						b--;
					}
					numberIndex++;
				}
			}
		}
	}

	/*!
	 *
	 * OPTIONS - This is the function that runs to toggle options
	 *
	 */

	function toggleOption() {
		if (optionsContainer.visible) {
			optionsContainer.visible = false;
		} else {
			optionsContainer.visible = true;
		}
	}

	/*!
	 *
	 * OPTIONS - This is the function that runs to mute and fullscreen
	 *
	 */
	function toggleSoundMute(con) {
		buttonSoundOff.visible = false;
		buttonSoundOn.visible = false;
		toggleSoundInMute(con);
		if (con) {
			buttonSoundOn.visible = true;
		} else {
			buttonSoundOff.visible = true;
		}
	}

	function toggleMusicMute(con) {
		buttonMusicOff.visible = false;
		buttonMusicOn.visible = false;
		toggleMusicInMute(con);
		if (con) {
			buttonMusicOn.visible = true;
		} else {
			buttonMusicOff.visible = true;
		}
	}

	function toggleFullScreen() {
		if (!document.fullscreenElement &&    // alternative standard method
			!document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
			if (document.documentElement.requestFullscreen) {
				document.documentElement.requestFullscreen();
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullscreen) {
				document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
			}
		} else {
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitExitFullscreen) {
				document.webkitExitFullscreen();
			}
		}
	}


	/*!
	 *
	 * SHARE - This is the function that runs to open share url
	 *
	 */
	function share(action) {
		gtag('event', 'click', {'event_category': 'share', 'event_label': action});

		var loc = location.href
		loc = loc.substring(0, loc.lastIndexOf("/") + 1);

		var title = shareTitle;
		var text = shareMessage;

		title = shareTitle.replace("[SCORE]", addCommas(playerData.score));
		text = shareMessage.replace("[SCORE]", addCommas(playerData.score));
		var shareurl = '';

		if (action == 'twitter') {
			shareurl = 'https://twitter.com/intent/tweet?url=' + loc + '&text=' + text;
		} else if (action == 'facebook') {
			shareurl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(loc + 'share.php?desc=' + text + '&title=' + title + '&url=' + loc + '&thumb=' + loc + 'share.jpg&width=590&height=300');
		} else if (action == 'google') {
			shareurl = 'https://plus.google.com/share?url=' + loc;
		} else if (action == 'whatsapp') {
			shareurl = "whatsapp://send?text=" + encodeURIComponent(text) + " - " + encodeURIComponent(loc);
		}

		window.open(shareurl);
	}


</script>
<script src="js/mobile.js"></script>
<script src="js/main.js"></script>
<script src="js/loader.js"></script>
<script src="js/init.js"></script>
</body>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y2EKNYZC5M"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}

	gtag('js', new Date());

	gtag('config', 'G-Y2EKNYZC5M');
</script>

</html>