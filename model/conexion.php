<?php 

class Conection{
    private $server = "127.0.0.1:3307";
    private $user = "root";
    private $password ="luisnunura123456";
    private $db ="wallet";

    public function Connect(){
        try {
            $db = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user,$this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
    public static function sentencia($sql){
        $db = new Conection();
        $conn = $db->Connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $date = $stmt->fetchAll(PDO::FETCH_NUM);
        if($date != null){
            return $date;
        }
        else {return null;}
    }
    public static function ejecucion($sql,$array){
        $db = new Conection();
        $conn = $db->Connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($array);
        if($stmt->affected_rows){
            return true;
        }//end if
        return false;
        
    }
}
?>