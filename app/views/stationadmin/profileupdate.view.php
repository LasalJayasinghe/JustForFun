<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/profilee.css" rel="stylesheet">
  <title>Profile update</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data);
  ?>

  <?php
  $row = $data['row'];
  if (!empty($row)) : ?>
    <div class="profile-card">
      <div class="card">
        <div><img src="<?= ROOT ?>/assets/images/profiles/<?= $_SESSION['type'] ?>.svg" alt="logo" id="gas"></div>
        <div class="buttoncontainer">
          <!-- <div id="new" class="new"><button type="save" class="primarybutton">Change password</button></div> -->
          <a href="<?= ROOT ?>/Station_profilepasswordchange">
            <button type="submit" class="primarybutton">Change Password</button>
          </a>

          <a href="<?= ROOT ?>/station_logout">
            <button type="reset" class="secondarybutton">Logout</button>
          </a>
        </div>
      </div>

      <div class="form-container">
        <h1>Profile Update</h1>

        <form method="post">
          <!-- Front end bit to get login deets -->
          <label for="station_id">Station ID:</label>
          <input value="<?= $row['station_id'] ?>" class='inputsignin' type="text" name="station_id" id="station_id" placeholder="station id" required1 readonly>
          <br>

          <label for="name">Station Name:</label>
          <input value="<?= $row['name'] ?>" class='inputsignin' type="text" name="name" id="name" placeholder="name" required1>
          <?php if (!empty($errors['name'])) : ?>
            <div class="error"><?= $errors['name'] ?></div>
          <?php endif; ?>
          <br>

          <label for="phone">phone:</label>
          <input value="<?= $row['phone'] ?>" class='inputsignin' type="text" name="phone" id="phone" placeholder="phone" required1>
          <?php if (!empty($errors['phone'])) : ?>
            <div class="error"><?= $errors['phone'] ?></div>
          <?php endif; ?>
          <br>

          <label for="company">Comapny:</label>
          <select value="<?= $row['company'] ?>" class='inputsignin' type="text" name="company" id="company" placeholder="company" required1>
            <option value="<?= $row['company'] ?>"><?= $row['company'] ?></option>
            <option value='IOC'>IOC</option>
            <option value='CEP'>CEP</option>
            <option value='LGF'>Laugfs</option>
          </select>
      
          <?php if (!empty($errors['company'])) : ?>
            <div class="error"><?= $errors['company'] ?></div>
          <?php endif; ?>
          <br>

          <label for="email">Email:</label>
          <input value="<?= $row['email'] ?>" class='inputsignin' type="email" name="email" id="email" placeholder="Email" required1>
          <?php if (!empty($errors['email'])) : ?>
            <div class="error"><?= $errors['email'] ?></div>
          <?php endif; ?>
          <br>

          <label for="petrol95_tank">petrol95 tank:</label>
          <input value="<?= $row['petrol95_tank'] ?>" class='inputsignin' type="text" name="petrol95_tank" id="petrol95_tank" placeholder="petrol95_tank" required1>
          <?php if (!empty($errors['petrol95_tank'])) : ?>
            <div class="error"><?= $errors['petrol95_tank'] ?></div>
          <?php endif; ?>
          <br>

          <label for="petrol92_tank">petrol92 tank:</label>
          <input value="<?= $row['petrol92_tank'] ?>" class='inputsignin' type="text" name="petrol92_tank" id="petrol92_tank" placeholder="petrol92_tank" required1>
          <?php if (!empty($errors['petrol92_tank'])) : ?>
            <div class="error"><?= $errors['petrol92_tank'] ?></div>
          <?php endif; ?>
          <br>

          <label for="dieselauto_tank">diesel tank:</label>
          <input value="<?= $row['dieselauto_tank'] ?>" class='inputsignin' type="text" name="dieselauto_tank" id="dieselauto_tank" placeholder="dieselauto_tank" required1>
          <?php if (!empty($errors['dieselauto_tank'])) : ?>
            <div class="error"><?= $errors['dieselauto_tank'] ?></div>
          <?php endif; ?>
          <br>

          <label for="dieselsuper_tank">superdiesel_tank:</label>
          <input value="<?= $row['dieselsuper_tank'] ?>" class='inputsignin' type="text" name="dieselsuper_tank" id="dieselsuper_tank" placeholder="dieselsuper_tank" required1>
          <?php if (!empty($errors['dieselsuper_tank'])) : ?>
            <div class="error"><?= $errors['dieselsuper_tank'] ?></div>
          <?php endif; ?>
          <br>


          <a href="<?= ROOT ?>/stationadmin/profile">
            <button type="submit" class="secondarybutton">Back</button>
          </a>

          <a href="<?= ROOT ?>/stationadmin/profile">
            <button type="submit" class="primarybutton">Save</button>
          </a>
        </form>
      </div>
    </div>

  <?php else : ?>
    <h4>That profile was not found</h4>
  <?php endif; ?>


</body>

</html>