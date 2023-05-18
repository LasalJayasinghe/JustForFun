<?php

class PostDetails extends Controller{
    
    public function index(){
        $postid = $_GET['id'];

        $comms = new Comment();
        $forum = new Forums();

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            $content = trim($_POST['content']);
            if (!empty($content)) {
                // Create a new Comment instance
                if(isset($_SESSION['USER_DATA']['username'])){
                    $author = $_SESSION['USER_DATA']['username'];
                }elseif(isset($_SESSION['USER_DATA']['name'])){
                    $author = $_SESSION['USER_DATA']['name'];
                }else{
                    $author = 'Anonymous';
                }
                $new_comment_data = [
                    'postId' => $postid,
                    'content' => $content,
                    'author' => $author
                ];
                

                // Save the new Comment instance to the database using the insert method
                if ($comms->insert($new_comment_data)) {
                    // Redirect back to the same page to display the updated list of comments
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit;
                } else {
                    // Handle any errors during saving
                    echo "Error saving comment";die;
                }
            } else {
                // Handle validation errors
                echo "Error validating comment";die;
            }
        }

        $data['post'] = $forum->first(["postId"=>$postid]);
        $data['comments'] = $comms->getcomments($postid);

        $data['title'] = "postdetails";

        $this->view('postdetails',$data);
    }

}
