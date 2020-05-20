<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php'); 

    class M_FeedbackSQL{

        private $pdo;

        public function __construct(){

            try{

                $this->pdo  = new ConnectDatabase();
    
            }catch(PDOException $e){
    
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
                $errorInfo->create();            
                header("Location: http://$host/CZN");
                
            }

        }

        public function __destruct(){

            $this->pdo->disconnect();
            $this->user = null;
            
        }

        public function add(array $user):bool{

            $sthPDO = $this->pdo->getPDO();
            $sth = $sthPDO->prepare("INSERT INTO feedback (`id_type`, `nick`, `email`, `title`, `message`) VALUES 
                (:id_type, :nick, :email, :title, :message)"
            );

            $sth->bindValue(':id_type', $user['id_type'], PDO::PARAM_INT);
            $sth->bindValue(':nick', $user['nick'], PDO::PARAM_STR);
            $sth->bindValue(':email', $user['email'], PDO::PARAM_STR);
            $sth->bindValue(':title', $user['title'], PDO::PARAM_STR);
            $sth->bindValue(':message', $user['message'], PDO::PARAM_STR);
            $result = $sth->execute();

            $sth->closeCursor();
            unset($sth);

            if($result)
                return true;
            else
                return false;

        }

    }

?>