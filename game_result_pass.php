<!DOCTYPE html>
<html>
<head>
    <?php
    header('Access-Control-Allow-Origin:*');
    ?>
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="node_modules/font-awesome-animation/dist/font-awesome-animation.css" rel="stylesheet">
    <link href="node_modules/jquery-confirm/dist/jquery-confirm.min.css" rel="stylesheet">
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['game_level'])) {
        $_SESSION['game_level'] = 1;
    }
}

$time_check = 0;
$date = new DateTime();
$now = $date->getTimestamp();
$f_time = new DateTime('2020/12/12 00:00:00');
if (isset($_SESSION['g_start'])) {
    $time_check = $now - $_SESSION['g_start'];
    $_SESSION['g_start'] = $f_time->getTimestamp();
//    echo $time_check;
    if ($time_check < 1) {
        $_SESSION['g_start'] = $f_time->getTimestamp();
//        header("Location: game.php");
//        die();
    }
} else {
    $_SESSION['g_start'] = $f_time->getTimestamp();
//    header("Location: game.php");
//    die();
}
//echo $time_check;
?>
<?php include 'game_setting.php'; ?>
<style>
    .feed_btn {
        cursor: pointer;
    }

    .fb_mask {
        display: none;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.27);
        z-index: 999;
    }
</style>
<body>
<div class="fb_mask"></div>
<div id="test-width"
     style="position: absolute; top: 100px; left: 10px; color: rgba(255, 255, 255, 0.5); z-index: 99;"></div>
<!--桌機版 start-->
<div class="wrap fullheight lihsi-desktop">
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
    <!--game result start-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '1' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg.png" class="result-bg">
        <div class="game-result-people"><img src="assets/images/game_result_people_1.png" class="Imgfull"></div>
        <div class="game-result-product"><img src="assets/images/game_result_product_1.png" class="Imgfull"></div>
        <div class="game-result-emotion"><img src="assets/images/game_result_emotion_1.png" class="Imgfull"></div>
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->

    <!--game result start-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '2' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg.png" class="result-bg">
        <div class="game-result-people"><img src="assets/images/game_result_people_2.png" class="Imgfull"></div>
        <div class="game-result-product"><img src="assets/images/game_result_product_2.png" class="Imgfull"></div>
        <div class="game-result-emotion"><img src="assets/images/game_result_emotion_1.png" class="Imgfull"></div>
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->

    <!--game result start-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '3' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg.png" class="result-bg">
        <div class="game-result-people"><img src="assets/images/game_result_people_3.png" class="Imgfull"></div>
        <div class="game-result-product"><img src="assets/images/game_result_product_3.png" class="Imgfull"></div>
        <div class="game-result-emotion"><img src="assets/images/game_result_emotion_1.png" class="Imgfull"></div>
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
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
                <?php include 'menu.php'; ?>
            </ul>
        </nav>
    </header>
    <!--header end-->
    <!--game result start1-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '1' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg_pass_1_m.png" class="Imgfull">
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->

    <!--game result start2-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '2' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg_pass_2_m.png" class="Imgfull">
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
                <a href="game.php">成為S MEN<br>挑戰下一關</a>
            </div>
            <div class="game-result-share">
                臉書分享結果頁，好禮等你抽
            </div>
        </div>
    </div>
    <!--game result end-->

    <!--game result start3-->
    <div class="game-result" style="display: <?php echo $_SESSION['game_level'] == '3' ? '' : 'none' ?>">
        <img src="assets/images/game_result_bg_pass_3_m.png" class="Imgfull">
        <div class="game-result-detail">
            所有雜質細菌重金屬一網打盡之際，內行人才懂的水質口感，就是必勝關鍵！<br>軟化過後的水質，讓美食或是咖啡更加升級～
            <div class="game-result-extra">
                <a class="feed_btn">分享X密碼</a>
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

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<?php
if (!isset($_SESSION['ss_fb_name'])) {
    $_SESSION['ss_fb_name'] = '';
}
if (!isset($_SESSION['game_level'])) {
    $_SESSION['game_level'] = '1';
}
if (!isset($_SESSION['ss_fb_id'])) {
    $_SESSION['ss_fb_id'] = '';
}
?>
<script>

    let config = {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        withCredentials: true,
    }
    //FB
    let fb_lv = '<?php echo $_SESSION['game_level'] ?>';
    if (fb_lv == '') {
        fb_lv = 1;
    }
    let fb_name = '<?php echo $_SESSION['ss_fb_name'] ?>';
    let fb_id = '<?php echo $_SESSION['ss_fb_id'] ?>'
    let fb_email = '-';
    let fb_title = "test";
    let fb_link = "https://3m-xcode.com/share_" + fb_lv + ".html";
    let fb_desc = "desc";
    let has_play = false;
    let has_update = false;
    //先判斷有沒有資料
    let formData = new FormData();
    formData.append('fb_id', fb_id);
    formData.append('lv', '<?php echo $_SESSION['game_level'] ?>');
    axios.post(
        'https://3m-xcode.com/data/api/player_data/check',
        formData,
        config
    ).then(function (response) {
        console.log(response.data.code);
        if (response.data.code == 0) {
            console.log('無資料');
        } else {
            has_play = true;
            console.log('已更新');
        }
    });
    window.fbAsyncInit = function () {
        FB.init({
            appId: '2831458826964843',
            cookie: true,
            xfbml: true,
            version: 'v6.0'
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


    function login() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        console.log('Welcome!  Fetching your information.... ');
        FB.login(function (response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function (response) {
                    console.log('Good to see you, ' + response.name + '.');
                    if (response.email != undefined) {
                        fb_email = response.email;
                    }
                    fb_name = response.name;
                    fb_id = response.id;

                    feed();
                });

            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }

    $('.feed_btn').click(function () {
        $('.fb_mask').show();
        feed();
    });
    // app.modalMethods().openForm();
    var u = navigator.userAgent,
        ua = navigator.userAgent.toLowerCase(),
        isLineApp = u.indexOf("Line") > -1;

    var link = 'http://3m-xcode.com/test_share.html';
    var get_param = '';
    var share_to = 'https://www.facebook.com/dialog/share?' +
        'app_id=2831458826964843' +
        '&display=popup' +
        '&href=' + fb_link +
        '&redirect_uri=' + link + '?form=1';

    // 如果是 Line 內建瀏覽器
    if (isLineApp && get_param != '') {

    }

    function feed() {
        console.log('fb feed');
        FB.getLoginStatus(function (response) {   // See the onlogin handler
            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                if (has_update) {
                    FB.ui({
                        method: 'share',
                        href: fb_link
                    }, function (response) {
                        $('.fb_mask').hide();
                    });
                } else {
                    FB.api('/me', function (response) {
                        console.log('Good to see you, ' + response.name + '.');
                        fb_name = response.name;
                        if (response.email != undefined) {
                            fb_email = response.email;
                        }
                        fb_id = response.id;
                        formData = new FormData();
                        formData.append('fb_id', fb_id);
                        formData.append('fb_name', fb_name);
                        formData.append('fb_id', fb_id);
                        axios.post(
                            'game_ss.php',
                            formData,
                            config
                        ).then(function (response) {
                        });

                        formData = new FormData();
                        formData.append('fb_id', fb_id);
                        formData.append('lv', '<?php echo $_SESSION['game_level'] ?>');
                        axios.post(
                            'https://3m-xcode.com/data/api/player_data/check',
                            formData,
                            config
                        ).then(function (response) {
                            console.log(response.data.code);
                            if (response.data.code == 0) {
                            } else {
                                has_play = true;
                            }
                            if (!isLineApp && !isFacebookApp()) {
                                FB.ui({
                                    method: 'share',
                                    href: fb_link
                                }, function (response) {
                                    $('.fb_mask').hide();
                                    // alert(has_play);
                                    // alert(has_play + fb_id)
                                    // console.log('fb_id' + fb_id);
                                    if (has_play) {
                                        alert('遊戲紀錄已更新！');
                                        has_update = true;
                                    } else {
                                        setTimeout(function () {
                                            write_form.open();
                                        }, 1500);
                                    }
                                });
                            }
                            if (has_play) {
                                has_update = true;
                                if (isLineApp) {

                                    alert('遊戲紀錄已更新！需要分享才有抽獎資格!');
                                    FB.ui({
                                        method: 'share',
                                        href: fb_link
                                    }, function (response) {
                                    });
                                    setTimeout(function () {
                                        $('.fb_mask').hide();
                                    }, 1500);
                                }
                                if (isFacebookApp()) {

                                    alert('遊戲紀錄已更新！需要分享才有抽獎資格!');
                                    FB.ui({
                                        method: 'share',
                                        href: fb_link
                                    }, function (response) {
                                    });
                                    setTimeout(function () {
                                        $('.fb_mask').hide();
                                    }, 1500);
                                }
                            } else {
                                if (isLineApp) {
                                    alert('資料填寫完後,需要分享才有抽獎資格！');
                                    $('.fb_mask').hide();
                                    write_form_line.open();
                                }
                                if (isFacebookApp()) {
                                    $('.fb_mask').hide();
                                    if (has_play) {
                                        alert('遊戲紀錄已更新！');
                                        has_update = true;
                                    } else {
                                        setTimeout(function () {
                                            write_form.open();
                                        }, 1500);
                                    }
                                    FB.ui({
                                        method: 'share',
                                        href: fb_link
                                    }, function (response) {
                                        $('.fb_mask').hide();

                                    });
                                }
                            }

                        });
                    });
                    // if (isLineApp) {
                    //     FB.api('/me', function (response) {
                    //         console.log('Good to see you, ' + response.name + '.');
                    //         fb_name = response.name;
                    //         if (response.email != undefined) {
                    //             fb_email = response.email;
                    //         }
                    //         fb_id = response.id;
                    //     });
                    //     window.open(share_to);
                    //     return false;
                    // }
                }
            } else {
                FB.login(function (response) {
                    $('.fb_mask').hide();
                    if (response.authResponse) {
                        console.log('Welcome!  Fetching your information.... ');
                        FB.api('/me', function (response) {

                            $('.fb_mask').show();
                            console.log('Good to see you, ' + response.name + '.');
                            fb_name = response.name;
                            if (response.email != undefined) {
                                fb_email = response.email;
                            }
                            fb_id = response.id;
                            formData = new FormData();
                            formData.append('fb_id', fb_id);
                            formData.append('fb_name', fb_name);
                            formData.append('fb_id', fb_id);
                            axios.post(
                                'game_ss.php',
                                formData,
                                config
                            ).then(function (response) {
                            });

                            formData = new FormData();
                            formData.append('fb_id', fb_id);
                            formData.append('lv', '<?php echo $_SESSION['game_level'] ?>');
                            axios.post(
                                'https://3m-xcode.com/data/api/player_data/check',
                                formData,
                                config
                            ).then(function (response) {

                                $('.fb_mask').hide();
                                if (response.data.code == 0) {
                                } else {
                                    has_play = true;
                                }

                                FB.ui({
                                    method: 'share',
                                    href: fb_link
                                }, function (response) {
                                    if (has_play) {
                                        alert('遊戲紀錄已更新！');
                                        has_update = true;
                                    } else {
                                        setTimeout(function () {
                                            write_form.open();
                                        }, 1500);
                                    }
                                });
                            });
                        });
                        // if (isLineApp) {
                        //     FB.api('/me', function (response) {
                        //         console.log('Good to see you, ' + response.name + '.');
                        //         fb_name = response.name;
                        //         if (response.email != undefined) {
                        //             fb_email = response.email;
                        //         }
                        //         fb_id = response.id;
                        //     });
                        //     window.open(share_to);
                        //     return false;
                        // }


                    } else {

                        $('.fb_mask').hide();
                        console.log('User cancelled login or did not fully authorize.');
                    }
                });
            }
        });

        setTimeout(function () {
            $('.fb_mask').hide();
        }, 60000);
    }

    let write_form = $.confirm({
        lazyOpen: true,
        title: '填寫個人資料!',
        content: '' +
            '<form action="https://3m-xcode.com/data/api/player_data/save" class="formName">' +
            '<div class="form-group">' +
            '<label>姓名</label>' +
            '<input type="text" placeholder="請輸入姓名" class="name form-control"  />' +
            '<label>電話</label>' +
            '<input type="text" placeholder="請輸入連絡電話" class="phone form-control"  />' +
            '<label>e-mail</label>' +
            '<input type="text" placeholder="請輸入信箱" class="email form-control"  />' +
            '</div>' +
            '</form>',
        buttons: {
            cancel: {
                text: '不參加',
                action: function () {
                }
            },
            formSubmit: {
                text: '送出資料',
                btnClass: 'btn-primary',
                action: function () {
                    var name = this.$content.find('.name').val();
                    if (!name) {
                        $.alert('請輸入姓名');
                        return false;
                    }
                    var phone = this.$content.find('.phone').val();
                    if (!phone) {
                        $.alert('請輸入電話');
                        return false;
                    }
                    var email = this.$content.find('.email').val();
                    if (!email) {
                        $.alert('請輸入email');
                        return false;
                    }

                    this.buttons.formSubmit.disable();
                    this.buttons.cancel.disable();
                    this.$content.find('.name').attr('disabled', 'disabled');
                    this.$content.find('.phone').attr('disabled', 'disabled');
                    this.$content.find('.email').attr('disabled', 'disabled');

                    let formData = new FormData();
                    formData.append('fb_id', fb_id);
                    formData.append('fb_name', fb_name);
                    formData.append('fb_email', fb_email);
                    formData.append('username', name);
                    formData.append('phone', phone);
                    formData.append('email', email);
                    formData.append('lv', '<?php echo $_SESSION['game_level'] ?>');

                    axios.post(
                        'https://3m-xcode.com/data/api/player_data/save',
                        formData,
                        config
                    ).then(function (response) {
                        let _message = '';

                        if (response.data.errors != undefined) {
                            if (response.data.errors.username != undefined) {
                                _message += response.data.errors.username + '<br>';
                            }
                            if (response.data.errors.phone != undefined) {
                                _message += response.data.errors.phone + '<br>';
                            }
                            if (response.data.errors.email != undefined) {
                                _message += response.data.errors.email + '<br>';
                            }
                        }
                        if (response.data.code == 0) {
                            has_update = true;
                            _message = '完成登錄';
                        }
                        $.confirm({
                            title: _message,
                            content: '',
                            buttons: {
                                OK: {
                                    text: '關閉',
                                    action: function () {
                                        write_form.close();
                                    }
                                }
                            }
                        });
                    });
                    return false;
                }
            },
        },
        onContentReady: function () {

            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });

    let write_form_line = $.confirm({
        lazyOpen: true,
        title: '填寫個人資料!',
        content: '' +
            '<form action="https://3m-xcode.com/data/api/player_data/save" class="formName">' +
            '<div class="form-group">' +
            '<label>姓名</label>' +
            '<input type="text" placeholder="請輸入姓名" class="name form-control"  />' +
            '<label>電話</label>' +
            '<input type="text" placeholder="請輸入連絡電話" class="phone form-control"  />' +
            '<label>e-mail</label>' +
            '<input type="text" placeholder="請輸入信箱" class="email form-control"  />' +
            '</div>' +
            '</form>',
        buttons: {
            cancel: {
                text: '不參加',
                action: function () {
                }
            },
            formSubmit: {
                text: '送出資料',
                btnClass: 'btn-primary',
                action: function () {
                    var name = this.$content.find('.name').val();
                    if (!name) {
                        $.alert('請輸入姓名');
                        return false;
                    }
                    var phone = this.$content.find('.phone').val();
                    if (!phone) {
                        $.alert('請輸入電話');
                        return false;
                    }
                    var email = this.$content.find('.email').val();
                    if (!email) {
                        $.alert('請輸入email');
                        return false;
                    }

                    this.buttons.formSubmit.disable();
                    this.buttons.cancel.disable();
                    this.$content.find('.name').attr('disabled', 'disabled');
                    this.$content.find('.phone').attr('disabled', 'disabled');
                    this.$content.find('.email').attr('disabled', 'disabled');

                    let formData = new FormData();
                    formData.append('fb_id', fb_id);
                    formData.append('fb_name', fb_name);
                    formData.append('fb_email', fb_email);
                    formData.append('username', name);
                    formData.append('phone', phone);
                    formData.append('email', email);
                    formData.append('lv', '<?php echo $_SESSION['game_level'] ?>');

                    axios.post(
                        'https://3m-xcode.com/data/api/player_data/save',
                        formData,
                        config
                    ).then(function (response) {
                        let _message = '';

                        if (response.data.errors != undefined) {
                            if (response.data.errors.username != undefined) {
                                _message += response.data.errors.username + '<br>';
                            }
                            if (response.data.errors.phone != undefined) {
                                _message += response.data.errors.phone + '<br>';
                            }
                            if (response.data.errors.email != undefined) {
                                _message += response.data.errors.email + '<br>';
                            }
                        }
                        if (response.data.code == 0) {
                            has_update = true;
                            _message = '完成登錄';
                        }
                        $.confirm({
                            title: _message,
                            content: '',
                            buttons: {
                                OK: {
                                    text: '關閉',
                                    action: function () {


                                        FB.ui({
                                            method: 'share',
                                            href: fb_link
                                        }, function (response) {
                                            $('.fb_mask').hide();
                                            // alert(has_play);
                                            // alert(has_play + fb_id)
                                            // console.log('fb_id' + fb_id);
                                            if (has_play) {
                                                alert('遊戲紀錄已更新！');
                                                has_update = true;
                                            } else {
                                                setTimeout(function () {
                                                    write_form_line.close();
                                                }, 1500);
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    });
                    return false;
                }
            },
        },
        onContentReady: function () {

            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });

    function isFacebookApp() {
        var ua = navigator.userAgent || navigator.vendor || window.opera;
        return (ua.indexOf("FBAN") > -1) || (ua.indexOf("FBAV") > -1);
    }
</script>
</body>
</html>