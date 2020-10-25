<?php

// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <https://www.xoops.org>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //
include 'admin_header.php';
include '../include/functions.php';
global $settings;
//--------------------------------------------
// get POST & GET Environment Variable
//--------------------------------------------
foreach ($_POST as $k => $v) {
    ${$k} = $v;
}

foreach ($_GET as $k => $v) {
    ${$k} = $v;
}

//-----------------------------------------------
// main
//-----------------------------------------------

xoops_cp_header();
$settings = store_settings();

function conringEdt($sel, $edt)
{
    global $settings;

    $settings[$sel][1] = $edt;

    put_settings($settings);
}

function conringAdd($edt)
{
    global $settings;

    $target = ['0', $edt];

    $settings[] = $target;

    put_settings($settings);
}

function conringSel($sel)
{
    global $settings;

    $i = 0;

    foreach ($settings as $eachSet) {
        if ('1' == $eachSet[0]) {
            $settings[$i][0] = '0';
        }

        $i++;
    }

    $settings[$sel][0] = '1';

    put_settings($settings);
}

function conringDel($sel)
{
    global $settings;

    $i = 0;

    $settings2 = [];

    foreach ($settings as $eachSet) {
        if ($i != $sel) {
            $settings2[] = $eachSet;
        }

        $i++;
    }

    put_settings($settings2);
}

function conringAdmin()
{
    global $settings;

    //	get selected index

    $i = 0;

    $idx = 0;

    foreach ($settings as $eachSet) {
        if ('1' == $eachSet[0]) {
            $idx = $i;
        }

        $i++;
    }

    echo '<h2>' . _AD_TITLE . '</h2>';

    //	change select

    OpenTable();

    echo '<h2>' . _AD_SEL . '</h2>';

    echo "<form action=\"index.php?com=Sel\" method=\"POST\">\n";

    echo "<select name=\"sel\">\n";

    $i = 0;

    foreach ($settings as $eachSet) {
        if ('1' == $eachSet[0]) {
            echo '<option value="' . $i . '" selected>' . $eachSet[1] . "\n";
        } else {
            echo '<option value="' . $i . '">' . $eachSet[1] . "\n";
        }

        $i++;
    }

    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;\n";

    echo '<input type="submit" value="' . _AD_SEL . "\">\n";

    echo "</form>\n";

    CloseTable();

    //	setting file add

    OpenTable();

    echo '<h2>' . _AD_ADD . '</h2>';

    echo "<form action=\"index.php?com=Add\" method=\"POST\">\n";

    echo "<input type=\"text\" name=\"add\" value=\"\" size=\"30\" maxlength=\"100\">\n";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;\n";

    echo '<input type="submit" value="' . _AD_ADD . "\">\n";

    echo "</form>\n";

    CloseTable();

    //setting file edt

    OpenTable();

    echo '<h2>' . _AD_EDT . '</h2>';

    echo '<form action="index.php?com=Edt&sel=' . $idx . "\" method=\"POST\">\n";

    echo '<input type="text" name="edt" value="' . $settings[$idx][1] . "\" size=\"30\" maxlength=\"100\">\n";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;\n";

    echo '<input type="submit" value="' . _AD_EDT . "\">\n";

    echo "</form>\n";

    CloseTable();

    // setting file delete

    OpenTable();

    echo '<h2>' . _AD_DEL . '</h2>';

    echo "<form action=\"index.php?com=Del\" method=\"POST\">\n";

    echo "<select name=\"sel\">\n";

    echo "<option value=\"-1\">----------\n";

    $i = 0;

    $j = 0;

    foreach ($settings as $eachSet) {
        if ('1' != $eachSet[0]) {
            if (0 == $j) {
                echo '<option value="' . $i . '" selected>' . $eachSet[1] . "\n";
            } else {
                echo '<option value="' . $i . '">' . $eachSet[1] . "\n";
            }

            $j = 1;
        }

        $i++;
    }

    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;\n";

    echo '<input type="submit" value="' . _AD_DEL . "\">\n";

    echo "</form>\n";

    CloseTable();
}

switch ($com) {
    case 'Edt':
        conringEdt($sel, $edt);
        break;
    case 'Add':
        conringAdd($add);
        break;
    case 'Sel':
        conringSel($sel);
        break;
    case 'Del':
        conringDel($sel);
        $settings = store_settings();
        // no break
    default:
        break;
}
conringAdmin();
include 'admin_footer.php';
