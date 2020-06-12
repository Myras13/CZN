<?php

$isSetSession = false;

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["LogInActive"]))
    $isSetSession = true;
        
?>

<div id="topbar">
    <ol>
        <li><a href="index.php">Strona główna</a></li>
        <li><a href="#">Przepisy</a>
            <ul>
                <?php require_once(dirname(__DIR__).'/php/view/V_ShowTypeRecipe.php'); ?>
            </ul>
        </li>
        <li><a href="o_nas.php">O nas</a></li>
        <li><a href="#">Konto</a>
            <ul>
                <?php if($isSetSession):?>
                    <li><a href='add-recipe.php'>Dodaj przepis</a></li>
                    <li><a href='account.php'>Zmień dane</a></li>
                    <li><a href='php/controller/C_logOut.php'>Wyloguj</a></li>
                <?php else:?>
                    <li><a href='logowanie_rejestracja.php'>Zaloguj się / Zarejestruj</a></li>
                <?php endif;?>
            </ul>
        </li>  
    </ol>
    <?php if($isSetSession):?>
        <div id='welcome'>Witaj <?php echo $_SESSION["nick"] ?></div>
    <?php endif;?>  
</div>