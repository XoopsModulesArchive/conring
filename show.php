<?php

//--------------------------------------------
// Include header, this includes mainfile.php
//--------------------------------------------
include 'header.php';
//--------------------------------------------
// Define the to use template
//--------------------------------------------
$GLOBALS['xoopsOption']['template_main'] = 'conring_show.html';
//--------------------------------------------
// Include xoops header
//--------------------------------------------
require XOOPS_ROOT_PATH . '/header.php';
//--------------------------------------------
// Include settings
//--------------------------------------------
require XOOPS_ROOT_PATH . '/modules/conring/include/functions.php';
$select_settings = select_settings();
include $select_settings;
//--------------------------------------------
// get POST & GET Environment Variable
//--------------------------------------------
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

foreach ($_GET as $k => $v) {
    ${$k} = $v;
}
//--------------------------------------------
// subroutine
//--------------------------------------------
function media_show($key, $status, $media, &$link, &$url, &$onlinelink, &$title, &$obj, &$doc, $val, &$main)
{
    if ('On' == $status) {
        switch ($key) {
            case 'link':
                switch ($media) {
                    case 'picture':
                        $main .= '<img src="' . $val . '" border="0"><br>';
                        break;
                    case 'music':
                    case 'movie':
                        $link = $val;
                        $main .= '<tr><td class="even" valign="bottom" align="left" width="30%">';
                        break;
                    default:
                        break;
                }
                break;
            case 'title':
                switch ($media) {
                    case 'picture':
                        $main .= '<h3>' . $val . '</h3><br>';
                        break;
                    case 'music':
                        $main .= '<h4>' . _MUS_TITLE4 . $val . '</h4><br>';
                        break;
                    case 'movie':
                        $main .= '<h4>' . _MOV_TITLE4 . $val . '</h4><br>';
                        break;
                    case 'html':
                        $main .= '<tr><td class="even" valign="bottom" align="left" width="30%">';
                        $main .= '<h4>' . _HTM_TITLE4 . $val . '</h4><br>';
                        break;
                    case 'flash':
                        $main .= '<tr><td class="even" valign="bottom" align="left" width="30%">';
                        $main .= '<h4>' . _SWF_TITLE4 . $val . '</h4><br>';
                        break;
                    case 'java':
                        $main .= '<tr><td class="even" valign="bottom" align="left" width="30%">';
                        $main .= '<h4>' . _JAV_TITLE4 . $val . '</h4><br>';
                        break;
                    default:
                        break;
                }
                $title = $val;
                break;
            case 'composer':
                $main .= '<font size="2">' . _MUS_TITLE5 . $val . '</font><br>';
                break;
            case 'lyricist':
                $main .= '<font size="2">' . _MUS_TITLE6 . $val . '</font><br>';
                break;
            case 'singer':
                $main .= '<font size="2">' . _MUS_TITLE7 . $val . '</font><br>';
                break;
            case 'director':
                switch ($media) {
                    case 'movie':
                        $main .= '<font size="2">' . _MOV_TITLE5 . $val . '</font><br>';
                        break;
                    case 'flash':
                        $main .= '<font size="2">' . _SWF_TITLE5 . $val . '</font><br>';
                        break;
                    default:
                        break;
                }
                break;
            case 'writer':
                $main .= '<font size="2">' . _HTM_TITLE5 . $val . '</font><br>';
                break;
            case 'editor':
                $main .= '<font size="2">' . _HTM_TITLE6 . $val . '</font><br>';
                break;
            case 'creater':
                $main .= '<font size="2">' . _JAV_TITLE5 . $val . '</font><br>';
                break;
            case 'staff':
                switch ($media) {
                    case 'movie':
                        $main .= '<font size="2">' . _MOV_TITLE6 . $val . '</font><br>';
                        break;
                    case 'html':
                        $main .= '<font size="2">' . _HTM_TITLE7 . $val . '</font><br>';
                        break;
                    case 'flash':
                        $main .= '<font size="2">' . _SWF_TITLE6 . $val . '</font><br>';
                        break;
                    default:
                        break;
                }
                break;
            case 'cast':
                switch ($media) {
                    case 'movie':
                        $main .= '<font size="2">' . _MOV_TITLE7 . $val . '</font><br>';
                        break;
                    case 'flash':
                        $main .= '<font size="2">' . _SWF_TITLE7 . $val . '</font><br>';
                        break;
                    default:
                        break;
                }
                break;
            case 'class':
                switch ($media) {
                    case 'music':
                        $main .= '<font size="2">' . _MUS_TITLE8 . $val . '</font><br>';
                        break;
                    case 'movie':
                        $main .= '<font size="2">' . _MOV_TITLE8 . $val . '</font><br>';
                        break;
                    case 'html':
                        $main .= '<font size="2">' . _HTM_TITLE8 . $val . '</font><br>';
                        break;
                    case 'flash':
                        $main .= '<font size="2">' . _SWF_TITLE8 . $val . '</font><br>';
                        break;
                    case 'java':
                        $main .= '<font size="2">' . _JAV_TITLE6 . $val . '</font><br>';
                        break;
                    default:
                        break;
                }
                break;
            case 'url':
                switch ($media) {
                    case 'picture':
                    case 'music':
                    case 'movie':
                    case 'html':
                    case 'flash':
                    case 'java':
                        $url = $val;
                        break;
                    default:
                        break;
                }
                break;
            case 'copyright':
                switch ($media) {
                    case 'picture':
                    case 'music':
                    case 'movie':
                    case 'html':
                    case 'flash':
                    case 'java':
                        if ($url) {
                            $main .= ':<a href="' . $url . '">' . $val . '</a>';
                        }
                        break;
                    default:
                        break;
                }
                break;
            case 'date':
                switch ($media) {
                    case 'picture':
                    case 'music':
                    case 'movie':
                    case 'html':
                    case 'flash':
                    case 'java':
                        $main .= ':<i>' . $val . '</i>';
                        break;
                    default:
                        break;
                }
                break;
            case 'message':
                switch ($media) {
                    case 'picture':
                    case 'music':
                    case 'movie':
                    case 'html':
                    case 'flash':
                    case 'java':
                        $main .= '<br>' . $val . '<br><br>';
                        break;
                    default:
                        break;
                }
                break;
            case 'lyrics':
                $val = str_replace('[br]', '<br>', $val);
                $main .= '</td><td class="even" valign="bottom" align="left" width="40%"><font size="1">' . $val . '</font></td>';
                break;
            case 'explanation':
                $val = str_replace('[br]', '<br>', $val);
                $main .= '</td><td class="even" valign="bottom" align="left" width="40%"><font size="1">' . $val . '</font></td>';
                break;
            case 'controls':
                $options = explode('|', $val);
                switch ($media) {
                    case 'music':
                        $main .= "<td class=\"even\" valign=\"middle\" align=\"center\" width=\"30%\"><object id='MediaPlayer1' classid='CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6' width='$options[0]' height='$options[1]'><param name='AudioStream' value='-1'><param name='AutoSize' value='$options[3]'><param name='AutoStart' value='$options[2]'><param name='URL' value='"
                                 . $link
                                 . "'><param name='AnimationAtStart' value='0'><param name='AllowScan' value='-1'><param name='AllowChangeDisplaySize' value='-1'><param name='AutoRewind' value='$options[4]'><param name='Balance' value='$options[5]'><param name='BaseURL' value><param name='BufferingTime' value='$options[6]'><param name='CaptioningID' value><param name='ClickToPlay' value='0'><param name='CursorType' value='0'><param name='CurrentPosition' value='0'><param name='CurrentMarker' value='0'><param name='DefaultFrame' value><param name='DisplayBackColor' value='-1'><param name='DisplayForeColor' value='16777215'><param name='DisplayMode' value='-1'><param name='DisplaySize' value='-1'><param name='Enabled' value='-1'><param name='EnableContextMenu' value='-1'><param name='EnablePositionControls' value='-1'><param name='EnableFullScreenControls' value='-1'><param name='EnableTracker' value='-1'><param name='Filename' value><param name='InvokeURLs' value='-1'><param name='Language' value='-1'><param name='Mute' value='0'><param name='PlayCount' value='1'><param name='PreviewMode' value='1'><param name='Rate' value='1'><param name='SAMILang' value><param name='SAMIStyle' value><param name='SAMIFileName' value><param name='SelectionStart' value='-1'><param name='SelectionEnd' value='-1'><param name='SendOpenStateChangeEvents' Avalue='-1'><param name='SendWarningEvents' value='-1'><param name='SendErrorEvents' value='-1'><param name='SendKeyboardEvents' value='0'><param name='SendMouseClickEvents' value='0'><param name='SendMouseMoveEvents' value='0'><param name='SendPlayStateChangeEvents' value='-1'><param name='ShowCaptioning' value='0'><param name='ShowControls' value='$options[9]'><param name='ShowAudioControls' value='$options[10]'><param name='ShowDisplay' value='0'><param name='ShowGotoBar' value='0'><param name='ShowPositionControls' value='0'><param name='ShowStatusBar' value='$options[7]'><param name='ShowTracker' value='0'><param name='TransparentAtStart' value='0'><param name='VideoBorderWidth' value='0'><param name='VideoBorderColor' value='0'><param name='VideoBorder3D' value='0'><param name='Volume' value='$options[8]'><param name='WindowlessVideo' value='0'><!--NETSCAPE PLUG-IN STARTS HERE--><embed type='application/x-mplayer2' src='"
                                 . $link
                                 . "' name='NSPlay' pluginspage='http://www.microsoft.com/isapi/redir.dll?prd=windows&sbp=mediaplayer&ar=Media&sba=Plugin&' showcontrols='$options[9]' showdisplay='0' showstatusbar='0' autostart='false' width='$options[0]' height='$options[1]'></embed></object></td></tr>";
                        break;
                    case 'movie':
                        $main .= "<td class=\"even\" valign=\"middle\" align=\"center\" width=\"30%\"><object id='MediaPlayer1' classid='CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6' width='$options[0]' height='$options[1]'><param name='URL' value='"
                                 . $link
                                 . "'><param name='AudioStream' value='-1'><param name='AutoSize' value='$options[3]'><param name='AutoStart' value='$options[2]'><param name='AnimationAtStart' value='$options[11]'><param name='AllowScan' value='-1'><param name='AllowChangeDisplaySize' value='-1'><param name='AutoRewind' value='$options[4]'><param name='Balance' value='$options[5]'><param name='BaseURL' value><param name='BufferingTime' value='$options[6]'><param name='CaptioningID' value><param name='ClickToPlay' value='0'><param name='CursorType' value='0'><param name='CurrentPosition' value='0'><param name='CurrentMarker' value='0'><param name='DefaultFrame' value><param name='DisplayBackColor' value='-1'><param name='DisplayForeColor' value='16777215'><param name='DisplayMode' value='-1'><param name='DisplaySize' value='-1'><param name='Enabled' value='-1'><param name='EnableContextMenu' value='-1'><param name='EnablePositionControls' value='-1'><param name='EnableFullScreenControls' value='-1'><param name='EnableTracker' value='-1'><param name='Filename' value><param name='InvokeURLs' value='-1'><param name='Language' value='-1'><param name='Mute' value='0'><param name='PlayCount' value='1'><param name='PreviewMode' value='1'><param name='Rate' value='1'><param name='SAMILang' value><param name='SAMIStyle' value><param name='SAMIFileName' value><param name='SelectionStart' value='-1'><param name='SelectionEnd' value='-1'><param name='SendOpenStateChangeEvents' Avalue='-1'><param name='SendWarningEvents' value='-1'><param name='SendErrorEvents' value='-1'><param name='SendKeyboardEvents' value='0'><param name='SendMouseClickEvents' value='0'><param name='SendMouseMoveEvents' value='0'><param name='SendPlayStateChangeEvents' value='-1'><param name='ShowCaptioning' value='0'><param name='ShowControls' value='$options[9]'><param name='ShowAudioControls' value='$options[10]'><param name='ShowDisplay' value='0'><param name='ShowGotoBar' value='0'><param name='ShowPositionControls' value='0'><param name='ShowStatusBar' value='$options[7]'><param name='ShowTracker' value='0'><param name='TransparentAtStart' value='0'><param name='VideoBorderWidth' value='0'><param name='VideoBorderColor' value='0'><param name='VideoBorder3D' value='0'><param name='Volume' value='$options[8]'><param name='WindowlessVideo' value='0'><!--NETSCAPE PLUG-IN STARTS HERE--><embed type='application/x-mplayer2' src='"
                                 . $link
                                 . "' name='NSPlay' pluginspage='http://www.microsoft.com/isapi/redir.dll?prd=windows&sbp=mediaplayer&ar=Media&sba=Plugin&' showcontrols='$options[9]' showdisplay='0' showstatusbar='0' autostart='false' width='$options[0]' height='$options[1]'></embed></object></td></tr>";
                        break;
                    default:
                        break;
                }
                break;
            case 'onlinelink':
                switch ($media) {
                    case 'html':
                        $onlinelink = $val;
                        break;
                    case 'flash':
                        $options = explode('|', $val);
                        $doc = '<html><head><title>' . $title . "</title></head><body><div style='position:absolute;left:0px;top:0px;'><object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab' ";
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'width':
                                    $doc .= "width='" . $val . "' ";
                                    break;
                                case 'height':
                                    $doc .= "height='" . $val . "' ";
                                    break;
                                case 'hspace':
                                    $doc .= "hspace='" . $val . "' ";
                                    break;
                                case 'vspace':
                                    $doc .= "vspace='" . $val . "' ";
                                    break;
                                case 'align':
                                    $doc .= "align='" . $val . "' ";
                                    break;
                                case 'class':
                                    $doc .= "class='" . $val . "' ";
                                    break;
                                case 'id':
                                    $doc .= "id='" . $val . "' ";
                                    break;
                                case 'name':
                                    $doc .= "name='" . $val . "' ";
                                    break;
                                case 'style':
                                    $doc .= "style='" . $val . "' ";
                                    break;
                                case 'declare':
                                    $doc .= $val;
                                    break;
                                default:
                                    break;
                            }
                        }
                        $doc .= "><param name = 'movie' value ='" . $options[1] . "'>";
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'quality':
                                    $doc .= "<param name = 'quality' value ='" . $val . "'>";
                                    break;
                                case 'loop':
                                    $doc .= "<param name = 'loop' value ='" . $val . "'>";
                                    break;
                                case 'bgcolor':
                                    $doc .= "<param name = 'bgcolor' value ='" . $val . "'>";
                                    break;
                                case 'play':
                                    $doc .= "<param name = 'play' value ='" . $val . "'>";
                                    break;
                                case 'menu':
                                    $doc .= "<param name = 'menu' value ='" . $val . "'>";
                                    break;
                                case 'scale':
                                    $doc .= "<param name = 'scale' value ='" . $val . "'>";
                                    break;
                                case 'salign':
                                    $doc .= "<param name = 'salign' value ='" . $val . "'>";
                                    break;
                                case 'wmode':
                                    $doc .= "<param name = 'wmode' value ='" . $val . "'>";
                                    break;
                                default:
                                    break;
                            }
                        }
                        $doc .= "<embed pluginspage='http://www.macromedia.com/go/getflashplayer' ";
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'width':
                                    $doc .= "width='" . $val . "' ";
                                    break;
                                case 'height':
                                    $doc .= "height='" . $val . "' ";
                                    break;
                                case 'hspace':
                                    $doc .= "hspace='" . $val . "' ";
                                    break;
                                case 'vspace':
                                    $doc .= "vspace='" . $val . "' ";
                                    break;
                                case 'align':
                                    $doc .= "align='" . $val . "' ";
                                    break;
                                case 'class':
                                    $doc .= "class='" . $val . "' ";
                                    break;
                                case 'id':
                                    $doc .= "id='" . $val . "' ";
                                    break;
                                case 'name':
                                    $doc .= "name='" . $val . "' ";
                                    break;
                                case 'style':
                                    $doc .= "style='" . $val . "' ";
                                    break;
                                default:
                                    break;
                            }
                        }
                        $doc .= "type = 'application/x-shockwave-flash' ";
                        if (true === array_key_exists('declare', $obj)) {
                            $doc .= $obj['declare'] . ' ';
                        }
                        $doc .= "src = '" . $options[1] . "' ";
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'quality':
                                    $doc .= "quality = '" . $val . "' ";
                                    break;
                                case 'loop':
                                    $doc .= "loop = '" . $val . "' ";
                                    break;
                                case 'bgcolor':
                                    $doc .= "bgcolor = '" . $val . "' ";
                                    break;
                                case 'play':
                                    $doc .= "play = '" . $val . "' ";
                                    break;
                                case 'menu':
                                    $doc .= "menu = '" . $val . "' ";
                                    break;
                                case 'scale':
                                    $doc .= "scale = '" . $val . "' ";
                                    break;
                                case 'salign':
                                    $doc .= "salign = '" . $val . "' ";
                                    break;
                                default:
                                    break;
                            }
                        }
                        $doc .= '></embed></object></div></body></html>';
                        $doc = addslashes($doc);

                        if (true === array_key_exists('width', $obj)) {
                            $x = $obj['width'];
                        } else {
                            $x = 640;
                        }
                        if (true === array_key_exists('height', $obj)) {
                            $y = $obj['height'];
                        } else {
                            $y = 480;
                        }

                        if (false === mb_strpos($options[0], 'http://')) {
                            $main .= "<td class=\"even\" valign=\"bottom\" align=\"center\" width=\"30%\"><font size=\"2\"><a href=\"javascript:popUp('" . $doc . "','" . $x . "','" . $y . "')\">" . $options[0] . '</a></font></td></tr>';
                        } else {
                            $main .= "<td class=\"even\" valign=\"bottom\" align=\"center\" width=\"30%\"><font size=\"2\"><a href=\"javascript:popUp('" . $doc . "','" . $x . "','" . $y . "')\"><img src=\"" . $options[0] . '" border="0"></a></font></td></tr>';
                        }
                        break;
                    case 'java':
                        $onlinelink = $val;
                        $options = explode('|', $val);
                        $doc = '<html><head><title>' . $title . "</title></head><body><div style='position:absolute;left:0px;top:0px;'><applet codebase='" . mb_substr($options[1], 0, mb_strrpos($options[1], '/') + 1) . "' code='" . mb_substr(
                            $options[1],
                            mb_strrpos($options[1], '/') + 1,
                            mb_strlen($options[1]) - mb_strrpos($options[1], '/') - 1
                        ) . "' ";
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'width':
                                    $doc .= "width='" . $val . "' ";
                                    break;
                                case 'height':
                                    $doc .= "height='" . $val . "' ";
                                    break;
                                case 'hspace':
                                    $doc .= "hspace='" . $val . "' ";
                                    break;
                                case 'vspace':
                                    $doc .= "vspace='" . $val . "' ";
                                    break;
                                case 'align':
                                    $doc .= "align='" . $val . "' ";
                                    break;
                                case 'class':
                                    $doc .= "class='" . $val . "' ";
                                    break;
                                case 'id':
                                    $doc .= "id='" . $val . "' ";
                                    break;
                                case 'name':
                                    $doc .= "name='" . $val . "' ";
                                    break;
                                case 'style':
                                    $doc .= "style='" . $val . "' ";
                                    break;
                                case 'declare':
                                    $doc .= $val;
                                    break;
                                default:
                                    break;
                            }
                        }
                        $doc .= '>';
                        foreach ($obj as $key => $val) {
                            switch ($key) {
                                case 'width':
                                case 'height':
                                case 'hspace':
                                case 'vspace':
                                case 'align':
                                case 'class':
                                case 'id':
                                case 'name':
                                case 'style':
                                case 'declare':
                                    break;
                                default:
                                    $doc .= "<param name = '" . $key . "' value ='" . $val . "'>";
                                    break;
                            }
                        }
                        $doc .= '</applet></div></body></html>';
                        $doc = addslashes($doc);
                        break;
                    default:
                        break;
                }
                break;
            case 'offlinelink':
                switch ($media) {
                    case 'html':
                        if ($onlinelink) {
                            $options = explode('|', $onlinelink);

                            if (false === mb_strpos($options[0], 'http://')) {
                                $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '" target="_blank">' . $options[0] . '</a></font>';
                            } else {
                                $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '" target="_blank"><img src="' . $options[0] . '" border="0"></a></font>';
                            }

                            if ($val) {
                                $options = explode('|', $val);

                                if (false === mb_strpos($options[0], 'http://')) {
                                    $main .= '<br><font size="2"><a href="' . $options[1] . '">' . $options[0] . '</a></font></td></tr>';
                                } else {
                                    $main .= '<br><font size="2"><a href="' . $options[1] . '"><img src="' . $options[0] . '" border="0"></a></font></td></tr>';
                                }
                            } else {
                                $main .= '</td></tr>';
                            }
                        } else {
                            if ($val) {
                                $options = explode('|', $val);

                                if (false === mb_strpos($options[0], 'http://')) {
                                    $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '">' . $options[0] . '</a></font></td></tr>';
                                } else {
                                    $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '"><img="' . $options[0] . '" border="0"></a></font></td></tr>';
                                }
                            } else {
                                $main .= '<td class="even" valign="bottom" align="center" width="30%"></td></tr>';
                            }
                        }
                        break;
                    case 'java':
                        if ($onlinelink) {
                            $options = explode('|', $onlinelink);

                            if (false === mb_strpos($options[0], 'http://')) {
                                $link_obj = $options[0];
                            } else {
                                $link_obj = '<img src="' . $options[0] . '" border="0">';
                            }

                            if (true === array_key_exists('width', $obj)) {
                                $x = $obj['width'];
                            } else {
                                $x = 640;
                            }

                            if (true === array_key_exists('height', $obj)) {
                                $y = $obj['height'];
                            } else {
                                $y = 480;
                            }

                            $main .= "<td class=\"even\" valign=\"bottom\" align=\"center\" width=\"30%\"><font size=\"2\"><a href=\"javascript:popUp('" . $doc . "','" . $x . "','" . $y . "')\">" . $link_obj . '</a></font>';

                            if ($val) {
                                $options = explode('|', $val);

                                if (false === mb_strpos($options[0], 'http://')) {
                                    $main .= '<br><font size="2"><a href="' . $options[1] . '">' . $options[0] . '</a></font></td></tr>';
                                } else {
                                    $main .= '<br><font size="2"><a href="' . $options[1] . '"><img src="' . $options[0] . '" border="0"></a></font></td></tr>';
                                }
                            } else {
                                $main .= '</td></tr>';
                            }
                        } else {
                            if ($val) {
                                $options = explode('|', $val);

                                if (false === mb_strpos($options[0], 'http://')) {
                                    $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '">' . $options[0] . '</a></font></td></tr>';
                                } else {
                                    $main .= '<td class="even" valign="bottom" align="center" width="30%"><font size="2"><a href="' . $options[1] . '"><img="' . $options[0] . '" border="0"></a></font></td></tr>';
                                }
                            } else {
                                $main .= '<td class="even" valign="bottom" align="center" width="30%"></td></tr>';
                            }
                        }
                        break;
                    default:
                        break;
                }
                break;
            default:
                if (false !== mb_strpos($key, 'flash-controls')) {
                    $options = explode('=', $val);

                    $options[0] = trim($options[0]);

                    $options[1] = trim($options[1]);

                    $obj[$options[0]] = $options[1];
                }
                if (false !== mb_strpos($key, 'java-controls')) {
                    $options = explode('=', $val);

                    $options[0] = trim($options[0]);

                    $options[1] = trim($options[1]);

                    $obj[$options[0]] = $options[1];
                }
                break;
        }
    }
}

//--------------------------------------------
// main
//--------------------------------------------
$xoopsTpl->assign('notice', _MAIN_NOTICE);
switch ($media) {
    case 'music':
        $main = '<table width="100%" border="1"><tr><td class="head" valign="middle" align="center" width="30%">'
                . _MUS_TITLE1
                . '</td><td class="head" valign="middle" align="center" width="40%">'
                . _MUS_TITLE2
                . '</td><td class="head" valign="middle" align="center" width="30%">'
                . _MUS_TITLE3
                . '</td></tr>';
        break;
    case 'movie':
        $main = '<table width="100%" border="1"><tr><td class="head" valign="middle" align="center" width="30%">'
                . _MOV_TITLE1
                . '</td><td class="head" valign="middle" align="center" width="40%">'
                . _MOV_TITLE2
                . '</td><td class="head" valign="middle" align="center" width="30%">'
                . _MOV_TITLE3
                . '</td></tr>';
        break;
    case 'html':
        $main = '<table width="100%" border="1"><tr><td class="head" valign="middle" align="center" width="30%">'
                . _HTM_TITLE1
                . '</td><td class="head" valign="middle" align="center" width="40%">'
                . _HTM_TITLE2
                . '</td><td class="head" valign="middle" align="center" width="30%">'
                . _HTM_TITLE3
                . '</td></tr>';
        break;
    case 'flash':
        $main = "<script>function popUp(DOC,X,Y) {day = new Date();id = day.getTime();eval(\"page\" + id + \" = window.open(\\\"\\\", '\" + id + \"', 'toolbar=0,scrollbars=auto,location=0,status=1,menubar=0,resizable=1,width=\" + X + \",height=\" + Y + \"');\"); eval(\"page\" + id + \".document.write(DOC);\");}</script><table width=\"100%\" border=\"1\"><tr><td class=\"head\" valign=\"middle\" align=\"center\" width=\"30%\">"
                . _SWF_TITLE1
                . '</td><td class="head" valign="middle" align="center" width="40%">'
                . _SWF_TITLE2
                . '</td><td class="head" valign="middle" align="center" width="30%">'
                . _SWF_TITLE3
                . '</td></tr>';
        break;
    case 'java':
        $main = "<script>function popUp(DOC,X,Y) {day = new Date();id = day.getTime();eval(\"page\" + id + \" = window.open(\\\"\\\", '\" + id + \"', 'toolbar=0,scrollbars=auto,location=0,status=1,menubar=0,resizable=1,width=\" + X + \",height=\" + Y + \"');\"); eval(\"page\" + id + \".document.write(DOC);\");}</script><table width=\"100%\" border=\"1\"><tr><td class=\"head\" valign=\"middle\" align=\"center\" width=\"30%\">"
                . _JAV_TITLE1
                . '</td><td class="head" valign="middle" align="center" width="40%">'
                . _JAV_TITLE2
                . '</td><td class="head" valign="middle" align="center" width="30%">'
                . _JAV_TITLE3
                . '</td></tr>';
        break;
    default:
        $main = '';
        break;
}

$status = 'Off';
$link = '';
$url = '';
$media_store = '';
$onlinelink = '';
$title = '';
$obj = [];
$doc = '';
$menu_cnt = -1;
$page_cnt = 1;
foreach ($conring_info as $level1) {
    foreach ($level1 as $level2) {
        foreach ($level2 as $level3) {
            foreach ($level3 as $key => $val) {
                $val = strip_tags($val);

                switch ($key) {
                    case 'media':
                        $media_store = $val;
                        break;
                    case 'page':
                        if ($media_store == $media && $sel == $menu_cnt) {
                            $page_cnt++;
                        }
                        break;
                    default:
                        break;
                }

                if ($media_store == $media && $sel == $menu_cnt && $page_cnt == $page) {
                    switch ($key) {
                        case 'status':
                            $status = $val;
                            $url = '';
                            $link = '';
                            $onlinelink = '';
                            $title = '';
                            $obj = [];
                            $doc = '';
                            break;
                        default:
                            media_show($key, $status, $media_store, $link, $url, $onlinelink, $title, $obj, $doc, $val, $main);
                            break;
                    }
                }

                if ('menu' == $key) {
                    $menu_cnt++;

                    if ($menu_cnt == $sel && $media_store == $media) {
                        if (false === mb_strpos($val, 'http://')) {
                            $xoopsTpl->assign('title', $val);
                        } else {
                            $dum = explode('|', $val);

                            $xoopsTpl->assign('title', '<img src="' . $dum[0] . '" border="0" alt="' . $dum[1] . '">');
                        }
                    }
                }
            }
        }
    }
}

switch ($media) {
    case 'music':
    case 'movie':
    case 'html':
    case 'flash':
    case 'java':
        $main .= '</table>';
        break;
    default:
        break;
}

if ($page_cnt > 1) {
    for ($i = 1; $i <= $page_cnt; $i++) {
        if ($i == $page) {
            $main .= '|' . $i;
        } else {
            $main .= '|<a href="./show.php?media=' . $media . '&sel=' . $sel . '&page=' . $i . '">' . $i . '</a>';
        }
    }

    $main .= '|';
}

$xoopsTpl->assign('main', $main);
// including footer of xoops
require XOOPS_ROOT_PATH . '/footer.php';
// done
