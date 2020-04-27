<?php

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $reflector = new ReflectionClass('SessionNotifications');
    $instance = $reflector->newInstanceWithoutConstructor();

    if(!$instance->isAlive()){

        $context = null;

    }
    else{

        $context['mode'] = $_SESSION["mode"];
        $context['content'] = $_SESSION["content"];
        $context['title'] = $_SESSION["title"];
        $instance->destroy();

    }

?>