<?php

class Comment extends Model{

    protected $table = "comments";
    public $errors = [];
    public $allowed = ['postId','author','content'];

    public function getcomments($postid){
        return $this->whereOrder(['postId'=>$postid],'timestamp','desc');
    }

    public function savecomment($postid,$content,$owner){
        $this->postId = $postid;
        $this->content = $content;
        $this->owner = $owner;
        return $this->save();
    }

    public function deleteComments($id){
        if($this->queryin($query="DELETE FROM comments WHERE commentID = :comment_id",['comment_id'=>$id])){
            return true;
        }
    }
}
