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
    <link href="assets/css/game-candidate.css" rel="stylesheet">
    <link href="assets/css/accordion.css" rel="stylesheet">
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
<style>
    .accordion-cell::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 87.8%;
        background: rgba(50, 84, 118, 0.9);
    }
</style>
<body>
<div id="test-width"
     style="position: absolute; top: 100px; left: 10px; color: rgba(255, 255, 255, 0.5); z-index: 99;"></div>
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
    <!--game candidate start-->
    <div class="game-candidate" style="">
        <div class="induction">
            <!--<img src="assets/images/game-candidate-bg.png" class="Imgfull">-->
            <img src="assets/images/game_role_new_bg.png" class="Imgfull">
            <div class="accordion">
                <div class="accordion-cell  <?php echo $_SESSION['game_level']  == 1 ? 'expanded detail-open' : 'collapsed' ?>">
                    <div class="accordion-cell-content">
                        <img src="assets/images/game-candidate-p1.png" class="candidate-pset candidate-p1">
                        <a url="game_main.php?lv=1" class="startBtn">開始遊戲</a>
                    </div>
                </div>
                <div class="accordion-cell  <?php echo $_SESSION['game_level']  == 2 ? 'expanded detail-open' : 'collapsed' ?>">
                    <div class="accordion-cell-content">
                        <img src="assets/images/game-candidate-p2.png" class="candidate-pset candidate-p2">
                        <a url="game_main.php?lv=2" class="startBtn">開始遊戲</a>
                    </div>
                </div>
                <div class="accordion-cell  <?php echo $_SESSION['game_level']  == 3 ? 'expanded detail-open' : 'collapsed' ?>">
                    <div class="accordion-cell-content">
                        <img src="assets/images/game-candidate-p3.png" class="candidate-pset candidate-p3">
                        <a url="game_main.php?lv=3" class="startBtn">開始遊戲</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="game-choice refrommiddle">
        <div class="owl-carousel carousel-type1">
            <div class="startBtn" url="game_main.php?lv=1"><a url="game_main.php?lv=1"><img src="assets/images/game_role_1_m.png" class="Imgfull"></a></div>
            <div class="startBtn" url="game_main.php?lv=2"><a url="game_main.php?lv=2"><img src="assets/images/game_role_2_m.png" class="Imgfull"></a></div>
            <div class="startBtn" url="game_main.php?lv=3"><a url="game_main.php?lv=3"><img src="assets/images/game_role_3_m.png" class="Imgfull"></a></div>
        </div>
        <!--左右鍵 start-->
        <div class="cut-arrow-left">
            <a href="javascript:void(0);" class="customPrevBtn"><img src="assets/images/cut-arrow-left-btn.png"></a>
        </div>
        <div class="cut-arrow-right">
            <a href="javascript:void(0);" class="customNextBtn"><img src="assets/images/cut-arrow-right-btn.png"></a>
        </div>
    </div>

    <!--左右鍵 end-->

    <!--
    <div class="game-choice refrommiddle">
        <a href="game_main.php"><img src="assets/images/game_role_1_m.png" class="Imgfull"></a>
    </div>
    -->
    <!--game cut-1 end-->
</div>
<!--手機版 end-->
<!--footer start-->

<?php include 'footer.php';?>
<!-- scrollreveal JS File -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pizzicato/0.6.4/Pizzicato.min.js"></script>
<script src="assets/js/accordion.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var sound = new Pizzicato.Sound({
            source: 'file',
            options: { path: 'sounds/select.mp3'   }
        }, function() {
            console.log('sound file loaded!');
        });
        var sound2 = new Pizzicato.Sound({
            source: 'file',
            options: { path: 'sounds/start.mp3'   }
        }, function() {
            console.log('sound file loaded!');
        });

        let _startPosition = _level-1;
        var owl = $('.carousel-type1');
        owl.owlCarousel({
            items: 1,
            startPosition: _startPosition,
            autoplay: false,
            autoplayTimeout: 10000
        })
        if (_startPosition == 0) {
            $(".cut-arrow-left").hide();
        } else {
            $(".cut-arrow-left").show();
        }

        if (_startPosition == 2) {
            $(".cut-arrow-right").hide();
        } else {
            $(".cut-arrow-right").show();
        }
        owl.on('changed.owl.carousel', function (event) {
            var items = event.item.count;     // Number of items
            var item = event.item.index;
            if (item == 0) {
                $(".cut-arrow-left").hide();
            } else {
                $(".cut-arrow-left").show();
            }

            if (item == 2) {
                $(".cut-arrow-right").hide();
            } else {
                $(".cut-arrow-right").show();
            }
        });

        $('.customNextBtn').click(function () {
            sound.play();
            owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.customPrevBtn').click(function () {
            sound.play();
            owl.trigger('prev.owl.carousel');
        })

        $('.accordion-cell').click(function(){
            sound.play();
        });

        $('.startBtn').mouseover(function(){
            sound.volume = 0;
            console.log(0);
        });
        $('.startBtn').mouseout(function(){
            sound.volume = 1;
            console.log(1);
        });
        $('.startBtn').click(function(){
            url = $(this).attr('url');
            sound2.play();
            setTimeout(function(){
                location.href = url ;
            },1000);
        });
    });
</script>
</body>
</html>