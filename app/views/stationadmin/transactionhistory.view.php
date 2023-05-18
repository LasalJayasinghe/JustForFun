<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/tableform.css" rel="stylesheet">
  <script src="<?= ROOT ?>/assets/js/filter.js"></script>

  <title>Document</title>
</head>
<style>
  #filterForm {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  #filterForm label {
    width: 20%;
    margin-right: 10px;
    text-align: right;
  }

  .inputs {
    width: 10%;
    margin-right: 10px;
  }

  .halfinputdropdown {
    width: 15%;
    margin-right: 10px;
    margin-bottom: 5px;
  }

  .primarybutton {
    margin-left: 20px;
    width: 100px;
    text-decoration: none;
    line-height: 35px;
    display: inline-block;
    /* font-weight: normal; */
    background-color: #E14761;
    color: #F0F0F0;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    font-size: 14px;
    opacity: 1;
    border-radius: 12px;
  }
</style>
</style>

<body>
  <?php
  // $this->view('stationadmin/stationadmin-header', $data)
  $this->view('includes/station_nav', $data)
  ?>
  <div class="table-container">
    <h4 class="heading">Transactions</h4>
    <br>
    <!-- <div class="sgroup">
      <svg class="sicon" aria-hidden="true" viewBox="0 0 24 24">
        <g>
          <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
        </g>
      </svg>
      <input placeholder="Search operator id" name="search" id="search_text" type="text" class="searchbox">
    </div> -->
    <form method="GET" id="filterForm">
      <label for="daterange">Date Range:</label>
      <input type="date" name="start_date" id="start_date" class='inputs' placeholder="From" value="<?= set_value('start_date') ?>">
      <input type="date" name="end_date" id="end_date" class='inputs' placeholder="To" value="<?= set_value('end_date') ?>">
      <br>

      <label for="fuel_search">User Fuel Type:</label>
      <!-- <input type="text" name="fuel_search" id="fuel_search" placeholder="Search by user" class='inputs' value="<?= set_value('fuel_search') ?>"> -->
      <select value="<?= set_value('fuel_search') ?>" type="text" name="fuel_search" id="fuel_search" placeholder="Search by user" class='halfinputdropdown' required1>
        <option value='fuel_type' selected disabled>select fuel type</option>
        <option value='Petrol92'>Petrol92</option>
        <option value='Petrol95'>Petrol95</option>
        <option value='Auto Diesel'>Auto Diesel</option>
        <option value='Super Diesel'>Super Diesel</option>
      </select>
      <br><br>
      <label for="search_employee">Search by Words:</label>
      <input type="text" name="search_employee" id="search_employee" placeholder="Search Operator Id" class='inputs' value="<?= set_value('search_employee') ?>">
      <br /><br />

      <!-- <input type="submit" value="Apply Filters" class='primarybutton'> -->
      <button type="submit" value="Apply Filters" class='primarybutton'>Apply filter</button>
    </form>

    <br>
    <div class="line">
      <table id="myTable" class="table">
        <thead>
          <tr>
            <!-- <th>Transaction ID</th> -->
            <th>Operator ID</th>
            <th>Vehicle Number</th>
            <th>Fuel Type</th>
            <th>Amount</th>
            <th>Date Time</th>
          </tr>
        </thead>
        <?php 
        $rows =$data['rows'];
         if (!empty($rows)) : ?>

          <tbody>
            <?php foreach ($rows as $row) : ?>

              <tr>
                <!-- <td data-label="Transaction ID"><?= esc($row['transaction_id ']) ?></td> -->
                <td data-label="Mobile"><?= esc($row['operator']) ?></td>

                <td data-label="Vehicle Number"> <?= esc($row['vehicle']) ?> </td>
                <td data-label="Fuel Type"><?= esc($row['fuel']) ?> <?= esc($row['fueltype']) ?></td>
                <td data-label="Amount"><?= esc($row['amount']) ?></td>
                <td data-label="Date Time"><?= esc($row['Date-time']) ?></td>

              </tr>
            <?php endforeach; ?>




          </tbody>

        <?php else : ?>
          <tr>
            <td colspan="10">no records</td>
          </tr>


        <?php endif; ?>

      </table>



    </div>


  </div>

</body>

</html>