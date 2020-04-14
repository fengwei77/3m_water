<?php
/*
  ＊＊ 備註 ＊＊
  結果的排列組合: index.js:131
  表單: modal-form.php
  中獎名單: modal-winners.php
  活動辦法: modal-terms.php
*/
$site_link = 'https://'; // 台酒官網
$fb_link = "https://www.3mwater.com.tw/share_0.html"; // fb 連結
$fb_title = '3M科技改善生活，啟動X密碼';
$fb_desc = '3M科技改善生活，啟動X密碼';
$url_params = $_SERVER['QUERY_STRING'];
$result_param = '';
if ($url_params) {
    $result_param = explode('=', $url_params);
}
setcookie('cross-site-cookie', 'name', ['samesite' => 'lax', 'secure' => true]);
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
?>
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
    <link href="assets/css/inner.css" rel="stylesheet">
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
<div class="wrap globalbg lihsi-desktop">
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
    <section>
        <img src="assets/images/index_start_bg.png" class="surfaceImgfull refrommiddle">
        <div class="index_slogan">
            <img src="assets/images/index_slogan.png" class="Imgfull smoothde">
            <span class="extra refrombottomde">立即刻啟動X密碼，和X 3Men一起對抗日常飲水中的有害物質！</span>
            <div class="gobtn refromtopdex">
                <a href="game.php" class="hvr-grow"><img src="assets/images/index_start_btn.png" class="Imgfull"></a>
            </div>
        </div>
    </section>
    <!--line pop start-->
    <div class="line-pop">
        <div class="close-btn">
            <a href="javascript:void(0);" onclick="closeMask('line-pop','');"><img src="assets/images/game_pop_close_2.png"></a>
        </div>
        <img src="assets/images/line.png" class="Imgfull">
    </div>
    <!--line pop end-->
</div>
<!--桌機版 end-->

<!--手機版 start-->
<div class="wrap globalbg-mobile lihsi-mobile">
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
    <section>
        <img src="assets/images/index_start_bg_m.png" class="surfaceImgfull refrommiddle">
        <div class="index_slogan">
            <img src="assets/images/index_slogan.png" class="Imgfull smoothde">
            <span class="extra refrombottomde">立即刻啟動X密碼，和X 3Men一起對抗日常飲水中的有害物質！</span>
            <div class="gobtn refromtopdex">
                <a href="game.php" class="hvr-grow"><img src="assets/images/index_start_btn.png" class="Imgfull"></a>
            </div>
        </div>
    </section>
    <!--line pop start-->
    <div class="line-pop">
        <div class="close-btn">
            <a href="javascript:void(0);" onclick="closeMask('line-pop','');"><img src="assets/images/game_pop_close_2.png"></a>
        </div>
        <img src="assets/images/line_m.png" class="Imgfull">
    </div>
    <!--line pop end-->
</div>
<!--手機版 end-->

<!--footer start-->

<?php include 'footer.php';?>
</body>
</html>
