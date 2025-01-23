<!DOCTYPE html>
<html>
<head>
    <title>Laravel Greeting</title>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <script src="https://unpkg.com/splitting/dist/splitting.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *::selection {
            background: #fd5d8d;
            color: #270245;
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        body {
            position: relative;
            background: #000;
            overflow: hidden;
        }

        body:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, rgba(0,0,0,0) 0%, rgba(0,0,0,.4) 100%);
            z-index: 500;
            mix-blend-mode: overlay;
            pointer-events: none;
        }

        .noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: 400;
            opacity: .8;
            pointer-events: none;
        }

        .noise:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://ice-creme.de/images/background-noise.png');
            pointer-events: none;
        }

        .noise-moving {
            opacity: 1;
            z-index: 450;
        }

        .noise-moving:before {
            will-change: background-position;
            animation: noise 1s infinite alternate;
        }

        .scanlines {
            position: fixed;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 300;
            opacity: .6;
            will-change: opacity;
            animation: opacity 3s linear infinite;
        }

        .scanlines:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, .5) 51%);
            background-size: 100% 4px;
            will-change: background, background-size;
            animation: scanlines .2s linear infinite;
        }

        .intro-wrap {
            position: fixed;
            top: 0;
            left: 0;
            font-family: 'Press Start 2P', cursive;
            color: #fff;
            font-size: 2rem;
            width: 100vw;
            height: 100vh;
            background: #2b52ff;
        }

        .intro-wrap .noise:before {
            background-size: 200%;
        }

        .intro-wrap .play {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            will-change: text-shadow;
            animation: rgbText 2s steps(9) 0s infinite alternate;
            text-align: center;
            font-size: 3rem;
        }

        .intro-wrap .play .char {
            will-change: opacity;
            animation: type 1.2s infinite alternate;
            animation-delay: calc(60ms * var(--char-index));
        }

        .intro-wrap .time {
            position: absolute;
            right: 2rem;
            top: 2rem;
            will-change: text-shadow;
            animation: rgbText 1s steps(9) 0s infinite alternate;
            font-size: 1.5rem;
        }

        .intro-wrap .recordSpeed {
            position: absolute;
            left: 2rem;
            bottom: 2rem;
            will-change: text-shadow;
            animation: rgbText 1s steps(9) 0s infinite alternate;
            font-size: 1.5rem;
        }

        @keyframes noise {
            0%, 100% {background-position: 0 0;}
            10% {background-position: -5% -10%;}
            20% {background-position: -15% 5%;}
            30% {background-position: 7% -25%;}
            40% {background-position: 20% 25%;}
            50% {background-position: -25% 10%;}
            60% {background-position: 15% 5%;}
            70% {background-position: 0 15%;}
            80% {background-position: 25% 35%;}
            90% {background-position: -10% 10%;}
        }

        @keyframes opacity {
            0% {opacity: .6;}
            20% {opacity:.3;}
            35% {opacity:.5;}
            50% {opacity:.8;}
            60% {opacity:.4;}
            80% {opacity:.7;}
            100% {opacity:.6;}
        }

        @keyframes scanlines {
            from {
                background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, .5) 51%);
                background-size: 100% 4px;
            }
            to {
                background: linear-gradient(to bottom, rgba(0, 0, 0, .5) 50%, transparent 51%);
                background-size: 100% 4px;
            }
        }

        @keyframes rgbText {
            0% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), 0px 0 1px rgba(251, 0, 231, 0.8), 0 0px 3px rgba(0, 233, 235, 0.8), 0px 0 3px rgba(0, 242, 14, 0.8), 0 0px 3px rgba(244, 45, 0, 0.8), 0px 0 3px rgba(59, 0, 226, 0.8);
            }
            25% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), 0px 0 1px rgba(251, 0, 231, 0.8), 0 0px 3px rgba(0, 233, 235, 0.8), 0px 0 3px rgba(0, 242, 14, 0.8), 0 0px 3px rgba(244, 45, 0, 0.8), 0px 0 3px rgba(59, 0, 226, 0.8);
            }
            45% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), 5px 0 1px rgba(251, 0, 231, 0.8), 0 5px 1px rgba(0, 233, 235, 0.8), -5px 0 1px rgba(0, 242, 14, 0.8), 0 -5px 1px rgba(244, 45, 0, 0.8), 5px 0 1px rgba(59, 0, 226, 0.8);
            }
            50% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), -5px 0 1px rgba(251, 0, 231, 0.8), 0 -5px 1px rgba(0, 233, 235, 0.8), 5px 0 1px rgba(0, 242, 14, 0.8), 0 5px 1px rgba(244, 45, 0, 0.8), -5px 0 1px rgba(59, 0, 226, 0.8);
            }
            55% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), 0px 0 3px rgba(251, 0, 231, 0.8), 0 0px 3px rgba(0, 233, 235, 0.8), 0px 0 3px rgba(0, 242, 14, 0.8), 0 0px 3px rgba(244, 45, 0, 0.8), 0px 0 3px rgba(59, 0, 226, 0.8);
            }
            90% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), -5px 0 1px rgba(251, 0, 231, 0.8), 0 5px 1px rgba(0, 233, 235, 0.8), 5px 0 1px rgba(0, 242, 14, 0.8), 0 -5px 1px rgba(244, 45, 0, 0.8), 5px 0 1px rgba(59, 0, 226, 0.8);
            }
            100% {
                text-shadow: -1px 1px 8px rgba(255, 255, 255, 0.6), 1px -1px 8px rgba(255, 255, 235, 0.7), 5px 0 1px rgba(251, 0, 231, 0.8), 0 -5px 1px rgba(0, 233, 235, 0.8), -5px 0 1px rgba(0, 242, 14, 0.8), 0 5px 1px rgba(244, 45, 0, 0.8), -5px 0 1px rgba(59, 0, 226, 0.8);
            }
        }

        @keyframes type {
            0%, 19% {opacity:0;}
            20%, 100% {opacity:1;}
        }
    </style>
</head>
<body>
    <div class="scanlines"></div>

    <div class="intro-wrap">
        <div class="noise"></div>
        <div class="noise noise-moving"></div>

        <div class="play" data-splitting>WELCOME TO LARAVEL</div>
        <div class="time">HELLO</div>
        <div class="recordSpeed">ENJOY YOUR STAY</div>
    </div>

    <script>
        console.clear();
        Splitting();
    </script>
</body>
</html>