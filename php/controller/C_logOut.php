<?php

    require_once(dirname(__DIR__).'/class/SessionUser.php');

    SessionUser::destroy();

    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CZN");

?>