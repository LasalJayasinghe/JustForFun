<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/chartstyles.css" rel="stylesheet">
  <!-- <link href="<?= ROOT ?>/assets/css/stationstyles.css" rel="stylesheet"> -->
  <!-- <link href="<?= ROOT ?>/assets/css/stationstyles.css" rel="stylesheet"> -->
  <style>
    #stats {
      color: #E14761;
    }
  </style>
  <title>Stats on transactions</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data);
  ?>
  <div class="main-container">
  <div class="charts-container">
    <div class='restocking-chart'>
      <div class='titlefilters'>
        <h2>Restocking</h2>
        <form>
          <div class='filters'>
            <!-- Date: From<input type="date" name="start_date" id="start_date" class='inputsmall' value="<?= set_value('start_date') ?>">
            to<input type="date" name="end_date" id="end_date" class='inputsmall' value="<?= set_value('end_date') ?>"> -->
            <!-- <button type='submit' name='loadData' class='primarybuttonsmall' id="loadDataRestock"> -->
              <svg width="16" height="7" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.16667 10C6.93056 10 6.7325 9.92 6.5725 9.76C6.4125 9.6 6.33278 9.40223 6.33334 9.16667C6.33334 8.93056 6.41334 8.7325 6.57334 8.5725C6.73334 8.4125 6.93111 8.33278 7.16667 8.33334H8.83334C9.06945 8.33334 9.2675 8.41334 9.4275 8.57334C9.5875 8.73334 9.66723 8.93111 9.66667 9.16667C9.66667 9.40278 9.58667 9.60084 9.42667 9.76084C9.26667 9.92084 9.06889 10.0006 8.83334 10H7.16667ZM1.33334 1.66667C1.09723 1.66667 0.899169 1.58667 0.739169 1.42667C0.579169 1.26667 0.499447 1.06889 0.500003 0.833336C0.500003 0.597225 0.580003 0.39917 0.740003 0.23917C0.900003 0.0791697 1.09778 -0.000552672 1.33334 2.8835e-06H14.6667C14.9028 2.8835e-06 15.1008 0.080003 15.2608 0.240003C15.4208 0.400003 15.5006 0.597781 15.5 0.833336C15.5 1.06945 15.42 1.2675 15.26 1.4275C15.1 1.5875 14.9022 1.66723 14.6667 1.66667H1.33334ZM3.83334 5.83334C3.59722 5.83334 3.39917 5.75334 3.23917 5.59334C3.07917 5.43334 2.99945 5.23556 3 5C3 4.76389 3.08 4.56584 3.24 4.40584C3.4 4.24584 3.59778 4.16611 3.83334 4.16667H12.1667C12.4028 4.16667 12.6008 4.24667 12.7608 4.40667C12.9208 4.56667 13.0006 4.76445 13 5C13 5.23611 12.92 5.43417 12.76 5.59417C12.6 5.75417 12.4022 5.83389 12.1667 5.83334H3.83334Z" fill="#FAFAFA" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      <canvas id="restocking"></canvas>
    </div>

    <div class='distribution-chart'>
      <div class='titlefilters'>
        <h2>Distribution</h2>
        <form>
          <div class='filters'>
            <!-- Date: From<input type="date" name="start_date" id="start_date" class='inputsmall' value="<?= set_value('start_date') ?>">
            to<input type="date" name="end_date" id="end_date" class='inputsmall' value="<?= set_value('end_date') ?>"> -->
            <!-- <button type='submit' name='loadData' class='primarybuttonsmall' id="loadDataRestock"> -->
              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.16667 10C6.93056 10 6.7325 9.92 6.5725 9.76C6.4125 9.6 6.33278 9.40223 6.33334 9.16667C6.33334 8.93056 6.41334 8.7325 6.57334 8.5725C6.73334 8.4125 6.93111 8.33278 7.16667 8.33334H8.83334C9.06945 8.33334 9.2675 8.41334 9.4275 8.57334C9.5875 8.73334 9.66723 8.93111 9.66667 9.16667C9.66667 9.40278 9.58667 9.60084 9.42667 9.76084C9.26667 9.92084 9.06889 10.0006 8.83334 10H7.16667ZM1.33334 1.66667C1.09723 1.66667 0.899169 1.58667 0.739169 1.42667C0.579169 1.26667 0.499447 1.06889 0.500003 0.833336C0.500003 0.597225 0.580003 0.39917 0.740003 0.23917C0.900003 0.0791697 1.09778 -0.000552672 1.33334 2.8835e-06H14.6667C14.9028 2.8835e-06 15.1008 0.080003 15.2608 0.240003C15.4208 0.400003 15.5006 0.597781 15.5 0.833336C15.5 1.06945 15.42 1.2675 15.26 1.4275C15.1 1.5875 14.9022 1.66723 14.6667 1.66667H1.33334ZM3.83334 5.83334C3.59722 5.83334 3.39917 5.75334 3.23917 5.59334C3.07917 5.43334 2.99945 5.23556 3 5C3 4.76389 3.08 4.56584 3.24 4.40584C3.4 4.24584 3.59778 4.16611 3.83334 4.16667H12.1667C12.4028 4.16667 12.6008 4.24667 12.7608 4.40667C12.9208 4.56667 13.0006 4.76445 13 5C13 5.23611 12.92 5.43417 12.76 5.59417C12.6 5.75417 12.4022 5.83389 12.1667 5.83334H3.83334Z" fill="#FAFAFA" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      <canvas id="distribution"></canvas>
    </div>

  </div>

  <div class='tableandfilter-container'>

    <div class='filter-container'>
      <h3>Filters</h3>
      <form method="GET" id="filterForm">
        <div>
          <label for="daterange">Date Range:</label><br>
          <input type="date" name="start_date" id="start_date" class='inputs' value="<?= set_value('start_date') ?>">
          <input type="date" name="end_date" id="end_date" class='inputs' value="<?= set_value('end_date') ?>">
        </div>
        <div>
          <label for="user_search">Operator Search:</label>
          <input type="text" name="user_search" id="user_search" placeholder="Search by user" class='inputs' value="<?= set_value('user_search') ?>">
        </div>
        <div>
          <label for="fuel_type">Search by Fuel:</label>
          <select value="<?= set_value('fuel_type') ?>" type="text" name="fuel_type" id="fuel_type" placeholder="Search by user" class='input-filters' required1>
            <option value='' selected disabled>select fuel type</option>
            <option value=''>All</option>
            <option value='petrol92'>Petrol92</option>
            <option value='petrol95'>Petrol95</option>
            <option value='dieselauto'>Auto Diesel</option>
            <option value='dieselsuper'>Super Diesel</option>
          </select>
        </div>
        <div>
          <input type="hidden" name="user" value="station">
          <input type="submit" value="Apply Filters" class='primarybutton'>
        </div>
      </form>
    </div>

    <div class='transactions'>
      <!-- <h2>All transactions</h2> -->
      <div class='table-container'>
        <div class="operator-deets">
          <div class="operators-table-container">
            <table class="table-small" id="table-data">
              <tr>
                <th>Operator</th>
                <th>Vehicle</th>
                <th>Date</th>
                <th>Time</th>
                <th>Quantity</th>
                <th>Fuel Type</th>
              </tr>
              <tbody>
                <?php $rows = $data['rows'];
                if (!empty($rows)) : ?>
                  <?php foreach ($rows as $row) : ?>
                    <tr>
                      <td data-label="Operator"><?= $row['operator'] ?></td>
                      <td data-label="Vehicle"> <?= $row['vehicle'] ?> </td>
                      <td data-label="Date"><?= date('Y-m-d', strtotime($row['update_time'])) ?></td>
                      <td data-label="Time"><?= date('H:i', strtotime($row['update_time'])) ?></td>
                      <td data-label="Quantity"> <?= $row['fuel_amount'] ?> </td>
                      <td data-label="Fuel Type"> <?= $row['fuel_type'] ?> </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            <?php else : ?>
              <tr>
                <td colspan="6">no records</td>
              </tr>
            <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        //restocking data arrays
        var restockingpetrol95 = <?php echo json_encode($data['restockingpetrol95']); ?>;
        var restockingpetrol92 = <?php echo json_encode($data['restockingpetrol92']); ?>;
        var restockingautodiesel = <?php echo json_encode($data['restockingautodiesel']); ?>;
        var restockingsuperdiesel = <?php echo json_encode($data['restockingsuperdiesel']); ?>;

        //distribution data arrays
        var distributionpetrol95 = <?php echo json_encode($data['distributionpetrol95']); ?>;
        var distributionpetrol92 = <?php echo json_encode($data['distributionpetrol92']); ?>;
        var distributionautodiesel = <?php echo json_encode($data['distributionautodiesel']); ?>;
        var distributionsuperdiesel = <?php echo json_encode($data['distributionsuperdiesel']); ?>;

        var restock = document.getElementById('restocking').getContext('2d');
        var chart = new Chart(restock, {
          type: 'bar',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
              'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Super Diesel',
                data: restockingsuperdiesel.restocking, // holds total restocking data per month
                backgroundColor: 'rgba(225, 71, 97,0.4)',
                borderColor: 'rgba(225, 71, 97,1)',
                borderWidth: 1
              },
              {
                label: 'Auto Diesel ',
                data: restockingautodiesel.restocking, // holds total restocking data per month
                backgroundColor: 'rgba(206, 194, 255,0.4)',
                borderColor: 'rgba(206, 194, 255,1)',
                borderWidth: 1
              },
              {
                label: 'Petrol 92 ',
                data: restockingpetrol92.restocking, // holds total restocking data per month
                backgroundColor: 'rgba(151, 71, 255,0.4)',
                borderColor: 'rgba(151, 71, 255,1)',
                borderWidth: 1
              },
              {
                label: 'Petrol 95 ',
                data: restockingpetrol95.restocking, // holds total restocking data per month
                backgroundColor: 'rgba(179, 179, 241,0.4)',
                borderColor: 'rgba(179, 179, 241,1)',
                borderWidth: 1
              }
            ]
          },
          options: {
            responsive: true,
            MAINTAIN_ASPECT_RATIO: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });

        var distribute = document.getElementById('distribution').getContext('2d');
        var chart = new Chart(distribute, {
          type: 'bar',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
              'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Super Diesel',
                data: distributionsuperdiesel.distribution, // holds total restocking data per month
                backgroundColor: 'rgba(225, 71, 97,0.4)',
                borderColor: 'rgba(225, 71, 97,1)',
                borderWidth: 1
              },
              {
                label: 'Auto Diesel ',
                data: distributionautodiesel.distribution, // holds total restocking data per month
                backgroundColor: 'rgba(206, 194, 255,0.4)',
                borderColor: 'rgba(206, 194, 255,1)',
                borderWidth: 1
              },
              {
                label: 'Petrol 92 ',
                data: distributionpetrol92.distribution, // holds total restocking data per month
                backgroundColor: 'rgba(151, 71, 255,0.4)',
                borderColor: 'rgba(151, 71, 255,1)',
                borderWidth: 1
              },
              {
                label: 'Petrol 95 ',
                data: distributionpetrol95.distribution, // holds total restocking data per month
                backgroundColor: 'rgba(179, 179, 241,0.4)',
                borderColor: 'rgba(179, 179, 241,1)',
                borderWidth: 1
              }
            ]
          },
          options: {
            responsive: true,
            MAINTAIN_ASPECT_RATIO: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });

        document.getElementById('loadDataRestock').addEventListener('click', function() {

          // Fetch the restocking data
          fetch('stats')
            .then(response => response.json())
            .then(data => {
              // Update the chart labels and data
              chart.data.labels = data.months;
              chart.data.datasets[0].data = data.restocking;
              chart.update();
            });
        });

        document.getElementById('loadDataDistribute').addEventListener('click', function() {
          var fuelType = document.getElementById('fuel_type').value;

          // Fetch the restocking data
          fetch('stats' + fuelType)
            .then(response => response.json())
            .then(data => {
              // Update the chart labels and data
              chart.data.labels = data.months;
              chart.data.datasets[0].data = data.distribution;
              chart.update();
            });
        });
      </script>
</body>

</html>