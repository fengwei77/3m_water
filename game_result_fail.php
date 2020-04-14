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
</head>
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
        <div class="game-result-emotion"><img src="assets/images/game_result_emotion_2.png" class="Imgfull"></div>
        <div class="game-result-detail fail">
            失敗了沒關係，有X Men挺你，再挑戰一次！
            <div class="game-result-extra">
                <a href="game.php">重新挑戰</a>
            </div>
            <div class="game-result-share">
                和X 3Men一起重新挑戰一次吧！
            </div>
        </div>
    </div>
    <!--game result end-->
</div>
<!--桌機版 end-->
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
        <img src="assets/images/game_result_bg_fail_1_m.png" class="Imgfull">
        <div class="game-result-detail fail">
            失敗了沒關係，有X Men挺你，再挑戰一次！
            <div class="game-result-extra">
                <a href="game.php">重新挑戰</a>
            </div>
            <div class="game-result-share">
                和X 3Men一起重新挑戰一次吧！
            </div>
        </div>
    </div>
    <!--game result end-->
</div>
<!--手機版 end-->

<?php include 'footer.php';?>
</body>
</html>