<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidateAge{

        public function checkAge(string $age, int $minAge = 12){

            $ageUser = (int)substr($age, 0, 4);
            $todayYear = (int)date("Y");

            if($todayYear - $ageUser < $minAge)
                return false;

            return true;                

        }

    }


?>