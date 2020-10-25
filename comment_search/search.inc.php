<?php

function comm_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;

    $sql = 'SELECT c.com_id, c.com_modified, c.com_uid, c.com_title, m.name FROM ' . $xoopsDB->prefix('xoopscomments') . ' c,' . $xoopsDB->prefix('modules') . ' m  WHERE com_status=2 AND c.com_modid=m.mid ';

    if (0 != $userid) {
        $sql .= ' AND c.com_uid=' . $userid . ' ';
    }

    // because count() returns 1 even if a supplied variable

    // is not an array, we must check if $querryarray is really an array

    if (is_array($queryarray) && $count = count($queryarray)) {
        $sql .= " AND ((com_title LIKE '%$queryarray[0]%' OR com_text LIKE '%$queryarray[0]%')";

        for ($i = 1; $i < $count; $i++) {
            $sql .= " $andor ";

            $sql .= "(com_title LIKE '%$queryarray[$i]%' OR com_text LIKE '%$queryarray[$i]%')";
        }

        $sql .= ') ';
    }

    $sql .= 'ORDER BY com_modified DESC';

    $result = $xoopsDB->query($sql, $limit, $offset);

    $ret = [];

    $i = 0;

    while (false !== ($myrow = $xoopsDB->fetchArray($result))) {
        $ret[$i]['link'] = 'index.php?com_id=' . $myrow['com_id'];

        $ret[$i]['title'] = '[' . $myrow['name'] . '] ' . $myrow['com_title'];

        $ret[$i]['time'] = $myrow['com_modified'];

        $ret[$i]['uid'] = $myrow['com_uid'];

        $i++;
    }

    return $ret;
}
