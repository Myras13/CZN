<?php

    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    if(!SessionNotifications::isAlive()){

        $context = null;

    }
    else{

        $context['mode'] = $_SESSION["mode"];
        $context['content'] = $_SESSION["content"];
        $context['title'] = $_SESSION["title"];
        SessionNotifications::destroy();

    }

?>