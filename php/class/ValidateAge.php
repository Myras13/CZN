<?php

    require_once(dirname(__DIR__).'/classException/ValidateDataUserException.php');

    class ValidateAge{

        public function checkAge(string $age, int $minAge = 12):bool{

            $ageUser = (int)substr($age, 0, 4);
            $todayYear = (int)date("Y");

            if($todayYear - $ageUser < $minAge)
                throw new ValidateDataUserException('Aby móc korzystać z serwisu musisz mieć co najmniej '.$minAge.' lat.',4);

            return true;                

        }

    }


?>