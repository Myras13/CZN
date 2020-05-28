<?php

    require_once(dirname(__DIR__).'/model/M_PaginatorDraw.php');

    $limit = 10;
    $flagmode = false;

    $page = (isset($_GET['page'])) ? intval($_GET['page'] - 1): 0;
    $page = ($page >= 0) ? $page: 0;

    $paginator['page'] = 0;
    $paginator['allPages'] = 0;

    if(isset($_GET['category'])){
        $flagmode = true;
        $idcategory = intval($_GET['category']);
        $categrypages = new M_PaginatorDraw($limit);
        $categrypages->setCurrentyPage($page);
        $categrypages->countTypePages($idcategory);

        $paginator['page'] = $categrypages->getPage();
        $paginator['allPages'] = $categrypages->getAllPages();

        $data = $categrypages->getDataType($idcategory);
    }

    if($flagmode == false){
        $flagmode = true;
        $allPages = new M_PaginatorDraw($limit);
        $allPages->setCurrentyPage($page);

        $paginator['page'] = $allPages->getPage();
        $paginator['allPages'] = $allPages->getAllPages();

        $data = $allPages->getDataAll();
    }

    if($flagmode == true)
        foreach ($data as &$value)
            $value['content'] = substr($value['content'], 0, 300).'...';

?>