<?php

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class Stationadmin extends Controller
{
   public function index($fid = null, $opid = null, $id = null)
   {
      if (!Auth::logged_in()) {
         message('Please loginto the admin page');
         redirect('station_login');
      }

      $operators = new Operators();
      $fuelstock = new Fuelstock();
      $stations = new Stations();

      $station_id = Auth::getStation_id();
      $data = [];
      $data['fid'] = $fid;
      $data['opid'] = $opid;
      $data['id'] = $id;


      $data['oprows'] = $operators->where(['station_id' => $station_id]);
      $data['rows'] = $fuelstock->showdata(['station_id' => $station_id]);
      $data['strow'] = $stations->where(['station_id' => $station_id]);

      $data['title'] = "Dash";
      $this->view('stationadmin/dash', $data);
   }

   public function profile($id = null)
   {
      if (!Auth::logged_in()) {
         message('Please loginto the admin page');
         redirect('station_login');
      }

      $id = $id ?? Auth::getId();
      $stations = new Stations();
      $data['row'] = $stations->first(['id' => $id]);

      $data['title'] = "Profile";

      $this->view('stationadmin/profile', $data);
   }

   public function profileupdate($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }

      $stations = new Stations();
      $id = Auth::getId();
      $data['row'] = $row = $stations->first(['id' => $id]);

      if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
         if ($result = $stations->validate6($_POST)) {

            $newemail = $_POST['email'];
            $currentemail = $row['email'];
            $queryy = "select * from stations where email = :email limit 1";

            if ($newemail !== $currentemail) {
               if ($stations->query($queryy, ['email' => $newemail])) {
                  $stations->errors['email'] = "That email already exists";
               }
            }
            if (empty($stations->errors)) {
               $stations->update($id, $_POST);
               redirect('stationadmin/profile');
            }
         }
      }
      $data['errors'] = $stations->errors;
      $data['title'] = "Profileupdate";
      $this->view('stationadmin/profileupdate', $data);
   }

   public function profilepasswordupdate($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }

      $stations = new Stations();
      $id = Auth::getId();
      $data['row'] = $row = $stations->first(['id' => $id]);

      if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
         if ($result = $stations->validate5($_POST)) {

            $old_password = $_POST['oldPassword'];
            $new_password = $_POST['password'];
            $confirm_password = $_POST['c_np'];

            // Validate old password
            if (!password_verify($old_password, $row['password'])) {
               $stations->errors['oldPassword'] = 'Old password is incorrect.';
            }
            // Validate new password
            // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $new_password)) {
            //    $stations->errors['password'] = 'Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.';
            // }
            if (!preg_match('/^[0-9a-zA-Z]{6}$/', $new_password)) {
               $stations->errors['password'] = 'Password must contain at least 6 characters';
            } elseif ($new_password !== $confirm_password) {
               $stations->errors['c_np'] = 'Passwords do not match.';
            }

            if (empty($stations->errors)) {
               $stations->update($id, ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
               redirect('stationadmin/profile');
            }
         }
      }

      $data['errors'] = $stations->errors;
      $data['title'] = "Profile password update";
      $this->view('stationadmin/profilepasswordupdate', $data);
   }

   //operators add
   public function operatoradd($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $data['errors'] = [];
      $operators = new Operators();

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
         // if ($result = $operators->validate($_POST)) {
            // $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $operators->insert($_POST);

            $name = $_POST["fname"];
            $email = $_POST["email"];
            $subject = "your password is:";
            $message = $_POST["password"];

            $mail = new PHPMailer(true);

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fuelupthirani33@gmail.com'; // Replace with your email address
            $mail->Password = 'fhjagepbyykdkonu'; // Replace with your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            // Sender and recipient configuration
            $mail->addAddress($email, $name);
            $mail->setFrom("fuelupthirani33@gmail.com", "From Station"); // Replace with the recipient's email address and name

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            // Send the email
            try {
               $mail->send();
               message("sent password");
               redirect('stationadmin/operators');
            } catch (Exception $e) {
               echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
            redirect('stationadmin/operators');
         
      }

      $data['errors'] = $operators->errors;
      $data['title'] = "Operatoradd";

      $this->view('stationadmin/operatoradd', $data);
   }

   //operators view
   public function operators($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $operators = new Operators();
      $station_id = Auth::getStation_id();
      $data['rows'] =  $operators->where(['station_id' => $station_id]);

      $data['title'] = "operators";
      $this->view('stationadmin/operators', $data);
   }

   //operator update
   public function operatorupdate($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $operators = new Operators();
      $station_id = Auth::getStation_id();
      $op_id = "opid";
      $data['opid'] = $id;
      $data['row'] = $oprow = $operators->firstOp(['opid' => $id]);
      //get information
      $data['prow'] = $operators->where(['station_id' => $station_id, 'opid' => $id]);

      if ($_SERVER['REQUEST_METHOD'] == "POST" && $oprow) {
         if ($result = $operators->validate2($_POST)) {

            $newemail = $_POST['email'];
            $currentemail = $oprow['email'];
            $queryy = "select * from operators where email = :email limit 1";
            $newid = $_POST['employee_id'];
            $currentid = $oprow['employee_id'];

            if ($newid !== $currentid) {
               if ($operators->where(['employee_id' => $newid])) {
                  $operators->errors['employee_id'] = "Employee id is already exists";
               }
            }
            if ($newemail !== $currentemail) {
               if ($operators->query($queryy, ['email' => $newemail])) {
                  $operators->errors['email'] = "That email already exists";
               }
            }
            if (empty($operators->errors)) {
               $operators->opupdate($id, $_POST, $op_id);
               redirect('stationadmin/operators');
            }
         }
      }

      $data['title'] = "operatorupdate";
      $data['errors'] = $operators->errors;
      $this->view('stationadmin/operatorupdate', $data);
   }





   //works
   public function deleteEmployee($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $operators = new Operators();
      $station_id = Auth::getStation_id();
      $data['opid'] = $id;
      //get information
      $data['row'] = $operators->where(['station_id' => $station_id, 'opid' => $id]);
      $station_id = Auth::getStation_id();
      $operators->opdelete($station_id, $id);

      redirect('stationadmin/operators');
      // $this->view('stationadmin/transactionhistory', $data);
   }




   public function opchangepassword($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $data['errors'] = [];
      $operators = new Operators();
      $station_id = Auth::getStation_id();

      $op_id = "opid";
      $data['opid'] = $id;
      $data['row'] = $oprow = $operators->first(['opid' => $id]);

      //get information
      $data['row'] = $operators->where(['station_id' => $station_id, 'opid' => $id]);
      if ($_SERVER['REQUEST_METHOD'] == "POST" && $oprow) {
         if ($result = $operators->validate1($_POST)) {
            $operators->opupdate($id, $_POST, $op_id);
            redirect('stationadmin/operators');
         }
      }
      $data['errors'] = $operators->errors;
      $data['title'] = "opchangepassword";
      $this->view('stationadmin/opchangepassword', $data);
   }










   //restock fuel
   public function fuelrestockform($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $id = Auth::getStation_id();
      $stations = new Stations();
      $fuelstock = new Fuelstock();

      $data['id'] = $id;

      $data['row'] = $row = $stations->firstOp(['station_id' => $id]);

      $ava_Petrol92 = $data['row']['petrol92_tank'] - $data['row']['petrol92_bal'];
      $ava_Petrol95 = $data['row']['petrol95_tank'] - $data['row']['petrol95_bal'];
      $ava_Diesel = $data['row']['dieselauto_tank'] - $data['row']['dieselauto_bal'];
      $ava_Superdiesel = $data['row']['dieselsuper_tank'] - $data['row']['dieselsuper_bal'];

      // print($ava_Petrol92);
      // print($ava_Petrol95);
      // print($ava_Diesel);
      // print($ava_Superdiesel);


      if ($_SERVER['REQUEST_METHOD'] == "POST") {
         if ($result = $fuelstock->validate($_POST)) {

            if ($_POST['fuel_type'] == 'Petrol92') {
               if ($_POST['fuel_amount'] > $ava_Petrol92 || $_POST['fuel_amount'] > $data['row']['petrol92_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'Petrol95') {
               if ($_POST['fuel_amount'] > $ava_Petrol95 || $_POST['fuel_amount'] > $data['row']['petrol95_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'Auto Diesel') {
               if ($_POST['fuel_amount'] > $ava_Diesel || $_POST['fuel_amount'] > $data['row']['dieselauto_tank']) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if ($_POST['fuel_type'] == 'Super Diesel' || $_POST['fuel_amount'] > $data['row']['dieselsuper_tank']) {
               if ($_POST['fuel_amount'] > $ava_Superdiesel) {
                  $fuelstock->errors['fuel_amount'] = "Tank capacity is not enough";
               }
            }
            if (empty($fuelstock->errors)) {
               $fuelstock->insert($_POST);

               if ($_POST['fuel_type'] == 'Petrol95') {
                  $fuel_type = 'Petrol95';
               }
               if ($_POST['fuel_type'] == 'Petrol92') {
                  $fuel_type = 'Petrol92';
               }
               if ($_POST['fuel_type'] == 'Auto Diesel') {
                  $fuel_type = 'dieselauto';
               }
               if ($_POST['fuel_type'] == 'Super Diesel') {
                  $fuel_type = 'dieselsuper';
               }
               $fuel_amount = $_POST['fuel_amount'];
               $stations->insertremainingfuel($id, $fuel_type, $fuel_amount);
               // show($_POST);
               redirect('stationadmin');
            }
         }
      }

      $data['errors'] = $fuelstock->errors;
      $data['title'] = "fuelstockform";
      $this->view('stationadmin/fuelrestockform', $data);
   }






   // public function fuelstock($fid = null)
   // {
   //    if (!Auth::logged_in()) {
   //       message('please login to view the admin section');
   //       redirect('station_login');
   //    }

   //    $fuelstock = new Fuelstock();
   //    $station_id = Auth::getStation_id();
   //    $data = [];
   //    $data['fid'] = $fid;

   //    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
   //    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
   //    $user_search = isset($_GET['fuel_search']) ? $_GET['fuel_search'] : null;

   //    $data['rows'] = $fuelstock->getfueldetails(['station_id' => $station_id]);

   //    // $data['rows'] = $fuelstock->where(['station_id' => $station_id]);

   //    $data['title'] = "fuelstock";
   //    $this->view('stationadmin/fuelstock', $data);
   // }


   public function fuelstock($fid = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }

      $fuelstock = new Fuelstock();
      $station_id = Auth::getStation_id();
      $data = [];

      $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
      $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
      $user_search = isset($_GET['fuel_search']) ? $_GET['fuel_search'] : null;

      // Retrieve fuel stock data
      $data['rows'] = $fuelstock->getFuelStock($start_date, $end_date, $user_search, $station_id, $data);

      $data['title'] = "Fuel Stock";
      $this->view('stationadmin/fuelstock', $data);
   }






   //transaction history view
   public function transactionhistory()
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }

      $transactions = new Transaction();
      $station_id = Auth::getStation_id();
      $data = [];
      // $data['id'] = $id;

      $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
      $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
      $user_search = isset($_GET['fuel_search']) ? $_GET['fuel_search'] : null;
      $search_employee = isset($_GET['fuel_search']) ? $_GET['fuel_search'] : null;
      
      $data['rows'] = $transactions->gettransaction($start_date, $end_date, $user_search,$search_employee, $station_id, $data);
   
      $data['title'] = "transactionhistory";
      $this->view('stationadmin/transactionhistory', $data);
   }


   // public function transactionhistory($id = null)
   // {
   //    if (!Auth::logged_in()) {
   //       message('please login to view the admin section');
   //       redirect('station_login');
   //    }

   //    $transactions = new Transactions();
   //    $station_id = Auth::getStation_id();
   //    $data = [];
   //    $data['id'] = $id;
      

   //    $data['rows'] = $transactions->where(['station_id' => $station_id]);
   //    $data['title'] = "transactionhistory";
   //    $this->view('stationadmin/transactionhistory', $data);
   // }




   //remaining fuel view
   public function remainingfuel($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $stations = new stations();
      $station_id = Auth::getStation_id();
      $data = [];
      $data['id'] = $id;


      $data['rows'] = $stations->where(['station_id' => $station_id]);
      $data['title'] = "Remainingfuel";

      $this->view('stationadmin/remainingfuel', $data);
   }





   //works
   //works
   public function deleteFuel($id = null)
   {
      if (!Auth::logged_in()) {
         message('please login to view the admin section');
         redirect('station_login');
      }
      $fuelstock = new Fuelstock();
      $stations = new Stations();
      $station_id = Auth::getStation_id();
      $data['fid'] = $id;
      $data['frow'] = $fuelstock->where(['station_id' => $station_id, 'fid' => $id]);

      if ($data['frow'][0]['fuel_type'] == 'Petrol95') {
         $ftype = 'Petrol95';
      }
      if ($data['frow'][0]['fuel_type'] == 'Petrol92') {
         $ftype = 'Petrol92';
      }
      if ($data['frow'][0]['fuel_type'] == 'Auto Diesel') {
         $ftype = 'dieselauto';
      }
      if ($data['frow'][0]['fuel_type'] == 'Super Diesel') {
         $ftype = 'dieselsuper';
      }

      // $ftype = $data['frow'][0]['fuel_type'];
      $famount = $data['frow'][0]['fuel_amount'];

      $station_id = Auth::getStation_id();
      $stations->removedeletedfuel($station_id, $ftype, $famount);
      $fuelstock->fueldetaildelete($station_id, $id);
      redirect('stationadmin/fuelstock');
   }














   // public function forums($id = null)
   // {
   //    if (!Auth::logged_in()) {
   //       message('please login to view the admin section');
   //       redirect('station_login');
   //    }
   //    $user = $_GET['user'];
   //    // show($user);
   //    // die;
   //    $data['title'] = "forums";
   //    $forums = new Forums();
   //    $station_name = Auth::getStation_name();


   //    if (array_key_exists('submit', $_POST)) {
   //       $data['newpost'] = [];
   //       $data['newpost']['title'] = $_POST['title'];
   //       $data['newpost']['content'] = $_POST['content'];
   //       $data['newpost']['type'] = "post";
   //       $data['newpost']['station'] = "Samantha";

   //       // if ($user == 'station') {
   //       //    $data['newpost']['type'] = "post";
   //       //    $data['newpost']['station'] = "Samantha";
   //       // } elseif ($user == 'org') {
   //       //    $data['newpost']['BRN'] = Auth::getusername();
   //       // } elseif ($user == 'admin') {
   //       //    $data['newpost']['admin'] = Auth::getusername();
   //       // } elseif ($user == 'customer') {
   //       //    $data['newpost']['customer'] = Auth::getusername();
   //       // }

   //       if ($forums->insert($data['newpost'])) {
   //          $popup = "successfully Added new " . $data['newpost']['type'];
   //          redirect('forum?user=' . $user);
   //       } else {
   //          $popup = "Failed to add new " . $data['newpost']['type'];
   //       }
   //    }

   //    $data['announcements'] = $forums->getannouncements();
   //    $data['posts'] = $forums->getposts();
   //    $this->view('stationadmin/forums', $data);
   // }



    
    public function forums(){
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

            if($user == 'station'){
                $data['newpost']['type'] = "post";
                $data['newpost']['admin'] = Auth::getStation_name();
            }elseif($user == 'org'){
                $data['newpost']['BRN'] = Auth::getusername();
            }elseif($user == 'station'){
                $data['newpost']['admin'] = Auth::getusername();
            }elseif($user == 'customer'){
                $data['newpost']['customer'] = Auth::getusername();
            }

            if($forum->insert($data['newpost'])){
                $popup = "successfully Added new ".$data['newpost']['type'];
                redirect('Stationadmin/forum');
            }else{
                $popup = "Failed to add new ".$data['newpost']['type'];
            }
            }

        $data['announcements'] = $forum->getannouncements();
        $this->view('forums',$data);
    }






    
    public function comment(){
        $postid = $_GET['id'];

        $comms = new Comment();
        $forum = new Forums();

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate the form data
            $content = trim($_POST['content']);
            if (!empty($content)) {
                // Create a new Comment instance
                $new_comment_data = [
                    'postId' => $postid,
                    'content' => $content,
                    // Replace 'user_id' with the actual user ID of the commenter (e.g., from session)
                    'author' => $_SESSION['USER_DATA']['username']
                ];
                show($new_comment_data);

                // Save the new Comment instance to the database using the insert method
                if ($comms->insert($new_comment_data)) {
                    // Redirect back to the same page to display the updated list of comments
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit;
                } else {
                    // Handle any errors during saving
                    // e.g., display an error message to the user
                    echo "Error saving comment";die;
                }
            } else {
                // Handle validation errors
                // e.g., display an error message to the user
                echo "Error validating comment";die;
            }
        }

        $data['post'] = $forum->first(["postId"=>$postid]);
        $data['comments'] = $comms->getcomments($postid);

        $data['title'] = "comment";
        $this->view('comment',$data);
    }


}
