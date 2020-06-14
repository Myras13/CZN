<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/model/M_EditRecipe.php');
    require_once(dirname(__DIR__).'/model/M_EditIngredients.php');
    
    $data['name_of_recipe'] = (isset($_POST['name_of_recipe']) && $_POST['name_of_recipe'] != '') ? htmlspecialchars($_POST['name_of_recipe']) : null;
    $data['text_of_recipe'] = (isset($_POST['text_of_recipe']) && $_POST['name_of_recipe'] != '') ? htmlspecialchars($_POST['text_of_recipe']) : null;
    $data['type_recipe'] = (isset($_POST['type_recipe']) && $_POST['type_recipe'] != '' && intval($_POST['type_recipe']) != 0) ? htmlspecialchars($_POST['type_recipe']) : null;
    $data['id'] = (isset($_POST['id_recipe']) && $_POST['id_recipe'] != '' && intval($_POST['id_recipe']) != 0) ? htmlspecialchars($_POST['id_recipe']) : null;

    $host  = $_SERVER['HTTP_HOST'];

    foreach($data as $value){
        if($value == null){
            
            $alertInfo = new SessionNotifications('alert', 'Przepis nie został zaaktualizowany', "Spróbuj ponownie.");
            $alertInfo->create();   
            $_SESSION['backrouteUpdateRecipe'] = (isset($_SESSION['backrouteUpdateRecipe'])) ? $_SESSION['backrouteUpdateRecipe'] : "http://$host/CZN/index.php";         
            header("Location: ".$_SESSION['backrouteUpdateRecipe']."");
            return;

        }

    }

    $postValues = array();
    foreach($_POST as $key => &$value){
        $flag = preg_match('/^((component-)|(quantity-)|(measure-))([0-9]{1,3})$/', $key);
        if($flag)
            $postValues[$key] = htmlspecialchars($value);
    }
  
    foreach($_POST as $key => &$value){
        $flag = preg_match('/^(id-)([0-9]{1,2})$/', $key);
        if($flag)
            $postId[$key] = htmlspecialchars($value);
    }
    

    var_dump($postId);
    var_dump($postValues);
    $updateRecipe = new M_EditRecipe($data['name_of_recipe'], $data['text_of_recipe'], $data['type_recipe']);
    $updateRecipe->setID($data['id']);
    $updateRecipe->update();
    
    $updateIngredients = new M_EditIngredients($postId, $postValues);
    $updateIngredients->setID($data['id']);
    $updateIngredients->update();

    $succesInfo = new SessionNotifications('success', 'Udało się', "Przepis został edytowany");
    $succesInfo->create();            
    header("Location: http://$host/CZN/recipe.php?id=".$data['id']."");
    

?>