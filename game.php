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
<div class="wrap fullheight globalbg lihsi-desktop">
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
    <!--game cut-1 start-->
    <div class="game-mask refrommiddle">
        <div class="game-pop foo">
            <div class="close-btn">
                <!--<a href="javascript:void(0);" onclick="closeMask('game-mask','');"><img src="assets/images/game_pop_close.png"></a>-->
                <a href="game_choice.php"><img src="assets/images/game_pop_close.png"></a>
            </div>
            <div class="detail">立即選擇最適合你的<span class="highlight">X 3MEN</span>一起啟動X密碼吧！</div>
        </div>
    </div>
    <!--game cut-1 end-->

    <!--game cut-2 start-->
    <!--game cut-2 end-->
</div>
<!--桌機版 end-->
<!--手機版 start-->
<div class="wrap fullheight globalbg lihsi-mobile">
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
    <!--game cut-1 start-->
    <div class="game-mask refrommiddle">
        <div class="game-pop foo">
            <div class="close-btn">
                <!--<a href="javascript:void(0);" onclick="closeMask('game-mask','');"><img src="assets/images/game_pop_close.png"></a>-->
                <a href="game_choice.php"><img src="assets/images/game_pop_close.png"></a>
            </div>
            <div class="detail">立即選擇最適合你的<span class="highlight">X 3MEN</span><br class="lihsi-mobile">一起啟動X密碼吧！</div>
        </div>
    </div>
    <!--game cut-1 end-->

    <!--game cut-2 start-->
    <!--game cut-2 end-->
</div>
<!--手機版 end-->
<!--footer start-->

<?php include 'footer.php';?>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script>
    var has_login = false;
    function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response);                   // The current login status of the person.
        if (response.status === 'connected') {   // Logged into your webpage and Facebook.
            has_login = true;
        }else{
            location.href = 'index.php';
        }
    }


    function checkLoginState() {               // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) {   // See the onlogin handler
            statusChangeCallback(response);
        });
    }
    //FB
    let fb_name = '';
    let fb_id = ''
    let fb_email = '-';
    window.fbAsyncInit = function () {
        FB.init({
            appId: '2831458826964843',
            cookie: true,
            xfbml: true,
            version: 'v6.0'
        });

        FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
            statusChangeCallback(response);        // Returns the login status.
        });
    };
    // window.addEventListener("wheel", event => console.info(event.deltaY));

    (function (d, s, id) {                      // Load the SDK asynchronously
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/zh_TW/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


</script>
</body>
</html>