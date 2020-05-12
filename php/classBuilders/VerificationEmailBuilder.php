<?php

    require_once(dirname(__DIR__).'/class/ManagementEmail.php');

    class VerificationEmailBuilder extends ManagementEmail{

        public function setMessage(array $data){

            $text = 'Dziękujemy za rejestracje na stronie CZN.';
            $text .= 'Tutaj masz link weryfikacyjny, który pozwoli ci aktywować konto na naszej stronie:';
            $text .= 'http://'.$data['server'].'/CZN/veracc.php?id='.$data['id'].' . Wystarczy na niego tylko kliknąć.';
            $this->message = $text;

        }

    }

?>