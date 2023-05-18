<?php


class Stations extends Model
{
     public $errors = [];
     protected $table = "station";
     public $allowed = [
          'station_id',
          'name',
          'phone',
          'company',
          'email',
          'password',
          'petrol95_tank',
          'petrol92_tank',
          'dieselauto_tank',
          'dieselsuper_tank',
          'petrol95_bal',
          'petrol92_bal',
          'dieselauto_bal',
          'dieselsuper_bal',
          'lat',
          'lng',

     ];

     public function validate1($data1)
     {
          $this->errors = [];

          if (empty($data1['station_id'])) {
               $this->errors['station_id'] = "station_id is required";
          }
          if (!preg_match("/^[0-9]{6}$/", trim($data1["station_id"]))) {
               $this->errors['station_id'] = "Station id not valid";
          }
          if (empty($data1['name'])) {
               $this->errors['name'] = "station_name is required";
          }
          if (empty($data1['phone'])) {
               $this->errors['phone'] = "phone is required";
          }
          if (empty($data1['company'])) {
               $this->errors['company'] = "company is required";
          }
          if (empty($data1['email'])) {
               $this->errors['email'] = "email is required";
          }
          //   check validation
          if(!filter_var($data1['email'], FILTER_VALIDATE_EMAIL))
          {
              $this->errors['email'] = "Email is invalid";
          }else
          {
              if($this->where(['email' => $data1['email']])){
                  $this->errors['email'] = "Email is already taken";
              }
          }
          
          if (empty($data1['password'])) {
               $this->errors['password'] = "password is required";
          }
          if (empty($data1['Rpassword'])) {
               $this->errors['Rpassword'] = "Confirmation password is required";
          }
          if ($data1['password'] !== $data1['Rpassword']) {
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

          if (empty($data2['petrol95_tank'])) {
               $this->errors['petrol95_tank'] = "petrol95_tank is required";
          }

          if (empty($data2['petrol92_tank'])) {
               $this->errors['petrol92_tank'] = "petrol92_tank is required";
          }

          if (empty($data2['dieselauto_tank'])) {
               $this->errors['dieselauto_tank'] = "dieselauto_tank is required";
          }

          if (empty($data2['dieselsuper_tank'])) {
               $this->errors['dieselsuper_tank'] = "dieselsuper_tank is required";
          }
          if (empty($data2['petrol95_bal'])) {
               $this->errors['petrol95_bal'] = "Current balance is required";
          }

          if (empty($data2['petrol92_bal'])) {
               $this->errors['petrol92_bal'] = "Current balance is required";
          }

          if (empty($data2['dieselauto_bal'])) {
               $this->errors['dieselauto_bal'] = "Current balance is required";
          }

          if (empty($data2['dieselsuper_bal'])) {
               $this->errors['dieselsuper_bal'] = "Current blalance is required";
          }
          if (empty($this->errors)) {
               return true;
          }

          return false;
     }



     public function validate5($data5)
     {
          $this->errors = [];

          if (empty($data5['oldPassword'])) {
               $this->errors['oldPassword'] = "Current password is required";
          }
          if (empty($data5['password'])) {
               $this->errors['password'] = "New password is required";
          }
          if (empty($data5['c_np'])) {
               $this->errors['c_np'] = "Confirm password is required";
          } elseif ($data5['password'] !== $data5['c_np']) {
               $this->errors['password'] = "Passwords do not match";
          }
          if (empty($this->errors)) {
               return true;
          }
          return false;
     }

     public function validate6($data6)
     {
          $this->errors = [];

          if (empty($data6['name'])) {
               $this->errors['name'] = "station_name is required";
          }
          if (empty($data6['phone'])) {
               $this->errors['phone'] = "phone is required";
          }
          if (empty($data6['company'])) {
               $this->errors['company'] = "company is required";
          }
          if (empty($data6['email'])) {
               $this->errors['email'] = "email is required";
          }
          //   check validation
          if (!filter_var($data6['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = "email is not valid";
          }
          if (empty($data6['petrol95_tank'])) {
               $this->errors['petrol95_tank'] = "petrol95_tank is required";
          }

          if (empty($data6['petrol92_tank'])) {
               $this->errors['petrol92_tank'] = "petrol92_tank is required";
          }

          if (empty($data6['dieselauto_tank'])) {
               $this->errors['dieselauto_tank'] = "dieselauto_tank is required";
          }

          if (empty($data6['dieselsuper_tank'])) {
               $this->errors['dieselsuper_tank'] = "dieselsuper_tank is required";
          }
          if (empty($this->errors)) {
               return true;
          }
          return false;
     }





     //update station profile 
     public function stationupdate($station_id, $data)
     {
          $query = "UPDATE station SET station_id=:station_id, name=:name, phone=:phone, company=:company, email=:email, petrol95_tank=:petrol95_tank, petrol92_tank=:petrol92_tank, dieselauto_tank=:dieselauto_tank, dieselsuper_tank=:dieselsuper_tank WHERE station_id=:id";
          $data = array(
               ':station_id' => $station_id,
               ':name' => $data['name'],
               ':phone' => $data['phone'],
               ':company' => $data['company'],
               ':email' => $data['email'],
               ':petrol95_tank' => $data['petrol95_tank'],
               ':petrol92_tank' => $data['petrol92_tank'],
               ':dieselauto_tank' => $data['dieselauto_tank'],
               ':dieselsuper_tank' => $data['dieselsuper_tank'],
               ':id' => $station_id
          );
          $this->query($query, $data);
     }


     //update station profile 
     public function stationchangepassword($station_id, $data)
     {
          $query = "UPDATE station SET password=:password WHERE station_id=:id";
          $data = array(
               ':password' => $data['password'],
               ':id' => $station_id
          );
          $this->query($query, $data);
     }














     //insert new fuel stock
     public function insertremaininfuel($id, $fuel_type, $fuel_amount)
     {
          $fuel = str_replace(" ", "", $fuel_type);
          $query = 'UPDATE station SET ' . $fuel . '_bal = ' . $fuel . '_bal +' . $fuel_amount . ' WHERE station_id = :id';
          $data['id'] = $id;
          $this->query($query, $data);
     }



     //delete fuel stock
     public function removedeletedfuelfromstation($id, $fuel_type, $fuel_amount)
     {
          $fuel = str_replace(" ", "", $fuel_type);
          $query = 'UPDATE station SET ' . $fuel . '_bal= ' . $fuel . '_bal -' . $fuel_amount . ' WHERE station_id = :id';
          $data['id'] = $id;
          $this->query($query, $data);
     }

     public function deduct($data,$field)
     {
          $station_query = "UPDATE $this->table SET " . $field . " = " . $field . " - :amount WHERE station_id = :station_id";
          if ($this->queryin($station_query,$data)) {
               return 1;
          }else{
               return 0;
          }
     }
}
