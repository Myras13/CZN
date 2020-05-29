<?php

    require_once(dirname(__DIR__).'/controller/C_SessionNotifications.php');

?>

<?php if (!empty($context)): ?>

    <div class="<?php echo $context['mode'] ?>">
        <input type="button" name="close" value="X" onclick="parentNode.remove()"/>   
        <div id="title"> <h2><?php echo $context['title'] ?></h2></div>
        <div id="content"> <p><?php echo $context['content'] ?> </p></div>   
    </div>

<?php endif; ?>

