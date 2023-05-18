<?php
$password = generateRandomString(10);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/tableform.css" rel="stylesheet">

  <title>Document</title>
</head>

<body>
  <?php
  // $this->view('stationadmin/stationadmin-header', $data)
  $this->view('includes/Station_nav', $data)
  ?>
  <br>
  <div class="table-container">
    <a href="<?= ROOT ?>/stationadmin/operators">
      <button class="btnn"><b>Employee List</b></button>
    </a>
  </div>
  <div class="form-container">

    <h2>ADD EMPLOYEE</h2>
    <form method="POST">

      <div class="row">
        <div class="column">
          <label for="employee_id">Employee ID</label><br>
          <input value="<?= set_value('employee_id') ?>" type="text" id="employee_id" name="employee_id" placeholder="(station ID)xx">
        </div>
        <div class="column">
          <label for="station_id">Station ID</label><br>
          <input value="<?= Auth::getStation_id() ?>" type="text" id="station_id" name="station_id" placeholder="station_id" readonly>
        </div>
        <?php if (!empty($errors['employee_id'])) : ?>
          <div class="error"><?= $errors['employee_id'] ?></div>
        <?php endif; ?>
        <br>
      </div>


      <div class="row">
        <div class="column">
          <label for="fname">First Name</label><br>
          <input value="<?= set_value('fname') ?>" type="text" id="fname" name="fname" placeholder="fname">
        </div>

        <div class="column">
          <label for="lname">Last Name</label><br>
          <input value="<?= set_value('lname') ?>" type="text" id="lname" name="lname" placeholder="lname">
        </div>
        <?php if (!empty($errors['fname'])) : ?>
          <div class="error"><?= $errors['fname'] ?></div>
        <?php endif; ?>
        <?php if (!empty($errors['lname'])) : ?>
          <div class="error"><?= $errors['lname'] ?></div>
        <?php endif; ?>
        <br>
      </div>


      <div class="column">
        <label for="mobile">Mobile</label><br>
        <input value="<?= set_value('mobile') ?>" type="text" id="mobile" name="mobile" placeholder="mobile">
      </div>
      <?php if (!empty($errors['mobile'])) : ?>
        <div class="error"><?= $errors['mobile'] ?></div>
      <?php endif; ?>
      <br>

      <div class="column">
        <label for="password">password</label><br>
        <input value="<?= $password ?>" type="password" id="password" name="password" placeholder="password">
      </div>
      <?php if (!empty($errors['password'])) : ?>
        <div class="error"><?= $errors['password'] ?></div>
      <?php endif; ?>
      <br>

      <div class="column">
        <label for="email">email</label><br>
        <input value="<?= set_value('email') ?>" type="email" id="email" name="email" placeholder="email">
      </div>
      <?php if (!empty($errors['email'])) : ?>
        <div class="error"><?= $errors['email'] ?></div>
      <?php endif; ?>
      <br>


      <div class="buttoncontainer">
        <button value="Reload Page" onClick="window.location.reload(true)" type="reset" class="reset">Reset</button>
        <button href="<?= ROOT ?>/stationadmin/operators" type="submit" class="register">Register</button>
      </div>
      <br><br>
    </form>

    <br>

  </div>


</body>

</html>