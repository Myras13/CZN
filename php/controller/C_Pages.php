<?php

    require_once(dirname(__DIR__).'/model/M_PaginatorDraw.php');

    $limit = 5;
    $flagmode = false;

    $page = (isset($_GET['page'])) ? intval($_GET['page']) - 1: 0;
    $page = ($page >= 0) ? $page: 0;

    $paginator['page'] = 0;
    $paginator['allPages'] = 0;

    if(isset($_GET['search']) && $_GET['search']="ByIngredients" && $flagmode == false){

        $flagmode = true;   
        foreach($_GET as $key => $value){ 
            $flag = preg_match('/^(components)([0-9]{1,2})$/', $key);
            if($flag){
                if(($_GET[$key] == '')){ 
                    unset($_GET[$key]);
                    continue;
                }
                else
                    $components[$key] = htmlspecialchars($value);
            }

        }

        if(isset($_GET['mode']) && count($_GET) <= 2 || !isset($_GET['mode']) && count($_GET) <= 1)
            return;

        $mode = (isset($_GET['mode']))?"AND":"OR";
        
        $ingredients = new M_PaginatorDraw($limit);
        $ingredients->setCurrentyPage($page);
        $isExists = $ingredients->countPagesByIngredients($components, $mode);
        
        if($isExists == false)
            return false;

        $paginator['page'] = $ingredients->getPage();
        $paginator['allPages'] = $ingredients->getAllPages();

        $data = $ingredients->getDataSearchRecipeByIngredients();
    }

    else if(isset($_GET['category']) && $flagmode == false){
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

    if($flagmode == true && isset($data) && $data!= false){
        foreach ($data as &$value){
            if (strlen($value['content']) > 500) {
                $value['content'] = wordwrap($value['content'], 500, "~&#");
                $value['content'] = substr($value['content'], 0, strpos($value['content'], "~&#"));
            }

            $value['content'] = $value['content'].'...';
        }
    }
?>