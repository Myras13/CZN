<?php

    require_once(dirname(__DIR__).'/model/M_PaginatorDraw.php');

    $page = (isset($_GET['page'])) ? intval($_GET['page'] - 1): 1;
    $page = ($page >= 0) ? $page: 1;
    $limit = 10;

    $allPages = new M_PaginatorDraw($limit);
    $allPages->setCurrentyPage($page);
    $data = $allPages->getDataAll();

    foreach ($data as &$value){

        $value['content'] = substr($value['content'], 0, 300).'...';

    }


?>