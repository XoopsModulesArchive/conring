<?php

include 'header.php';
//--------------------------------------------
// get POST & GET Environment Variable
//--------------------------------------------
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

foreach ($_GET as $k => $v) {
    ${$k} = $v;
}
session_start();
session_register('change_music');
session_register('change_movie');
session_register('change_picture');
session_register('change_html');
session_register('change_flash');
session_register('change_java');

if (isset($change_music)) {
    $_SESSION['change_music'] = $change_music;
}
if (isset($change2_movie)) {
    $_SESSION['change_movie'] = $change_movie;
}
if (isset($change_picture)) {
    $_SESSION['change_picture'] = $change_picture;
}
if (isset($change_html)) {
    $_SESSION['change_html'] = $change_html;
}
if (isset($change_flash)) {
    $_SESSION['change_flash'] = $change_flash;
}
if (isset($change_java)) {
    $_SESSION['change_java'] = $change_java;
}

redirect_header('' . XOOPS_URL . '/index.php', 1, _MAIN_LOADING);
