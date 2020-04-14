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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="node_modules/font-awesome-animation/dist/font-awesome-animation.css" rel="stylesheet">
    <link href="node_modules/jquery-confirm/dist/jquery-confirm.min.css" rel="stylesheet">
</head>
<?php include 'game_setting.php';?>

<body>
<div id="test-width" style="position: absolute; top: 100px; left: 10px; color: rgba(255, 255, 255, 0.5); z-index: 99;"></div>
<!--桌機版 start-->
<div class="wrap fullheight lihsi-desktop">
    <!--header start-->
    <header>
        <div class="logo"><a href="index.php"><img src="assets/images/logo.png"></a></div>
        <nav>
            <ul>
                <?php include 'menu.php';?>
            </ul>
        </nav>
    </header>
    <!--header end-->
    <!--game result start-->
    <div class="game-result">
        <img src="assets/images/game_result_bg.png" class="result-bg">
        <div class="game-result-people"><img src="assets/images/game_result_people_1.png" class="Imgfull"></div>
        <div class="game-result-product"><img src="assets/images/game_result_product_1.png" class="Imgfull"></div>
        <div class="game-result-emotion"><img src="assets/images/game_result_emotion_1.png" class="Imgfull"></div>
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a href="javascript:void(0);">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->
</div>
<!--桌機版 end-->
<!--手機版 start-->
<div class="wrap fullheight lihsi-mobile">
    <!--header start-->
    <header>
        <div class="logo"><a href="index.php"><img src="assets/images/logo.png"></a></div>
        <div class="switch"><span class="ti-menu"></span></div>

        <nav>
            <ul>
                <?php include 'menu.php';?>
            </ul>
        </nav>
    </header>
    <!--header end-->
    <!--game result start-->
    <div class="game-result">
        <img src="assets/images/game_result_bg_pass_1_m.png" class="Imgfull">
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a href="javascript:void(0);">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->
</div>
<!--手機版 end-->
<!--footer start-->
<footer>
    Copyright © 3M台灣 版權所有 ｜3M台灣官網  <a href="https://www.3m.com.tw" target="_blank">https://www.3m.com.tw</a>
</footer>
<!--footer end-->

<?php include 'footer.php';?>
</body>
</html>