<?php

    $host  = $_SERVER['HTTP_HOST'];

    if(isset($_SESSION["LogInActive"]) ||!isset($_GET['id']) || intval($_GET['id']) == 0 || !isset($_GET['idt'])):
        header("Location: http://$host/CZN/index.php");
        return;
        
    else:
        $id = htmlspecialchars($_GET['id']); 
        $idt = htmlspecialchars($_GET['idt']);
?>

    <div class="form-recovery-password" id="o_nas">
        <span class="name">System odzyskiwania hasła</span>
        <form action="php/controller/C_SetNewPassword.php" method="post">

            <input name="id"  value=<?php echo $id?>  type="hidden"/>
            <input name="idt" value=<?php echo $idt?> type="hidden"/>  

            <br/>
            <label for="login_e-mail">Podaj hasło</label><br/>
            <input id="recovery-password" name="recovery-password" type="password" required/><br/><br/>

            <label for="login_password">Powtórz hasło:</label><br/>
            <input id="login_password" name="recovery-password-repeat" type="password" required/><br/><br/>

            <input type="submit" value="Zmień hasło"/>
        </form>
    </div> 
<?php 
    endif;
?>