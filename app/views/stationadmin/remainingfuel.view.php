<?php $rows = $data['rows'];
if (!empty($rows)) :
  foreach ($rows as $row) :
    $petrol95 = $row['petrol95_bal'];
    $petrol95li = $petrol95 * 3.78541;

    $petrol92 = $row['petrol92_bal'];
    $petrol92li = $petrol92 * 3.78541;

    $diesel = $row['dieselauto_bal'];
    $dieselli = $diesel * 3.78541;

    $superdiesel = $row['dieselsuper_bal'];
    $superdieselli = $superdiesel * 3.78541;

  endforeach;
?>

<?php endif; ?>

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
  <div class="table-container">

    <h2 class="heading">Availabale Fuel Amount</h2>
    <div class="line">
      <table class="table">
        <thead>
          <tr>
            <th>Fuel Type</th>
            <th>Available Fuel Amount(liters)</th>
            <!-- <th>Available Fuel Amount(liters)</th> -->
          </tr>
        </thead>

        <tbody>

          <tr>
            <td data-label="Fuel Type">Petrol-92</td>
            <td data-label="Available Fuel Amount"> <?= $petrol95 ?></td>
            <!-- <td data-label="Available Fuel Amount"> <?= $petrol95li ?></td> -->
          </tr>
          <tr>
            <td data-label="Fuel Type">Petrol-95</td>
            <td data-label="Available Fuel Amount"> <?= $petrol92 ?></td>
            <!-- <td data-label="Available Fuel Amount"> <?= $petrol92li ?></td> -->
          </tr>
          <tr>
            <td data-label="Fuel Type">Diesel</td>
            <td data-label="Available Fuel Amount"> <?= $diesel ?></td>
            <!-- <td data-label="Available Fuel Amount"> <?= $dieselli ?></td> -->
          </tr>
          <tr>
            <td data-label="Fuel Type">Super Diesel</td>
            <td data-label="Available Fuel Amount"> <?= $superdiesel ?></td>
            <!-- <td data-label="Available Fuel Amount"> <?= $superdieselli ?></td> -->
          </tr>


        </tbody>



      </table>
    </div>
  </div>
</body>

</html>