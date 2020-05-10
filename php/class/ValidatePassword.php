<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidatePassword{

        public function compare(string $pass1, string $pass2): bool{

            if(strcasecmp($pass1, $pass2) != 0)
                return false;
               
            return true;

        }

        public function examine(string $pass, int $countChar): int{ 

            if(strlen($pass) < $countChar)
                return -1;
            
            $reg = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?!.* )(?=.*[!@#\$%\^&\*])/";    
        
            if(!preg_match($reg, $pass))
                return 0;
                
            return 1;

        }


    }


?>