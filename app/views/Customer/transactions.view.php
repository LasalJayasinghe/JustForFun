<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/tableform.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/dashboard.css">
  <script src="<?= ROOT ?>/assets/js/functions.js"></script>
  <style>
        #transactions{
            color:#E14761;
        }
    </style>
  <title>Transactions</title>
</head>

<body>
  
  <?php $this->view('includes/nav', $data); ?>
  <h1 class="title">Transactions</h1>
  <div class="containerX">
  <div class="filters"> 
  <form method="GET" id="filterForm">
                <label for="daterange">Date Range:</label>
                <input type="date" name="start_date" id="start_date" class='inputs' value="<?=set_value('start_date')?>">
                <input type="date" name="end_date" id="end_date" class='inputs' value="<?=set_value('end_date')?>">
                <br/><br/>

                <label for="user_search">Station Search:</label>
                <input type="text" name="station_search" id="station_search" placeholder="Search by station name" class='inputs' value="<?=set_value('station_search')?>">
                <br/><br/>

                <input type="submit" value="Apply Filters" class='primarybutton'>
  </form>
  </div>
  <div class="table-container">
    <div class="line">
      <table id="myTable" class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Station</th>
            <th>Operator</th>
            <th>Fuel Amount</th>
            <th>Fuel Type</th>
            <th>Paid Price</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($transaction_data)) : ?>
            <?php foreach ($transaction_data as $row) : ?>
              <tr>
                <td data-label="Date"><?= $row['date'] ?></td>
                <td data-label="Station"><?= $row['station_name'] ?></td>
                <td data-label="Operator"><?= $row['operator_id'] ?></td>
                <td data-label="Fuel Amount"><?= $row['fuel_amount'] ?></td>
                <td data-label="Fuel desc"><?= $row['fuel_desc'] ?></td>
                <td data-label="Total Price">
                  <?php
                  $fuel_type = $row['fuel_type'];
                  $fuel_price_record = $fuel_prices->first(['fuel_type' => $fuel_type]);
                  $fuel_price = $fuel_price_record ? $fuel_price_record['price'] : 0;
                  $total_price = $fuel_price * $row['fuel_amount'];
                  echo $total_price;
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6">No records found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

</body>

</html>

