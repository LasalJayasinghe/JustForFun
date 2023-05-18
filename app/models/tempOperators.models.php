
<?php

class Operators_temp extends Model
{
     public $errors = [];
     protected $table = "operators";


     public $allowed = [
          'opid',
          'employee_id',
          'station_id',
          'fname',
          'lname',
          'mobile',
          'password',
          'email',
     ];

     public function validate($data)
     {
          $this->errors = [];

          if (empty($data['employee_id'])) {
               $this->errors['employee_id'] = "Employee id is required";
          } elseif (!preg_match("/^[0-9]{8}$/", trim($data["employee_id"]))) {
               $this->errors['employee_id'] = "Employee ID must contain 8 numbers.(stationIDxx)";
          } elseif ($this->where(['employee_id' => $data['employee_id']])) {
               $this->errors['employee_id'] = "Employee id is already exists";
          }
          if (empty($data['fname'])) {
               $this->errors['fname'] = "First name is required";
          } elseif (!preg_match("/^[a-zA-Z]+$/", trim($data["fname"]))) {
               $this->errors['fname'] = "First name can only have letters without spaces";
          }

          if (empty($data['lname'])) {
               $this->errors['lname'] = "Last name is required";
          } elseif (!preg_match("/^[a-zA-Z]+$/", trim($data["lname"]))) {
               $this->errors['lname'] = "Last name can only have letters without spaces";
          }
          if (empty($data['mobile'])) {
               $this->errors['mobile'] = "Mobile is required";
          } elseif (!preg_match("/^(07|\+9407)[0-9]{8}$/", trim($data["mobile"]))) {
               if (!filter_var($data['mobile'], FILTER_VALIDATE_URL)) {
                    $this->errors['mobile'] = "Mobile is not valid";
               }
          }
          if (empty($data['password'])) {
               $this->errors['password'] = "password is required";
          }
          if (empty($data['email'])) {
               $this->errors['email'] = "email is required";
          } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = "email is not valid";
          } elseif ($this->where(['email' => $data['email']])) {
               $this->errors['email'] = "email already exists";
          }

          //   $query = "select * from operators where email = :email limit 1";
          //   if(!empty($data1['email']) && $this->query($query,['email'=>$data['email']]))
          //   {
          //        $this->errors['email'] = "That email already exist";
          //   }

          if (empty($this->errors)) {
               return true;
          }
          return false;
     }




     //change operator password
     public function validate1($data1)
     {
          $this->errors = [];
          if (empty($data1['password'])) {
               $this->errors['password'] = "new password is required";
          }
          elseif (!preg_match("/^[0-9a-zA-Z#@$*]{6}$/", trim($data1["password"]))) {
               $this->errors['password'] = "Password must contain 6 characters";
          }
          if (empty($data1['c_np'])) {
               $this->errors['c_np'] = "conform password is required";
          }
          elseif ($data1['password'] !== $data1['c_np']) {
               $this->errors['password'] = "Passwords do not matches";
          }
          if (empty($this->errors)) {
               return true;
          }

          return false;
     }

     public function validate2($data2)
     {
          $this->errors = [];

          if (empty($data2['employee_id'])) {
               $this->errors['employee_id'] = "Employee id is required";
          } elseif (!preg_match("/^[0-9]{8}$/", trim($data2["employee_id"]))) {
               $this->errors['employee_id'] = "Employee ID must contain 8 numbers.(stationIDxx)";
          }
          if (empty($data2['fname'])) {
               $this->errors['fname'] = "First name is required";
          } elseif (!preg_match("/^[a-zA-Z]+$/", trim($data2["fname"]))) {
               $this->errors['fname'] = "First name can only have letters without spaces";
          }

          if (empty($data2['lname'])) {
               $this->errors['lname'] = "Last name is required";
          } elseif (!preg_match("/^[a-zA-Z]+$/", trim($data2["lname"]))) {
               $this->errors['lname'] = "Last name can only have letters without spaces";
          }
          if (empty($data2['mobile'])) {
               $this->errors['mobile'] = "Mobile is required";
          }
          //  elseif (!preg_match("/^(7|\+947)[0-9]{7}$/", trim($data2["mobile"]))) {
          //           $this->errors['mobile'] = "Mobile is not valid";  
          // }
          if (empty($data2['email'])) {
               $this->errors['email'] = "email is required";
          } elseif (!filter_var($data2['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = "email is not valid";
          }

          if (empty($this->errors)) {
               return true;
          }
          return false;
     }






     public function opdelete($station_id, $id)
     {
          $query = 'DELETE FROM operators WHERE station_id = ' . $station_id . ' AND opid= ' . $id . '';
          $data['opid'] = $id;
          $this->query($query, $data);
     }




     public function opupdate($id, $data, $op_id)
     {

          if (!empty($this->allowed)) {
               foreach ($data as $key => $value) {
                    if (!in_array($key, $this->allowed)) {
                         unset($data[$key]);
                    }
               }
          }
          $keys = array_keys($data);
          $values = array_values($data);

          $query = "update " . $this->table . " set ";

          foreach ($keys as $key) {
               $query .= $key . "=:" . $key . ",";
          }

          $query = trim($query, ",");
          $query .= " where " . $op_id . " = :id";
          $data['id'] = $id;

          // show($query);
          // die;

          $this->query($query, $data);
     }
}
