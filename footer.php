<!--footer start-->
<footer>
    Copyright © 3M台灣 版權所有 ｜3M台灣官網  <a href="https://www.3m.com.tw" target="_blank">https://www.3m.com.tw</a>
</footer>
<!--footer end-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
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
<script src="node_modules/screenfull/dist/screenfull.js"></script>

<script src="node_modules/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script type="text/javascript">
    const _level = '<?php echo   $_SESSION['game_level'] ?>';
    let init_js = $.dialog({
        lazyOpen: true,
        icon: 'fa fa-tablet  faa-wrench animated',
        theme: 'supervan',
        closeIcon: false,
        animation: 'scale',
        type: 'orange',
        title: '提示:',
        content: '手機請轉向直立為最佳顯示效果!'
    });

    $('#black_mask').hide();
    $(document).ready(function () {
        if (window.orientation === 90 || window.orientation === -90) {
            $('#black_mask').show();
            init_js.open();
            window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function () {
                if (window.orientation === 90 || window.orientation === -90) {
                    $('#black_mask').show();
                    init_js.open();
                }
                if (window.orientation === 180 || window.orientation === 0) {
                    $('#black_mask').hide();
                    init_js.close();;
                }
            }, false);
        }

        if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
            /* iOS hides Safari address bar */
            window.addEventListener("load",function() {
                setTimeout(function() {
                    window.scrollTo(0, 1);
                }, 1000);
            });
        }

    });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55579323-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-55579323-4');
</script>
