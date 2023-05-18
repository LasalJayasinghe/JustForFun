<?php 

class Org_forumslist extends Controller{
    
    public function index(){
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


            $data['newpost']['BRN'] = Auth::getbrn();


            if($forum->insert($data['newpost'])){
                $popup = "successfully Added new ".$data['newpost']['type'];
                redirect('Org_forumlitst');
            }else{
                $popup = "Failed to add new ".$data['newpost']['type'];
            }
            }

        $data['announcements'] = $forum->getannouncements();
        $this->view('Organization/forumlist',$data);
    }

}

