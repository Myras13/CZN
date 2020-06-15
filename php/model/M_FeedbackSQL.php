<?php

    require_once(dirname(__DIR__).'/core/ConnectDatabase.php'); 
    require_once(dirname(__DIR__).'/class/QuerySQL.php');
    require_once(dirname(__DIR__).'/class/SessionNotifications.php');

    class M_FeedbackSQL{

        private $pdo;
        private $qSQL;

        public function __construct(){

            try{

                $this->pdo = new ConnectDatabase();
                $this->qSQL = new QuerySQL($this->pdo);
    
            }catch(PDOException $e){
                
                $host = $_SERVER['HTTP_HOST'];
                $errorInfo = new SessionNotifications('error', 'Błąd krytyczny',"Nie udało połączyć się z bazą danych.");
                $errorInfo->create();            
                header("Location: http://$host/CZN/break.php");
                
            }

        }

        public function __destruct(){

            $this->pdo->disconnect();
            $this->user = null;
            
        }

        public function getTitleMessage(int $id, string $tableSQL, string $columnSQL = "*"){

            return $this->qSQL->getValueById($id, $tableSQL, $columnSQL);

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