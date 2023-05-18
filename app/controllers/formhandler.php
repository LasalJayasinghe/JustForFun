<?php
//this file prevents the headers already sent error from retrieving data in scanner.php and the noresult error from retrieving data in quota.php together

class Formhandler extends Controller
{

    public function index()
    {


        $data['title'] = "FormHandler";

        $vehicle = new Vehicle();
        $operators = new Operator();
        $customer = new Customer();
        $organization = new Org();
        $org_vehicle = new Org_Vehicles();

        $station = new Stations();
        $transaction = new Transaction();

        if(array_key_exists('vehicleno',$_POST)){
            $_SESSION['vehicle'] = $_POST['vehicleno'];
            show($_SESSION['vehicle']);
            redirect('quota');
        }
        

        //////////////////// FOR UPDATING THE VEHICLE BALANCE QUOTA - PRIVATE - ORGANIZATIONS ///////////////////////
        if(array_key_exists('update',$_POST)){
            $quota_update_status = false;

            if($_SESSION['current_vehicle']['owner_type'] == 'pvt'){
                $querydata = [
                    'vehicleno' => $_SESSION['current_vehicle']['vehicleno'],
                    'balance_quota' => $_SESSION['current_vehicle']['balance_quota'] - $_POST['amount'],
                ];
                if($customer->updateQuota($querydata)){
                    $quota_update_status = true;
                }
            }else{
                $fuel_type_balance = $_SESSION['current_vehicle']['fuel_type'].'_balance';
                $querydata = [
                    'brn' => $_SESSION['current_vehicle']['brn'],
                    'balance_quota' => $_SESSION['current_vehicle']['balance_quota'] - $_POST['amount'],
                ];
                if($organization->updateQuota($querydata, $fuel_type_balance)){
                    $quota_update_status = true;
                    if($org_vehicle->updateUsage($querydata=['vehicleno' => $_SESSION['current_vehicle']['vehicleno'], 'amount' => $_POST['amount']])){
                        $quota_update_status = true;
                    }
                }else{
                    $data['message'] = "Quota Update Failed";
                }
            }

            if($quota_update_status){
                show($_SESSION['USER_DATA']); //station regsitration number
                show($_SESSION['current_vehicle']); //fuel_type (petrol,diesel)
                show($_POST); //fuel_type (super,auto,92,95)
                $field = $_SESSION['current_vehicle']['fuel_type'].$_POST['fueltype'].'_bal';
                show($field);
                $station_data = [
                    'amount' => $_POST['amount'],
                    'station_id' => intval($_SESSION['USER_DATA']['station_id']),
                ];
               $station_update_status = $station -> deduct($station_data, $field);
            }

            if($station_update_status && $quota_update_status){
                show('works');
                $transaction_data = [
                    'station_id' => $_SESSION['USER_DATA']['station_id'],
                    'operator' => $_SESSION['USER_DATA']['code'],
                    'vehicleno' => $_SESSION['current_vehicle']['vehicleno'],
                    'fuel_type' => $_SESSION['current_vehicle']['fuel_type'].$_POST['fueltype'],
                    'fuel_amount' => $_POST['amount'],
                ];

                show($transaction_data);
                if($transaction->insert($transaction_data)){
                    $data['message'] = "Transaction Successful";
                    show($data['message']);
                }else{
                    $data['message'] = "Transaction Failed";
                    show($data['message']);
                }
            }else{
                $data['message'] = "Station update Failed";
                show($data['message']);
            }

            redirect('quota');
        }

        //////////////////////// END /////////////////////////////

        if(array_key_exists('exit',$_POST)){
            unset($_SESSION['vehicle']);
            redirect('scanner');
        }
        
        if(array_key_exists('add_new',$_POST)){
            if ($result = $operators->validate($_POST)) {
                $_SESSION['newoperator'] = $_POST;
                $_SESSION['newoperator']['password'] = randomPassword();
                $_POST['password'] = password_hash($_SESSION['newoperator']['password'], PASSWORD_DEFAULT);

                $operators->insert($_POST);
                redirect('sendpassword');
            }
            $data['rows'] =  $operators->where(['station_id' => $station_id]);
            $data['errors'] = $operators->errors;
            $this->view('stationadmin/operators', $data);
        }

        if(array_key_exists('deletePost',$_POST)){
            $post = new Forums();
            $post->deletePosts($_POST['post_id']);
            redirect('forum');
        }

        if(array_key_exists('deleteComment',$_POST)){
            show($_POST);
            $comment = new Comment();
            $comment->deleteComments($_POST['comment_id']);
            redirect('postdetails?id='.$_POST['post_id']);
        }
    }
}
