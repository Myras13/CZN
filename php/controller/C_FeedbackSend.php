<?php
 
    require_once(dirname(__DIR__).'/classDirector/DirectorEmail.php'); 
    require_once(dirname(__DIR__).'/classBuilders/FeedbackEmailBuilder.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    $data['title'] = (isset($_POST['title']) && !empty($_POST['title'])) ? htmlspecialchars($_POST['title']) : null;
    $data['email'] = (isset($_POST['email']) && !empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : null;
    $data['message_type'] = (isset($_POST['message_type']) && !empty($_POST['message_type'])) ? htmlspecialchars($_POST['message_type']) : null;
    $data['message'] = (isset($_POST['message']) && !empty($_POST['message']) ) ? htmlspecialchars($_POST['message']) : null;
    $nick = (isset($_POST['nick']) && !empty($_POST['nick'])) ? htmlspecialchars($_POST['nick']) : 'Gość';
    
    $host  = $_SERVER['HTTP_HOST'];

    foreach ($data as &$value) {
        if($value == null){
           
            $alertInfo = new SessionNotifications('alert', 'Wiadomość nie została wysłana', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/feedback.php");
            return;

        }
    }

    $sendEmail = new DirectorEmail(new FeedbackEmailBuilder());
    $sendEmail->setNick($nick);
    $sendEmail->setArrayDataContact($data);

    if($sendEmail->send()){
        $successInfo = new SessionNotifications('success', 'Wiadomośc została wysłana', "Wiadomość została wysłana do nas. Proszę o cierpliwość. Ktoś skontaktuję się z Tobą. Obserwuj pocztę.");
        $successInfo->create(); 
    }
    else{
        $errorInfo = new SessionNotifications('error', 'Wiadomość nie została wysłana.', "Coś poszło nie tak. Spróbuj jeszcze raz.");
        $errorInfo->create();
    }

    header("Location: http://$host/CZN/feedback.php"); 

?>