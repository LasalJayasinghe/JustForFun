<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="<?= ROOT ?>/assets/css/profilee.css" rel="stylesheet">
  <title>Profile</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data);
  ?>

  <br>
  <?php
  $row = $data['row'];
  if (!empty($row)) : ?>
    <div class="profile-card">
      <div class="card">
        <div><img src="<?=ROOT?>/assets/images/profiles/<?=$_SESSION['type']?>.svg" alt="logo" id="gas"></div>

        <div class="buttoncontainer">
          <a href="<?= ROOT ?>/station_logout">
            <button type="submit" class="secondarybutton">Logout</button>
          </a>
          <a href="<?= ROOT ?>/station_logout">
            <button type="submit" class="primarybutton">Deactivate</button>
          </a>
        </div>
      </div>

      <div class="form-container">
        <div class="form">
          
          </div>
          
          
          <h1>Profile</h1>
          
          <table id="profile">
            
            <tr>
              <td>Station ID</td>
              <td><?= $row['station_id'] ?></td>
            </tr>
            <tr>
              <td>Station name</td>
              <td><?= $row['name'] ?></td>
            </tr>
            <tr>
              <td>Mobile</td>
              <td><?= $row['phone'] ?></td>
            </tr>
            <tr>
              <td>Company</td>
              <td><?= $row['company'] ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $row['email'] ?></td>
            </tr>
            <tr>
              <td>petrol95 tank</td>
              <td><?= $row['petrol95_tank'] ?></td>
            </tr>
            <tr>
              <td>petrol92 tank</td>
              <td><?= $row['petrol92_tank'] ?></td>
            </tr>
            <tr>
              <td>diesel_tank</td>
              <td><?= $row['dieselauto_tank'] ?></td>
            </tr>
            
            <tr>
              <td>superdiesel_tank</td>
              <td><?= $row['dieselsuper_tank'] ?></td>
            </tr>
          </table>
          
          
          <a href="<?= ROOT ?>/Station_profileupdate">
            <button type="update" class="primarybutton"><b>Update</b></button>
          </a>
        </div>
      </div>
      
      <?php else : ?>
    <h4>That profile was not found</h4>
  <?php endif; ?>

</body>

</html>