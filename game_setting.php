<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset( $_SESSION['game_level'])) {
        $_SESSION['game_level'] = 1;
    }
}
if (isset($_SESSION['ss_fb_id']) &&   $_SESSION['ss_fb_id'] != '') {
//    echo   $_SESSION['ss_fb_id'];
} else {
//   echo 'go index';
    header('Location: index.php');
    exit;
}
if(isset($_GET['lv'])) {
    $_SESSION['game_level'] = $_GET['lv'];
//echo $_SESSION['game_level'];
}
//echo $_SESSION['game_level'];
?>



<style>
    .jconfirm.jconfirm-supervan .jconfirm-bg {
        background-color: rgb(34, 41, 49);
    }
    .jconfirm.jconfirm-white .jconfirm-bg, .jconfirm.jconfirm-light .jconfirm-bg {
        background-color: #444;
        opacity: .8;
    }
    .jconfirm-content{
        font-size: 16px;
    }
</style>
