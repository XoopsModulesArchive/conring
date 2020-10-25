<?php

//--------------------------------------------
// Including header.php, includes mainfile.php
//--------------------------------------------
include 'header.php';
//--------------------------------------------
// Load Template
//--------------------------------------------
$GLOBALS['xoopsOption']['template_main'] = 'conring_index.html';
//--------------------------------------------
// Include header
//--------------------------------------------
require XOOPS_ROOT_PATH . '/header.php';
//--------------------------------------------
// Include user settings
//--------------------------------------------
require XOOPS_ROOT_PATH . '/modules/conring/include/functions.php';
$select_settings = select_settings();
include $select_settings;

// to templates => main
$xoopsTpl->assign('title', _MAIN_TITLE);

//--------------------------------------------
// main
//--------------------------------------------

$column_tbl = [];
$column_cnt = 1;
$first_junle_flag = 0;
foreach ($conring_info as $level1) {
    foreach ($level1 as $level2) {
        foreach ($level2 as $level3) {
            foreach ($level3 as $key => $val) {
                switch ($key) {
                    case 'column':
                        $column_cnt++;
                        break;
                    case 'junle':
                        if (1 == $first_junle_flag) {
                            $column_tbl[] = $column_cnt;
                        }
                        $first_junle_flag = 1;
                        $column_cnt = 1;
                        break;
                    default:
                        break;
                }
            }
        }
    }
}
$column_tbl[] = $column_cnt;

$media = '';
$main = '';
$main_idx = 0;
$junle_flag = 1;
$menu_flag = 1;
$menu_cnt = 0;
$contents_cnt = 0;
$column_cnt = 0;
foreach ($conring_info as $level1) {
    foreach ($level1 as $level2) {
        foreach ($level2 as $level3) {
            foreach ($level3 as $key => $val) {
                $val = strip_tags($val);

                switch ($key) {
                    case 'media':
                        $media = $val;
                        break;
                    case 'junle':
                        if ('Off' == $val) {
                            $junle_flag = 0;
                        } else {
                            $junle_flag = 1;

                            if ('' != $main) {
                                $main .= '</td></tr></table>';
                            }

                            $main .= '<table width="100%" border="0"><tr><td class="head" colspan="' . $column_tbl[$column_cnt] . '" align="center" valign="middle">';

                            if (false === mb_strpos($val, 'http://')) {
                                $main .= '<font size="4">' . $val . '</font>';
                            } else {
                                $dum = explode('|', $val);

                                $main .= '<img src="' . $dum[0] . '" border="0"  alt="' . $dum[1] . '">';
                            }

                            $main .= '</td></tr><tr><td class="even" align="center">';
                        }
                        $column_cnt++;
                        break;
                    case 'column':
                        if (1 == $junle_flag) {
                            $main .= '</td><td class="even" align="center">';
                        }
                        break;
                    case 'menu':
                        if ('Off' == $val) {
                            $menu_flag = 0;
                        } else {
                            $menu_flag = 1;
                        }
                        if (1 == $junle_flag && 1 == $menu_flag) {
                            if (0 == $contents_cnt && $menu_cnt > 0) {
                                $main = mb_substr($main, 0, $main_idx);
                            }

                            $main_idx = mb_strlen($main);

                            if (false === mb_strpos($val, 'http://')) {
                                $main .= '<a href="./show.php?sel=' . $menu_cnt . '&media=' . $media . '&page=1">' . $val . '</a><br>';
                            } else {
                                $dum = explode('|', $val);

                                $main .= '<a href="./show.php?sel=' . $menu_cnt . '&media=' . $media . '&page=1"><img src="' . $dum[0] . '" border="0" alt="' . $dum[1] . '"></a><br>';
                            }
                        }
                        $menu_cnt++;
                        $contents_cnt = 0;
                        break;
                    case 'status':
                        if ('On' == $val) {
                            $contents_cnt++;
                        }
                        break;
                    default:
                        break;
                }
            }
        }
    }
}
if (0 == $contents_cnt) {
    $main = mb_substr($main, 0, $main_idx);
}
$main .= '</td></tr></table>';
$xoopsTpl->assign('main', $main);

//--------------------------------------------
// Include footer
//--------------------------------------------
require XOOPS_ROOT_PATH . '/footer.php';
// done
