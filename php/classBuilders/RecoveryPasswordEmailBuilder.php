<?php

    require_once(dirname(__DIR__).'/class/ManagementEmail.php');

    class RecoveryPasswordEmailBuilder extends ManagementEmail{

        public function setMessage(array $data){

            $text = '<h3>System odzyskiwania hasła</h3>';
            $text .= '<p>Aby zmienić hasło, kliknij w poniższy link</p>';
            $text .= '<p>http://'.$data['server'].'/CZN/recoverypass.php?id='.$data['id'].'&idt='.$data['token'].'</p>';
            $this->message = $text;

        }

    }


?>