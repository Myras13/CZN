<?php
 
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

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
        $flag = preg_match('/^((component-)|(quantity-)|(measure-))([0-9]{1,2})$/', $key);
        if($flag)
            $postValues[$key] = htmlspecialchars($value);
    }


    var_dump($_POST)

?>