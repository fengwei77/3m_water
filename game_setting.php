<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset( $_SESSION['game_level'])) {
        $_SESSION['game_level'] = 3;
    }
}

if(isset($_GET['lv'])) {
    $_SESSION['game_level'] = $_GET['lv'];
//echo $_SESSION['game_level'];
}

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
