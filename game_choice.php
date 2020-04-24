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
    <div class="game-choice refrommiddle">
        <div class="game-pop foo">
            <div class="close-btn">
                <!--<a href="javascript:void(0);" onclick="closeMask('game-mask','');"><img src="assets/images/game_pop_close.png"></a>-->
                <a href="game_choice.php"><img src="assets/images/game_pop_close.png"></a>
            </div>
            <div class="detail">立即選擇最適合你的<span class="highlight">X 3MEN</span>一起啟動X密碼吧！</div>
        </div>

        <div class="induction">
            <!--<a href="game_role.php"><img src="assets/images/game_choice.png" class="Imgfull"></a>-->
            <img src="assets/images/game_choice.png" class="Imgfull">
            <a href="game_role.php?lv=1" class="game-choice-p game-choice-p1"></a>
            <a href="game_role.php?lv=2" class="game-choice-p game-choice-p2"></a>
            <a href="game_role.php?lv=3" class="game-choice-p game-choice-p3"></a>
        </div>
    </div>
    <!--game cut-1 end-->
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
    <div class="game-choice">
        <div class="owl-carousel carousel-type1">
            <div><a href="game_role.php?lv=1"><img src="assets/images/game_choice_role_1_m.png" class="Imgfull"></a></div>
            <div><a href="game_role.php?lv=2"><img src="assets/images/game_choice_role_2_m.png" class="Imgfull"></a></div>
            <div><a href="game_role.php?lv=3"><img src="assets/images/game_choice_role_3_m.png" class="Imgfull"></a></div>
        </div>
        <!--左右鍵 start-->
        <div class="cut-arrow-left">
            <a href="javascript:void(0);" class="customPrevBtn"><img src="assets/images/cut-arrow-left-btn.png"></a>
        </div>
        <div class="cut-arrow-right">
            <a href="javascript:void(0);" class="customNextBtn"><img src="assets/images/cut-arrow-right-btn.png"></a>
        </div>
        <!--左右鍵 end-->
    </div>
    <!--game cut-1 end-->
</div>
<!--手機版 end-->
<!--footer start-->
<!--footer end-->

<?php include 'footer.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pizzicato/0.6.4/Pizzicato.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        var sound = new Pizzicato.Sound({
            source: 'file',
            options: { path: 'sounds/select.mp3', volume: 0.8  }
        }, function() {
            console.log('sound file loaded!');
        });

        var owl = $('.carousel-type1');
        owl.owlCarousel({
            items:1,
            autoplay: false,
            autoplayTimeout: 10000
        })

        owl.on('changed.owl.carousel', function(event) {
            var items = event.item.count;     // Number of items
            var item  = event.item.index;
            if(item==0)
            {
                $(".cut-arrow-left").hide();
            }
            else
            {
                $(".cut-arrow-left").show();
            }

            if(item==2)
            {
                $(".cut-arrow-right").hide();
            }
            else
            {
                $(".cut-arrow-right").show();
            }
        });

        $('.customNextBtn').click(function() {
            sound.play();
            owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.customPrevBtn').click(function() {
            sound.play();
            owl.trigger('prev.owl.carousel');
        })

        /*
        $(".carousel-type1").owlCarousel({
            items:1,
            loop:true,
            nav:true,
            autoHeight: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            autoplayTimeout:3000,
            navContainerClass : 'owl-nav-customized',
            navClass: ['owl-prev-customized','owl-next-customized'],
            navText : ["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],
        });

        $('.customNextBtn').click(function() {
            owl.trigger('next.owl.carousel');
        })
        // Go to the previous item
        $('.customPrevBtn').click(function() {
            owl.trigger('prev.owl.carousel');
        })
        */
    });
</script>
</body>
</html>