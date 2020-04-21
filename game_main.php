<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>3M台灣 | 啟動X密碼</title>
    <meta name="description" content="3M科技改善生活，啟動X密碼">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" media="all">
    <link href="js/process/loading-bar.min.css" rel="stylesheet" media="all">

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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="node_modules/font-awesome-animation/dist/font-awesome-animation.css" rel="stylesheet">
    <link href="node_modules/jquery-confirm/dist/jquery-confirm.min.css" rel="stylesheet">

</head>
<?php include 'game_setting.php'; ?>
<?php
$date = new DateTime();
$_SESSION['g_start'] = $date->getTimestamp();

?>
<style>

    #log {
        display: none;
        position: absolute;
        right: 15%;
        top: 5%;
        padding: 10px;
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

    #gameContainer {
        text-align: center;
        z-index: 1;
        position: relative;
        background-color: #005d7e;
        background-image: url("images/game_bg.png");
    }

    #loadingPage {
        min-width: 100%;
        min-height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 1;
        background-color: rgba(38, 78, 105, 1);
        color: #fff;
        text-align: center;
        vertical-align: middle;
    }

    .ldBar {
        position: absolute;
        top: calc(45%);
        left: calc(45%);
    }

    .ldBar-label {
        font-size: 0.6em;
        top: 50px;
        left: 50px;
    }

    #end_mask {
        display: none;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background-color: #1e4c66;
        z-index: 999;
    }

    #end_text {
        width: 300px;
        border-width: 5px;
        border-style: double;
        border-color: #deb010;
        position: relative;
        top: calc(45%);
        left: calc(42%);
        color: #ffffff;
        font-family: "微軟正黑體", "微软雅黑", "Helvetica Neue", Helvetica, Arial, sans-serif, sans-serif;
        font-size: 4em;
        margin: 0 0 24px;
        text-align: center;
        text-justify: inter-word;
    }

    #sound {
        position: absolute;
        color: white;
        top: calc(85%);
        left: calc(94%);
        z-index: 999;
    }

    #mute {
        display: none;
        position: absolute;
        color: white;
        top: calc(85%);
        left: calc(94%);
        z-index: 999;
    }

    @media (max-width: 769px) {
        #gameContainer {
            text-align: center;
            z-index: 1;
            position: relative;
            background-color: #005d7e;
            background-image: url("images/game_bg2.png");
        }

    }

</style>
<body>
<div id="test-width"
     style="position: absolute; top: 100px; left: 10px; color: rgba(255, 255, 255, 0.5); z-index: 99;"></div>
<div id="end_mask">
    <div id="end_text">遊戲結束!!</div>
</div>
<div id="black_mask"
     style="position: absolute; display: block; top: 0px; left: 0px; width: 100% ; height: 100% ;background-color: rgb(50,50,50); z-index: 999;"></div>
<div id="black_mask2"
     style="position: absolute; display: block; top: 0px; left: 0px; width: 100% ; height: 100% ;background-color: rgb(50,50,50); z-index: 899;"></div>
<!--桌機版 start-->
<div id="game_block" class="wrap">
    <!--header start-->
    <header>
        <div class="logo"><a href="index.php"><img src="assets/images/logo.png"></a></div>
        <nav>
            <ul>
                <?php include 'menu.php'; ?>
            </ul>
        </nav>
    </header>
    <!--header end-->

    <!--game main start-->


    <div class="game-main">
        <div id="log">info:
            <div id="logs">開始</div>
        </div>

        <div id="sound"><i class="fa fa-volume-up fa-2x" aria-hidden="true"></i></div>
        <div id="mute"><i class="fa fa-volume-off fa-2x" aria-hidden="true"></i></div>
        <div id="gameContainer">
            <div id="game_memo" class="game-mask refrommiddle">
                <div class="game-memo game-memo2 foo">
                    <div class="detail">
                        <span class="subject">操作說明</span>
                        移動滑鼠點擊螢幕上相對應的3M產品特色BAR以過濾有害物質<br>越精準點擊，越能獲取成功喔！
                        <div class="extra"><a class="go_game" style="cursor: pointer">GO!</a></div>
                    </div>
                </div>
            </div>
            <!--  遊戲內容-->
            <div id="loadingPage">
                <div class="ldBar label-center" data-pattern-size="50" data-preset="bubble" data-value="0"></div>
            </div>
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
<script src="node_modules/screenfull/dist/screenfull.js"></script>
<script src="js/process/loading-bar.min.js"></script>
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
<script src="node_modules/jquery-confirm/dist/jquery-confirm.min.js"></script>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<input id="_level" name="_level" value="<?php echo $_SESSION['game_level'] ?>" type="hidden">
<script type="text/javascript">
    var _level = '<?php echo $_SESSION['game_level'] ?>';
    var isMobile = false; //initiate as false
    var init_js = $.dialog({
        lazyOpen: true,
        icon: 'fa fa-tablet  faa-wrench animated',
        theme: 'supervan',
        closeIcon: false,
        animation: 'scale',
        type: 'orange',
        title: '手機請轉換方向',
        content: '手機為橫向時,才可開始遊戲喔!'
    });

    $('#black_mask').hide();

    function myFunction(x) {
        if (x.matches) { // If media query matches

            $('#end_text').css({
                'top': 'calc(40%)',
                'left': 'calc(34%)'
            })
            $('.game-memo2').css({
                'margin-top': '80px'
            })
        } else {

            $('#end_text').css({
                'top': 'calc(40%)',
                'left': 'calc(34%)'
            })
            $('.game-memo2').css({
                'margin-top': '180px'
            })
        }
    }

    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {

        var x = window.matchMedia("(max-width: 1280px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
    }

    $(document).ready(function () {
        var config = {
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            withCredentials: true,
        }
        var formData = new FormData();
        formData.append('lv', _level);

        axios.post(
            'https://3m-xcode.com/data/api/player_data/start',
            formData,
            config
        ).then(function (response) {
            console.log(response.data);
        });

        if (window.orientation === 180 || window.orientation === 0) {

            $('#black_mask').show();
            init_js.open();

            window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {

                if (window.orientation === 90 || window.orientation === -90) {
                    // alert('目前您的螢幕為橫向！');
                    location.reload();
                }
            }, false);
        } else {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
                if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
                    setTimeout(function () {
                        if (window.pageYOffset !== 0) return;
                        window.scrollTo(0, window.pageYOffset + 1);

                    }, 1000);
                    setTimeout(function () {
                        $('#black_mask2').fadeOut(500);
                    }, 500)
                } else {
                    $.confirm({
                        title: '提示:',
                        content: '手機遊戲畫面將以全螢幕顯示',
                        buttons: {
                            deleteUser: {
                                text: '確認',
                                action: function () {
                                    // screenfull.request();
                                    /* iOS re-orientation fix */
                                    screenfull.request();
                                    setTimeout(function () {
                                        $('#black_mask2').fadeOut(500);
                                    }, 2000)
                                }
                            }
                        }
                    });
                }
            } else {
                $('#black_mask2').hide();
            }
        }
    });

</script>
</body>
</html>