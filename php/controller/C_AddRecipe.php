<?php

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/model/M_AddRecipe.php');
    require_once(dirname(__DIR__).'/model/M_AddIngredients.php');
    

    $data['name_of_recipe'] = (isset($_POST['name_of_recipe']) && $_POST['name_of_recipe'] != '') ? htmlspecialchars($_POST['name_of_recipe']) : null;
    $data['text_of_recipe'] = (isset($_POST['text_of_recipe']) && $_POST['name_of_recipe'] != '') ? htmlspecialchars($_POST['text_of_recipe']) : null;
    $data['type_recipe'] = (isset($_POST['type_recipe']) && $_POST['type_recipe'] != '' && intval($_POST['type_recipe']) != 0) ? htmlspecialchars($_POST['type_recipe']) : null;
    
    $host  = $_SERVER['HTTP_HOST'];

    foreach($data as $value){
        if($value == null){
           
            $alertInfo = new SessionNotifications('alert', 'Przepis nie został dodany', "Spróbuj ponownie.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/add_recipe.php");
            return;

        }

    }

    $postValues = array();
    foreach($_POST as $key => &$value){
        $flag = preg_match('/^((component-)|(quantity-)|(measure-))([0-9]{1,3})$/', $key);
        if($flag)
            $postValues[$key] = htmlspecialchars($value);
    }


    $newRecipe = new M_AddRecipe($data['name_of_recipe'], $data['text_of_recipe'], $data['type_recipe']);
    $newRecipe->setUser($_SESSION['id']);
    $idNewRecipe = $newRecipe->add();
    
    $newIngredients = new M_AddIngredients($idNewRecipe, $postValues);
    $newIngredients->add();

    $succesInfo = new SessionNotifications('success', 'Udało się', "Przepis został dodany");
    $succesInfo->create();            
    header("Location: http://$host/CZN/recipe.php?id=$idNewRecipe");

?>