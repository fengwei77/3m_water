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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>


<script>
    $.confirm({
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
                    if(!name){
                        $.alert('請輸入姓名');
                        return false;
                    }
                    var phone = this.$content.find('.phone').val();
                    if(!phone){
                        $.alert('請輸入電話');
                        return false;
                    }
                    var email = this.$content.find('.email').val();
                    if(!email){
                        $.alert('請輸入email');
                        return false;
                    }
                    let config = {
                        headers: {
                            'Access-Control-Allow-Origin': '*',
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        withCredentials: true,
                    }

                    this.buttons.formSubmit.disable();
                    this.buttons.cancel.disable();
                    this.$content.find('.name').attr('disabled','disabled');
                    this.$content.find('.phone').attr('disabled','disabled');
                    this.$content.find('.email').attr('disabled','disabled');

                    let fb_id = 'test';
                    let fb_name = 'test';
                    let fb_email = 'test';
                    let formData = new FormData();
                    formData.append('fb_id', fb_id);
                    formData.append('fb_name', fb_name);
                    formData.append('fb_email', fb_email);
                    formData.append('username', name);
                    formData.append('phone', phone);
                    formData.append('email', email);

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
                            _message = '完成登錄';
                        }
                        $.confirm({
                            title: _message,
                            content: '',
                            buttons: {
                                OK: {
                                    text: '關閉',
                                    action: function(){
                                        location.href = 'index.php';
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
</script>
</body>
</html>