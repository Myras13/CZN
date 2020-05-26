<?php
 
    require_once(dirname(__DIR__).'/classDirector/DirectorEmail.php'); 
    require_once(dirname(__DIR__).'/classBuilders/FeedbackEmailBuilder.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');
    require_once(dirname(__DIR__).'/class/QuerySQL.php');
    require_once(dirname(__DIR__).'/class/ValidateEmail.php');
    require_once(dirname(__DIR__).'/model/M_FeedbackSQL.php');

    if (session_status() == PHP_SESSION_NONE)
        session_start();

    $data['title'] = (isset($_POST['title']) && !empty($_POST['title'])) ? htmlspecialchars($_POST['title']) : null;  

    if(isset($_POST['email']) && !empty($_POST['email']))
        $data['email'] = htmlspecialchars($_POST['email']);  
    elseif(isset($_SESSION["email"]))
        $data['email'] = $_SESSION["email"];
    else
        $data['email'] = null;

    $data['id_type'] = (isset($_POST['message_type']) && !empty($_POST['message_type'])) ? htmlspecialchars($_POST['message_type']) : null;
    $data['message'] = (isset($_POST['message']) && !empty($_POST['message']) ) ? htmlspecialchars($_POST['message']) : null;
    $data['nick'] = (isset($_POST['nick']) && !empty($_POST['nick'])) ? htmlspecialchars($_POST['nick']) : null;
    
    $host  = $_SERVER['HTTP_HOST'];

    foreach ($data as &$value) {
        if($value == null){
           
            $alertInfo = new SessionNotifications('alert', 'Wiadomość nie została wysłana', "Wypełnione pola nie przeszły poprawnie walidacji.");
            $alertInfo->create();            
            header("Location: http://$host/CZN/feedback.php");
            return;

        }
    }

    $feedbackSQL = new M_FeedbackSQL();
    $stmt = $feedbackSQL->getTitleMessage($data['id_type'], 'type_feedback', 'title_message');
    $data['message_type'] = $stmt[0]['title_message'];


    $sendEmail = new DirectorEmail(new FeedbackEmailBuilder());
    $sendEmail->setArrayDataContact($data);

    if($sendEmail->send()){
        $feedbackSQL->add($data);
        $successInfo = new SessionNotifications('success', 'Wiadomość została wysłana', "Wiadomość została wysłana do nas. Proszę o cierpliwość. Ktoś skontaktuję się z Tobą. Obserwuj pocztę.");
        $successInfo->create(); 
    }
    else{
        $errorInfo = new SessionNotifications('error', 'Wiadomość nie została wysłana.', "Coś poszło nie tak. Spróbuj jeszcze raz.");
        $errorInfo->create();
    }

    header("Location: http://$host/CZN/feedback.php"); 

?>