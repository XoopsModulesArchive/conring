<?php

include '../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/include/comment_constants.php';
$com_id = (isset($_GET['com_id'])) ? (int)$_GET['com_id'] : 0;
if ($com_id > 0) {
    $commentHandler = xoops_getHandler('comment');

    $comment = $commentHandler->get($com_id);

    if (is_object($comment)) {
        $moduleHandler = xoops_getHandler('module');

        $module = $moduleHandler->get($comment->getVar('com_modid'));

        $comment_config = $module->getInfo('comments');

        header(
            'Location: '
            . XOOPS_URL
            . '/modules/'
            . $module->getVar('dirname')
            . '/'
            . $comment_config['pageName']
            . '?'
            . $comment_config['itemName']
            . '='
            . $comment->getVar('com_itemid')
            . '&com_id='
            . $comment->getVar('com_id')
            . '&com_rootid='
            . $comment->getVar('com_rootid')
            . '&com_mode=thread&'
            . str_replace('&amp;', '&', $comment->getVar('com_exparams'))
            . '#comment'
            . $comment->getVar('com_id')
        );

        exit();
    }
}
header('Location: ' . XOOPS_URL . '/search.php');
