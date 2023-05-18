<?php 

class Forum extends Controller{
    
    public function index(){
        $user = $_SESSION['type'];
        $data['title'] = "forum";
        $forum = new Forums();

        // Fetch filter inputs
        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
        $user_search = isset($_GET['user_search']) ? $_GET['user_search'] : null;
        $search_words = isset($_GET['search_words']) ? $_GET['search_words'] : null;

        // Pass the filter inputs to the model method
        $data['posts'] = $forum->getposts($start_date, $end_date, $user_search, $search_words);

        if(array_key_exists('submit', $_POST)){
            $data['newpost'] = []; 
            $data['newpost']['title'] = $_POST['title'];
            $data['newpost']['content'] = $_POST['content'];
            $data['newpost']['type'] = "post";

            if($user == 'admin'){
                if($_POST['type']){
                    $data['newpost']['type'] = $_POST['type'];
                }
                $data['newpost']['admin'] = Auth::getusername();
            }elseif($user == 'org'){
                $data['newpost']['BRN'] = Auth::getusername();
            }elseif($user == 'station'){
                $data['newpost']['station'] = Auth::getusername();
            }elseif($user == 'customer'){
                $data['newpost']['customer'] = Auth::getusername();
            }

            if($forum->insert($data['newpost'])){
                $popup = "successfully Added new ".$data['newpost']['type'];
                redirect('forum');
            }else{
                $popup = "Failed to add new ".$data['newpost']['type'];
            }
            }

        $data['announcements'] = $forum->getannouncements();
        $this->view('forum',$data);
    }

}

