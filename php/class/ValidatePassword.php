<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidatePassword{

        public function compare(string $pass1, string $pass2): bool{

            if(strcasecmp($pass1, $pass2) != 0)
                throw new ValidateDataUserException('Podane hasła są różne.',1);
               
            return true;

        }

        public function examine(string $pass, int $countChar): bool{ 

            if(strlen($pass) < $countChar)
                throw new ValidateDataUserException('Hasło musi mieć co najmniej '.$countChar.' znaków.',2);
            
            $reg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.* )(?=.*[!@#\$%\^&\*])/";    
        
            if(!preg_match($reg, $pass))
                throw new ValidateDataUserException('Hasło musi mieć co najmniej:</br>- 1 wielki znak,</br>- 1 mały znak, </br>- 1 liczbę,</br>- Nie mieć białych znaków(spacja, tabulacja).',3);
        
        
            return true;

        }


    }


?>