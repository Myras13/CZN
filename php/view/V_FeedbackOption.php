<?php

    require_once(dirname(__DIR__).'/controller/C_FeedbackOption.php'); 

    
?>
<label for="message-type">Typ wiadomości</label><br/>
<select id="message-type" name='message_type'>

    <?php foreach($option as $element): ?>

        <option value="<?php echo $element['title_message']?>" > <?php echo $element['title_message']?> </option>

    <?php endforeach; ?>

</select>
