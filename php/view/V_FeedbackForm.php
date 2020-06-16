<?php

    require_once(dirname(__DIR__).'/controller/C_FeedbackOption.php'); 
    $email = (isset($_SESSION["email"]))? $_SESSION["email"]: null;
    
?>

<div id="feedbackForm">
    <div id="feedbackTitle">
        <label for="title" style="">Tytuł</label><br/>
        <input id="title" name="title" type="text" required/><br/><br/>

        <?php if(!isset($_SESSION['LogInActive'])):?>
            <label for="email">Pseudonim</label><br/>
            <input id="nick" name="nick" type="text" required/><br/><br/>

            <label for="email">Email</label><br/>
            <input id="email" name="email" type="email" required/><br/><br/>
        <?php else:?>
            <input name="nick" type="hidden" value="<?php echo $_SESSION['nick']; ?>"/>
        <?php endif;?>

        <label for="message-type">Typ wiadomości</label><br/>
        <select id="message-type" name='message_type'>

            <?php foreach($option as $element): ?>

                <option value="<?php echo $element['id']?>" > <?php echo $element['title_message']?> </option>

            <?php endforeach; ?>

        </select><br/><br/>
    </div>

    <div id="feedbackMessage">
        <label for="message">Treść wiadomości</label><br/>
        <textarea id="message" name="message" placeholder="Napisz wiadomość" required></textarea><br/>

        <input type="submit" value="Wyślij wiadomość" style="padding: 5px;"/>
    </div>
</div>