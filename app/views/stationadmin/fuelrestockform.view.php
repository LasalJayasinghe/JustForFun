<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/formstyles.css" rel="stylesheet">

  <title>Document</title>
</head>

<body>
  <?php
    $this->view('includes/nav', $data);
  ?>
  <div class="form-container">

    <h1>RESTOCK FUEL</h1>
    <form method="POST">
      <div class="column">
        <label for="station_id">Station ID</label><br>
        <input value="<?= Auth::getStation_id() ?>" type="text" id="station_id" name="station_id" placeholder="station_id" readonly><br>
      </div>

      <div class="row">
        <div class="column">
          <label for="fuel_amount">Fuel amount</label><br>
          <input value="<?= set_value('fuel_amount') ?>" type="text" id="fuel_amount" name="fuel_amount" placeholder="galoan" required1>
        </div>


        <div class="column">
          <select value="<?= set_value('fuel_type') ?>" class='inputs' type="text" name="fuel_type" required1>
            <option value='fuel_type' selected disabled>select fuel type</option>
            <option value='Petrol92'>Petrol92</option>
            <option value='Petrol95'>Petrol95</option>
            <option value='Auto Diesel'>Diesel</option>
            <option value='Super Diesel'>Super diesel</option>
          </select>
        </div>
        <?php if (!empty($errors['fuel_amount'])) : ?>
          <div class="error"><?= $errors['fuel_amount'] ?></div>
        <?php endif; ?>
        <?php if (!empty($errors['fuel_type'])) : ?>
          <div class="error"><?= $errors['fuel_type'] ?></div>
        <?php endif; ?>
        <br>
      </div>

      <div class="column">
        <label for="stock_datetime">Date and Time</label><br>
        <input value="<?= date("Y-m-d H:i:s") ?>" type="text" id="suplier" name="stock_datetime" placeholder="stock_datetime"><br>
      </div>



      <br>

      <div class="buttoncontainer">
        <a href="<?= ROOT ?>/stationadmin/dash">
          <button type="button" class="reset">Back</button>
        </a>

        <a href="<?= ROOT ?>/stationadmin/dash">
          <button type="submit" class="register">Save</button>
        </a>
      </div>
    </form>
  </div>
</body>
</html>