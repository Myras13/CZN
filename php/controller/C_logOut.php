<?php

    require_once('../class/SessionUser.php');

    SessionUser::destroy();

    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CZN");

?>