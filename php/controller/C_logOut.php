<?php

    require_once(dirname(__DIR__).'/class/SessionUser.php');

    $reflector = new ReflectionClass('SessionUser');
    $instance = $reflector->newInstanceWithoutConstructor();
    $instance->destroy();

    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/CZN");

?>