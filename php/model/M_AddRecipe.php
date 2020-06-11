<?php

    require_once(dirname(__DIR__).'/class/ManagementRecipe.php'); 

    class M_AddRecipe extends ManagementRecipe{

        private $user;
        private $date;

        public function __construct(string $title, string $text, int $type){

            parent::__construct();
            $this->title = $title;
            $this->text = $text;
            $this->type = $type;
            $this->date = date("Y-m-d");

        }

        public function setUser(string $nick){

            $this->user = nick;

        }

        public function add(){



        }

    }


?>