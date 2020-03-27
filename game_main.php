<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
		<title>3M台灣 | 啟動X密碼</title>
		<meta name="description" content="3M科技改善生活，啟動X密碼">
		<meta name="keywords" content="">
		<link rel="shortcut icon" href="assets/img/favicon.ico">
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" media="all">
		<!-- Style css -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/game.css" rel="stylesheet">
		<!-- owl.carousel Slider Main Style Sheet -->
		<link href="assets/css/owl.carousel.css" rel="stylesheet" media="all">
		<link href="assets/css/owl.theme.default.css" rel="stylesheet" media="all">
		<!-- Hover animation Main Style Sheet -->
		<link href="assets/css/hover.css" rel="stylesheet" media="all">
		<!-- themify-icons -->
		<link href="assets/css/themify-icons.css" rel="stylesheet">
		<!-- Magnific-Popup-master(lightbox) -->
		<link href="assets/css/magnific-popup.css" rel="stylesheet">
		<!-- jquery.scrollbar -->
		<link href="assets/css/jquery.scrollbar.css" rel="stylesheet">
	</head>

    <style>

        #log{
            position: absolute;
            right: 15%;
            top: 5%;
            padding: 10px;
            display: block;
            background: black;
            opacity: 0.85;
            color: yellow;
            width: 30%;
            max-width: 300px;
            min-width: 200px;
            height: auto;
            min-height: 20px;
            z-index: 9999;
        }
        #gameContainer{
            text-align: center;
            z-index: 1;
            position: relative;
            background-color: #005d7e;
        }

    </style>
	<body>
		<div id="test-width" style="position: absolute; top: 100px; left: 10px; color: rgba(255, 255, 255, 0.5); z-index: 99;"></div>
		<!--桌機版 start-->
		<div class="wrap">
			<!--header start-->
			<header>
				<div class="logo"><a href="index.php"><img src="assets/images/logo.png"></a></div>
				<nav>
					<ul>
						<li><a href="game.php">啟動X密碼</a></li>
						<li><a href="product.php">極淨倍智系列產品介紹</a></li>
						<li><a href="method.php">活動辦法</a></li>
					</ul>
				</nav>
			</header>
			<!--header end-->
			
			<!--game main start-->


            <div class="game-main">
            <div id="log">info:<div id="logs">開始</div></div>

            <div id="gameContainer">
                <!--  遊戲內容-->
            </div>
			</div>
			<!--game main end-->
		</div>
		<!--桌機版 end-->
		<!--footer start-->
		<footer>
			Copyright © 3M台灣 版權所有 ｜3M台灣官網  <a href="https://www.3m.com.tw" target="_blank">https://www.3m.com.tw</a>
		</footer>
		<!--footer end-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery-1.12.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.js"></script>
		<!-- Include owl.carousel.js -->
		<script src="assets/js/owl.carousel.js"></script>
		<!-- jquery.easing -->
		<script src="assets/js/jquery.easing.1.3.js"></script>
		<!-- customize JS File -->
		<script src="assets/js/lihsi.js"></script>
		<!-- viewportchecker JS File -->
		<script src="assets/js/jquery.viewportchecker.min.js"></script>
		<!-- Magnific-Popup-master(lightbox) -->
		<script src="assets/js/jquery.magnific-popup.js"></script>
		<!-- jquery.scrollbar -->
		<script src="assets/js/jquery.scrollbar.js"></script>
		<!-- scrollreveal JS File -->
		<script src="assets/js/scrollreveal.min.js"></script>
		<!-- scrollreveal JS File -->
		<script src="assets/js/scrollreveal-by-lihsi.js"></script>
        <!-- game js -->
        <script src="js/vendor/modernizr-3.8.0.min.js"></script>
        <script src="node_modules/mobile-detect/mobile-detect.min.js"></script>
        <script src="node_modules/eventemitter3-timer/dist/eventemitter3-timer.min.js"></script>
        <script src="node_modules/pixi.js/dist/pixi.min.js"></script>
        <script src="node_modules/pixi-sound/dist/pixi-sound.js"></script>
        <script src="node_modules/gsap/dist/gsap.min.js"></script>
        <script src="node_modules/gsap/dist/TextPlugin.min.js"></script>
        <script src="node_modules/gsap/dist/MotionPathPlugin.min.js"></script>
        <script src="node_modules/gsap/dist/EaselPlugin.min.js"></script>
        <script src="node_modules/gsap/dist/PixiPlugin.min.js"></script>
        <script src="node_modules/pixi-viewport/dist/viewport.js"></script>
        <script type="module" src="js/game_script.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){

		});
		</script>
    </body>
</html>