<?php

class Database{

    protected $pdo;

    public function __construct() {
        $this->pdo = $this->connect();
    }
    
    private function connect(){
        
        $str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($str, 'root', '');
        return $con;
    }

    public function query($query, $data = []){
        $con = $this->connect();
        $stmt = $con->prepare($query);
        if($stmt){

            $check = $stmt->execute($data);
            if($check){
                $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($result && count($result)>0){
                    return $result;
                }
                else {
                    $queryresult = "No Results Found";
                }
            }
        } 
        return false;
    }

    public function queryin($query, $data = []){
        $con = $this->connect();
        $stmt = $con->prepare($query);

        if($stmt){
            return $stmt->execute($data);
        } 
        return false;
    }

}
?>

