<?php

class Database
{
    private function connect()
    {
        $str =DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        $con = new PDO($str,DBUSER,DBPASS);
        return $con;
    }

    public function query($query , $data =[] , $type = 'object')
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        if($stm)
        {
            $check = $stm->execute($data);
            if($check)
            {
                if($type == 'object')
                {
                    $type = PDO::FETCH_OBJ;
                }else{
                    $type = PDO::FETCH_ASSOC; 
                }

                $result = $stm->fetchAll($type);
                if(is_array($result) && count($result) > 0)
                {
                    return $result;

                }
            }
          }
        return false;
    }

    public function create_tables()
    {
        //Organisation Admin
        $query ="
        CREATE TABLE IF NOT EXISTS `org_admin` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `CompanyName` varchar(255) NOT NULL,
            `BRN` int(11) NOT NULL,
            `Email` varchar(255) NOT NULL,
            `MobileNo` int(12) NOT NULL,
            `password_hash` varchar(255) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `BRN` (`BRN`),
            UNIQUE KEY `MobileNo` (`MobileNo`)
           ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4
        ";

        $this->query($query);
    }
}