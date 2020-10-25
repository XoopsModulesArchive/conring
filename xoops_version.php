<?php

// -----------------------------------------------------------------
//               Xoops: Content Management System
//                       < https://www.xoops.org >
// -----------------------------------------------------------------
// Author: CACHE
// -----------------------------------------------------------------

$modversion['name'] = _CO_NAME;
$modversion['version'] = 0.4;
$modversion['description'] = _CO_DESC;
$modversion['credits'] = 'The XOOPS Project';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'logo.gif';
$modversion['dirname'] = 'conring';
$modversion['author'] = 'CACHE';

// Menu
$modversion['hasMain'] = 1;

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php?com=conringAdmin&sel=0';
$modversion['adminmenu'] = 'admin/menu.php';

// Templates
$modversion['templates'][1]['file'] = 'conring_index.html';
$modversion['templates'][1]['description'] = 'The template file of the index file';
$modversion['templates'][2]['file'] = 'conring_show.html';
$modversion['templates'][2]['description'] = 'The template file of the table of the contents.';

// Blocks
$modversion['blocks'][1]['file'] = 'conring_picture_blocks.php';
$modversion['blocks'][1]['name'] = _CO_BLK_PIC_NAME;
$modversion['blocks'][1]['description'] = _CO_BLK_PIC_DESC;
$modversion['blocks'][1]['show_func'] = 'b_conring_show';
$modversion['blocks'][1]['edit_func'] = 'b_conring_edit';
$modversion['blocks'][1]['options'] = '-1';
$modversion['blocks'][1]['template'] = 'conring_picture_daily.html';

$modversion['blocks'][2]['file'] = 'conring_music_blocks.php';
$modversion['blocks'][2]['name'] = _CO_BLK_MUS_NAME;
$modversion['blocks'][2]['description'] = _CO_BLK_MUS_DESC;
$modversion['blocks'][2]['show_func'] = 'b_conring_music_show';
$modversion['blocks'][2]['options'] = '200|150|false|false|true|0|5|true|10000|true|true|-1';
$modversion['blocks'][2]['edit_func'] = 'b_conring_music_edit';
$modversion['blocks'][2]['template'] = 'conring_music_daily.html';

$modversion['blocks'][3]['file'] = 'conring_movie_blocks.php';
$modversion['blocks'][3]['name'] = _CO_BLK_MOV_NAME;
$modversion['blocks'][3]['description'] = _CO_BLK_MOV_DESC;
$modversion['blocks'][3]['show_func'] = 'b_conring_movie_show';
$modversion['blocks'][3]['options'] = '200|160|false|false|true|0|5|true|10000|true|true|false|-1';
$modversion['blocks'][3]['edit_func'] = 'b_conring_movie_edit';
$modversion['blocks'][3]['template'] = 'conring_movie_daily.html';

$modversion['blocks'][4]['file'] = 'conring_html_blocks.php';
$modversion['blocks'][4]['name'] = _CO_BLK_HTM_NAME;
$modversion['blocks'][4]['description'] = _CO_BLK_HTM_DESC;
$modversion['blocks'][4]['show_func'] = 'b_conring_html_show';
$modversion['blocks'][4]['options'] = '-1';
$modversion['blocks'][4]['edit_func'] = 'b_conring_html_edit';
$modversion['blocks'][4]['template'] = 'conring_html_daily.html';

$modversion['blocks'][5]['file'] = 'conring_flash_blocks.php';
$modversion['blocks'][5]['name'] = _CO_BLK_SWF_NAME;
$modversion['blocks'][5]['description'] = _CO_BLK_SWF_DESC;
$modversion['blocks'][5]['show_func'] = 'b_conring_flash_show';
$modversion['blocks'][5]['options'] = '-1';
$modversion['blocks'][5]['edit_func'] = 'b_conring_flash_edit';
$modversion['blocks'][5]['template'] = 'conring_flash_daily.html';

$modversion['blocks'][6]['file'] = 'conring_java_blocks.php';
$modversion['blocks'][6]['name'] = _CO_BLK_JAV_NAME;
$modversion['blocks'][6]['description'] = _CO_BLK_JAV_DESC;
$modversion['blocks'][6]['show_func'] = 'b_conring_java_show';
$modversion['blocks'][6]['options'] = '-1';
$modversion['blocks'][6]['edit_func'] = 'b_conring_java_edit';
$modversion['blocks'][6]['template'] = 'conring_java_daily.html';
