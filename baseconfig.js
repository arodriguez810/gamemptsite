let lotery = {
  gameSettings: {
    ballRadius: 60, //ball radius
    totalBall: 36, //total balls
    rotateBall: true, //rotate balls in 3d angle
    numberStartZero: false, //number start from zero instead of one
    spinDirection: true, //true for anticlockwise
    spinStartSpeed: 5, //spin starting speed
    spinEndSpeed: 5, //spin ending speed
    spinSpeed: 10, //spin speed
    revealTimer: 2, //reveal ball timer
    bonusBall: false, //toggle bonus ball
    enablePercentage: false, //option to have result base on percentage
  },
  textDisplay: {
    selectTextDisplay: "Selecciona [NUMBER] Números", //select number text display
    prizeTableDisplay: "Premios", //score table text display
    numberTextDisplay: "Tus Números", //your score text display
    matchTextDisplay: "Acertar [NUMBER]", //match text display
    scoreTextDisplay: "[NUMBER] Pesos", //prize score text display
    bonusTextDisplay: "Acertar [NUMBER]", //match bonus text display
    exitMessage: "Está seguro\nQue quieres salir del juego?", //go to main page message
    resultCompleteText: "Ganaste [NUMBER] Pesos!", //result complete text display
    resultFailText: "No ganaste\"T nada!",  //result fail text display
  },
  score_arr: [
    {prize: 50, percent: 25},
    {prize: 100, percent: 20},
    {prize: 500, percent: 15},
    {prize: 1000, percent: 10},
    {prize: 10000, percent: 5},
    {prize: 100000, percent: 1}
  ],
  bonusScore: [
    {prize: 50000, percent: 3}
  ],
  shareText: "Retirar Angel",
  shareTitle: "Highscore on Lottery Numbers Game is [SCORE]PTS.",
  shareMessage: "[SCORE]PTS is mine new highscore on Lottery Numbers Game! Try it now!",
  playerData: {score: 0},
  gameData: {
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
  },
  radiusTweenData: {radius: 0},
  soundTweenData: {volume: 0},
  optimizeData: {balls: 40},
  cardData: {max: 36, page: 1, maxPage: 0},
  ballData: {radius: 60, scale: 1}
};
let raspadita = {
  cardsSettings: [
    {
      assets: {
        landscape: {
          background: 'assets/card_bg_landscape.png',
          logo: 'assets/card_logo_landscape_1.png',
          scratch: 'assets/card_scratch_landscape_1.png',
        },
        portrait: {
          background: 'assets/card_bg_portrait.png',
          logo: 'assets/card_logo_portrait_1.png',
          scratch: 'assets/card_scratch_portrait_1.png',
        },
      },
      matchedItems: 0,
      numbers: [],
      bonusMax: 0,
      overallPercent: 100,
      price: {
        value: 1,
        x: 25,
        y: 50
      },
      items: [
        {
          x: 275,
          y: 230,
          width: 160,
          height: 25,
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
          x: 400,
          y: 75,
          width: 70,
          height: 25,
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
          type: 'bonus'
        }
      ],
      prizes: [
        {
          value: 0,
          text: {
            display: 'TRY AGAIN',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 30,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 30,
        },
        {
          value: 5,
          text: {
            display: '$5',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 20,
        },
        {
          value: 10,
          text: {
            display: '$10',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 10,
          text: {
            display: '$10',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1000,
          text: {
            display: '$1,000',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
      ],
      bonus: [
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_01.png',
          percent: 30,
        },
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_02.png',
          percent: 30,
        },
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 10,
        },
        {
          value: 2,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x2_01.png',
          percent: 10,
        },
        {
          value: 5,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x5_01.png',
          percent: 10,
        },
        {
          value: 10,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x10_01.png',
          percent: 10,
        },
      ],
      symbols: []
    },
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
          value: 1,
          text: {
            display: '$1',
            fontSize: 32,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 20,
        },
        {
          value: 5,
          text: {
            display: '$5',
            fontSize: 32,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 10,
          text: {
            display: '$10',
            fontSize: 32,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 100,
          text: {
            display: '$100',
            fontSize: 25,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 500,
          text: {
            display: '$500',
            fontSize: 25,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 1000,
          text: {
            display: '$1,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 2500,
          text: {
            display: '$2,500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 5000,
          text: {
            display: '$5,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
      ],
      bonus: [],
      symbols: []
    },
    {
      assets: {
        landscape: {
          background: 'assets/card_bg_landscape.png',
          logo: 'assets/card_logo_landscape_3.png',
          scratch: 'assets/card_scratch_landscape_3.png',
        },
        portrait: {
          background: 'assets/card_bg_portrait.png',
          logo: 'assets/card_logo_portrait_3.png',
          scratch: 'assets/card_scratch_portrait_3.png',
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
          x: 163,
          y: 200,
          width: 18,
          height: 18,
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
          x: 275,
          y: 200,
          width: 18,
          height: 18,
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
          x: 386,
          y: 200,
          width: 18,
          height: 18,
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
          x: 163,
          y: 286,
          width: 18,
          height: 18,
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
          x: 275,
          y: 286,
          width: 18,
          height: 18,
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
          x: 386,
          y: 286,
          width: 18,
          height: 18,
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
          x: 163,
          y: 370,
          width: 18,
          height: 18,
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
          x: 275,
          y: 370,
          width: 18,
          height: 18,
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
          x: 386,
          y: 370,
          width: 18,
          height: 18,
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
          x: 275,
          y: 82,
          width: 65,
          height: 10,
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
          type: 'display'
        },

      ],
      prizes: [
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 100,
          text: {
            display: '$100',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 500,
          text: {
            display: '$500',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1000,
          text: {
            display: '$1,000',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 2500,
          text: {
            display: '$2,500',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 5000,
          text: {
            display: '$5,000',
            fontSize: 40,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
      ],
      bonus: [],
      symbols: [
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_01.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_02.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_04.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_05.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_06.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_07.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_08.png',
        },
        {
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_09.png',
        },
      ]
    },
    {
      assets: {
        landscape: {
          background: 'assets/card_bg_landscape.png',
          logo: 'assets/card_logo_landscape_4.png',
          scratch: 'assets/card_scratch_landscape_4.png',
        },
        portrait: {
          background: 'assets/card_bg_portrait.png',
          logo: 'assets/card_logo_portrait_4.png',
          scratch: 'assets/card_scratch_portrait_4.png',
        },
      },
      matchedItems: 0,
      numbers: [1, 99],
      bonusMax: 0,
      overallPercent: 200,
      price: {
        value: 7,
        x: 25,
        y: 50
      },
      items: [
        {
          x: 88,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 180,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 273,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 364,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 458,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 88,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 180,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 273,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 364,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 458,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'prize'
        },
        {
          x: 100,
          y: 374,
          width: 50,
          height: 20,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'bonus'
        },
        {
          x: 450,
          y: 374,
          width: 50,
          height: 20,
          image: {
            offsetX: 0,
            offsetY: 0,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 0,
            color: '#2E303A',
          },
          type: 'bonus'
        },
        {
          x: 192,
          y: 80,
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
          type: 'number'
        },
        {
          x: 250,
          y: 80,
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
          type: 'number'
        },
        {
          x: 307,
          y: 80,
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
          type: 'number'
        },
        {
          x: 362,
          y: 80,
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
          type: 'number'
        },
      ],
      prizes: [
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 5,
          text: {
            display: '$5',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 10,
          text: {
            display: '$10',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 250,
          text: {
            display: '$250',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 300,
          text: {
            display: '$300',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 500,
          text: {
            display: '$500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 1000,
          text: {
            display: '$1,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 2500,
          text: {
            display: '$2,500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 7000,
          text: {
            display: '$7,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
      ],
      bonus: [
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_01.png',
          percent: 50,
        },
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_02.png',
          percent: 30,
        },
        {
          value: 0,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 30,
        },
        {
          value: 2,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x2_01.png',
          percent: 10,
        },
        {
          value: 5,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x5_01.png',
          percent: 10,
        },
        {
          value: 10,
          text: {
            display: '',
            fontSize: 50,
            lineHeight: 10,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x10_01.png',
          percent: 10,
        },
      ],
      symbols: []
    },
    {
      assets: {
        landscape: {
          background: 'assets/card_bg_landscape.png',
          logo: 'assets/card_logo_landscape_5.png',
          scratch: 'assets/card_scratch_landscape_5.png',
        },
        portrait: {
          background: 'assets/card_bg_portrait.png',
          logo: 'assets/card_logo_portrait_5.png',
          scratch: 'assets/card_scratch_portrait_5.png',
        },
      },
      matchedItems: 0,
      numbers: [1, 99],
      bonusMax: 2,
      overallPercent: 1000,
      price: {
        value: 10,
        x: 25,
        y: 50
      },
      items: [
        {
          x: 88,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 180,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 273,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 364,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 458,
          y: 194,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 88,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 180,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 273,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 364,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 458,
          y: 270,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 88,
          y: 350,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 180,
          y: 350,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 273,
          y: 350,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 364,
          y: 350,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 458,
          y: 350,
          width: 25,
          height: 16,
          image: {
            offsetX: 0,
            offsetY: -15,
          },
          prize: {
            offsetX: 0,
            offsetY: 15,
          },
          number: {
            offsetX: 0,
            offsetY: -12,
            fontSize: 30,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'prize,bonus'
        },
        {
          x: 98,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 147,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 200,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 250,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 300,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 356,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 409,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
        {
          x: 460,
          y: 80,
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
            fontSize: 25,
            lineHeight: 10,
            color: '#2E303A',
          },
          type: 'number'
        },
      ],
      prizes: [
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 1,
          text: {
            display: '$1',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 10,
        },
        {
          value: 3,
          text: {
            display: '$3',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 5,
          text: {
            display: '$5',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 7,
          text: {
            display: '$7',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 10,
          text: {
            display: '$10',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 20,
          text: {
            display: '$20',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 30,
          text: {
            display: '$30',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 250,
          text: {
            display: '$250',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 300,
          text: {
            display: '$300',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 5,
        },
        {
          value: 500,
          text: {
            display: '$500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 1000,
          text: {
            display: '$1,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 2500,
          text: {
            display: '$2,500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 7000,
          text: {
            display: '$5,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 2,
        },
        {
          value: 10000,
          text: {
            display: '$10,000',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: '',
          percent: 1,
        },
      ],
      bonus: [
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 20,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 20,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 20,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_03.png',
          percent: 20,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_04.png',
          percent: 20,
        },
        {
          value: 0,
          text: {
            display: 'NO PRIZE',
            fontSize: 15,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_05.png',
          percent: 20,
        },
        {
          value: 2,
          text: {
            display: '$1',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x2.png',
          percent: 20,
        },
        {
          value: 10,
          text: {
            display: '$5',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x2.png',
          percent: 20,
        },
        {
          value: 5,
          text: {
            display: '$1',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x5.png',
          percent: 10,
        },
        {
          value: 50,
          text: {
            display: '$10',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x5.png',
          percent: 10,
        },
        {
          value: 50,
          text: {
            display: '$5',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x10.png',
          percent: 10,
        },
        {
          value: 1000,
          text: {
            display: '$10',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/multiply_x10.png',
          percent: 10,
        },
        {
          value: 100,
          text: {
            display: '$100',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_10.png',
          percent: 5,
        },
        {
          value: 200,
          text: {
            display: '$200',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_10.png',
          percent: 5,
        },
        {
          value: 500,
          text: {
            display: '$500',
            fontSize: 20,
            lineHeight: 0,
            color: '#2E303A',
          },
          image: 'assets/prizes/icon_10.png',
          percent: 5,
        },
      ],
      symbols: []
    }
  ],
  gameSettings: {
    score: {
      x: 100,
      y: 0
    },
    credit: 100,
    scratchStrokeNum: [20, 30],
    revealScratchStrokeNum: [25, 35],
    revealSpeed: .1,
    revealCurviness: 2,
    winColorFilter: [140, 35, 0],
    enablePercentage: true,
  },
  textDisplay: {
    price: "$[NUMBER]",
    buy: 'Jugar $[NUMBER]',
    buyAgain: 'Usar $[NUMBER]',
    scratch: 'Raspa tu carta...',
    noCredit: 'Ya no te quedan créditos...',
    won: '+$[NUMBER]',
    exitTitle: "Salir",
    exitMessage: 'Está seguro/a \nque deseas\nsalir del juego?',
    resultTitle: "Ganaste un total de",
    share: 'Retirar Ganancias',
    resultDesc: '$[NUMBER]'
  },
  shareTitle: 'Highscore on Scratch & Win is $[SCORE]',
  shareMessage: '$[SCORE] is mine new highscore on Scratch & Win game! Try it now!'
};
let thefruits = {
  "win_occurrence": 90,
  "slot_cash": 10,
  "min_reel_loop": 0,
  "reel_delay": 6,
  "time_show_win": 2000,
  "time_show_all_wins": 2000,
  "audio_enable_on_startup": false,
  "fullscreen": false,
  "check_orientation": true,
  "show_credits": false,
  "ad_show_counter": 3
};
