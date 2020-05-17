<?php

    require_once(dirname(__DIR__).'/class/ManagementEmail.php');

    class FeedbackEmailBuilder extends ManagementEmail{

        public function setMessage(array $data){

            $text = "<b>Wiadomość od:</b> <br>".$data['email']."<br><br>";
            $text.= "<b>Typ wiadomości:</b> <br>".$data['type']."<br><br>";
            $text.= "<b>Treść wiadomości:</b> <br>".$data['content'];
            $this->message = $text;

        }

    }

?>