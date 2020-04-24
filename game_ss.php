<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_POST['fb_id'])) {
        $_SESSION['ss_fb_id'] = $_POST['fb_id'];
        $_SESSION['ss_fb_name'] = $_POST['fb_name'];
    }
} else {
    if (isset($_POST['fb_id'])) {
        $_SESSION['ss_fb_id'] = $_POST['fb_id'];
        $_SESSION['ss_fb_name'] = $_POST['fb_name'];
    }
}
echo  $_SESSION['ss_fb_id'];
