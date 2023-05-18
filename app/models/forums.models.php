<?php

class Forums extends Model{

    protected $table = "ForumPosts";
    public $errors = [];
    public $allowed = ['title','content','type','BRN','admin','ownerID'];

    public function getposts($dateFrom = null, $dateTo = null, $author = null, $keywords = null) {
        $data = ['type' => 'post'];
        $query = 'SELECT * FROM ' . $this->table . ' WHERE type = :type';
    
        if ($dateFrom) {
            $query .= ' AND timestamp >= :dateFrom';
            $data['dateFrom'] = $dateFrom;
        }
    
        if ($dateTo) {
            $query .= ' AND timestamp <= :dateTo';
            $data['dateTo'] = $dateTo;
        }
    
        if ($author) {
            $query .= ' AND (admin = :author OR ownerID = :author OR BRN = :author)';
            $data['author'] = $author;
        }
    
        if ($keywords) {
            $query .= ' AND (title LIKE :keywords OR content LIKE :keywords)';
            $data['keywords'] = '%' . $keywords . '%';
        }
    
        $query .= ' ORDER BY timestamp DESC';
    
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            return $res;
        }
        return false;
    }
    
    public function getannouncements(){
        return $this->where(['type'=>'announce']);
    }

    public function deletePosts($id){
        if($this->queryin($query="DELETE FROM ForumPosts WHERE postID = :post_id",['post_id'=>$id])){
            return true;
        }
    }

    
}
