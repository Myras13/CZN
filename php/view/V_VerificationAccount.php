<?php

    require_once(dirname(__DIR__).'/controller/C_VerificationAccount.php');
    $host = $_SERVER['HTTP_HOST'];

?>
<!-- Gdy sejsa użytkownika istnieje -->
<?php if(isset($_SESSION["LogInActive"]) || $processStatus == false): ?>

    <div class="statusInfo">
        <p>Konto zostało już wcześniej zweryfikowane.</p>
        <p>Za chwilę zostaniesz przeniesiony na główna stronę.</p>
    </div>

<?php
    header("Refresh:5; url=http://$host/CZN/index.php", true, 303);
    return;
    endif; 
?>

<!-- Gdy super globalna zmienna get istnieje - sprawdzenie statusu zapytania -->
<?php if($processStatus):?>

    <div class="statusInfo">
        <p>Konto zostało zweryfikowane.</p>
        <p>Za chwilę zostaniesz przeniesiony do sekcji logowania</p>
    </div>

<?php
    header("Refresh:3; url=http://$host/CZN/logowanie_rejestracja.php", true, 303);
    return;
    endif; 
?>

<?php
    header("Location: http://$host/CZN/index.php", true, 303);
?>