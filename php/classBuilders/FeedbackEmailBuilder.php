<?php

    require_once(dirname(__DIR__).'/class/ManagementEmail.php');

    class FeedbackEmailBuilder extends ManagementEmail{

        public function setMessage(array $data){

            $text = "Typ wiadomości: <br>".$data['type']."<br><br>";
            $text.= "Typ wiadomości: <br>".$data['content'];
            $this->message = $text;

        }

    }

?>