<?php

class Model extends Database{

    protected $table;
    public $errors = [];
    public $allowed = [];

    public function insert($data){
        if(!empty($this->allowed)){
            foreach($data as $key => $value){
                if(!in_array($key, $this->allowed)){
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $values = array_values($data);

        
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$keys).') VALUES (:'.implode(',:',$keys).')';
        if($this->queryin($query, $data)){
            return true;
        }
        return false;

    }

    public function where($data){
        
        $keys = array_keys($data);

        $query = 'SELECT * FROM '.$this->table.' WHERE ';

        foreach ($keys as $key) {
            $query .= $key.' = :'.$key.' AND ';
        }

        $query = trim($query, ' AND ');
        $res = $this->query($query, $data);

        if(is_array($res)){
            return $res;
        }
        return false;

    }

    public function whereOrder($data, $orderColumn, $order='desc'){
            
            $keys = array_keys($data);
    
            $query = 'SELECT * FROM '.$this->table.' WHERE ';
    
            foreach ($keys as $key) {
                $query .= $key.' = :'.$key.' AND ';
            }
    
            $query = trim($query, ' AND ');
            $query .= ' ORDER BY '.$orderColumn.' '.$order;
    
            $res = $this->query($query, $data);
    
            if(is_array($res)){
                return $res;
            }
            return false;
    
    }

    public function first($data){
        $keys = array_keys($data);
        $query = 'SELECT * FROM '.$this->table.' WHERE ';

        foreach ($keys as $key) {
            $query .= $key.' = :'.$key.' AND ';
        }

        $query = trim($query, ' AND ');

        $res = $this->query($query, $data);

        if(is_array($res)){
            return $res[0];
        }
        return false;
    }

    public function findall(){
            
        $query = 'SELECT * FROM '.$this->table.'';

        $res = $this->query($query);

        if(is_array($res)){
            return $res;
        }
        return false;

}

    public function firstOp($data)
    {       
        $keys = array_keys($data);

        $query = "select * from ".$this->table." where ";
        foreach ($keys as $key){
            $query .= $key . "=:" . $key. " && ";
        }
        $query = trim($query,"&& ");
        $query .= " order by opid desc limit 1";
        $res = $this->query($query,$data);

        if(is_array($res))
        {
            return $res[0];
        }

        return false;
    }
    


    public function update($id, $data = [])
    {

        if (!empty($this->allowed)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowed)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        // $values = array_values($data);

        $query = "update " . $this->table . " set ";

        foreach ($keys as $key) {
            $query .= $key ."=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where id = :id";
        $data['id'] = $id;
        
        $this->query($query, $data);
    }


//works
    public function showdata($data)
    {
        $keys = array_keys($data);
        $query = 'SELECT * FROM fuelstock WHERE ';
        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ' ';
        }
        $query = trim($query, ",");
        $query .= 'ORDER BY fid DESC LIMIT 6';
        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res;
        }
        return false;
    }

    public function count($table, $field = 'account_status') {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE $field = 1";
        $result = $this->query($sql);
        return $result[0]['count'];
    }

    public function getRegistered($table) {
        $sql = "SELECT COUNT(*) as count FROM $table";
        $result = $this->query($sql);
        return $result[0]['count'];
    }
    

}
