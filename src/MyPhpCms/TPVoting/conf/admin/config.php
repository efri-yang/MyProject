<?php
use \think\Request;
$basename = Request::instance()->root();
if (pathinfo($basename, PATHINFO_EXTENSION) == 'php') {
    $basename = dirname($basename);
}
return [
    'template' => [
        'layout_on' => true,
        'layout_name' => 'layout',
        'layout_item' => '{__REPLACE__}',

    ],
    'view_replace_str' => [
        '__ROOT__' => $basename,
        '__STATIC__' => $basename . '/static/admin',
        '__AVATAR__' => $basename . '/uploads/admin/avatar/',
    ],
]

?>