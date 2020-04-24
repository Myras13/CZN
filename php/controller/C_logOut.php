<?php

    require_once('../class/SessionUser.php');

    $handle = new SessionUser();
    $handle->destroy();

    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CZN");

?>