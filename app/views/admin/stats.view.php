<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/chartstyles.css" rel="stylesheet">
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
    <div class="charts-container-admin">

        <div class='user-distribution-chart'>
            <h3>Registered User Base</h3>
            <div>
                <table class='user-base'>
                    <tr><th></th><th>Active</th><th>All</th></tr>
                    <tr><th>Private Accounts</th><td><?=$data['userbasecount']['active']['customer']?></td><td><?=$data['userbasecount']['al']['customer']?></td></tr>
                    <tr><th>Organization Accounts</th><td><?=$data['userbasecount']['active']['org']?></td><td><?=$data['userbasecount']['all']['org']?></td></tr>
                    <tr><th>Station Accounts</th><td><?=$data['userbasecount']['active']['station']?></td><td><?=$data['userbasecount']['all']['station']?></td></tr>
                    <tr><th>Vehicles</th><td><?=$data['userbasecount']['active']['vehicles']?></td><td><?=$data['userbasecount']['all']['vehicles']?></td></tr>
                </table>
            </div>
        </div>

        <div class='vehicle-distribution-chart'>
            <h3>Vehicle Distribution</h3>
            <canvas id='vehicle-distribution'></canvas>
        </div>

        <div class='organizations-table'>
            <h3>Organizations Details</h3>
            <table class='org-details'>
                <tr><th>Organization</th><th>Active Vehicles</th><th>Active Users</th></tr>
                <?php foreach($data['orgDetails'] as $org) : ?>
                    <tr><td><?=$org['name']?></td><td><?=$org['active_vehicles']?></td></tr>
                <?php endforeach; ?>
            </table>
        </div>

  </div>

  <div class='tableandfilter-container'>
 
    <div class='filter-container'>
      <h3>Filters</h3>
      <form method="GET" id="filterForm">
        <div>
          <label for="daterange">Date Range:</label><br>
          <input type="date" name="start_date" id="start_date" class='inputs' value="<?=set_value('start_date')?>">
          <input type="date" name="end_date" id="end_date" class='inputs' value="<?=set_value('end_date')?>">
        </div><div>
          <label for="user_search">User Search:</label>
          <input type="text" name="user_search" id="user_search" placeholder="Search by user" class='inputs' value="<?=set_value('user_search')?>">
        </div><div>
          <label for="search_words">Search by Words:</label>
          <input type="text" name="search_words" id="search_words" placeholder="Search by words" class='inputs' value="<?=set_value('search_words')?>">
        </div><div>
          <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">
          <input type="submit" value="Apply Filters" class='primarybutton'>
        </div>
      </form>  
    </div>

    <div class='transactions'>
      <h2>All transactions</h2>
      <div class='table-container'>
        <table class='raw-table'>
          <tr>
            <th>Operator</th>
            <th>Vehicle</th>
            <th>Product</th>
            <th>Quantity</th>
          </tr>
           
        </table>
      </div>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  
    var categoriesCounts = <?php echo json_encode($data['categoriesandcounts']); ?>;

    var labels = categoriesCounts.map(function(item) { return item.category; });
    var pvtData = categoriesCounts.map(function(item) { return item.pvt; });
    var orgData = categoriesCounts.map(function(item) { return item.org; });
    
    // Create the doughnut charts
    var ctx1 = document.getElementById('vehicle-distribution').getContext('2d');
    var pvtChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Private Vehicles',
                data: pvtData,
                backgroundColor: 'rgba(225, 71, 97,0.4)',
                borderColor: 'rgba(225, 71, 97,1)',
                borderWidth: 1
            },
            {
                label: 'Organization Vehicles',
                data: orgData,
                backgroundColor: 'rgba(206, 194, 255,0.4)',
                borderColor: 'rgba(206, 194, 255,1)',
                borderWidth: 1
            }
        ]
        }
        ,
        options: {
          responsive: true,
          MAINTAIN_ASPECT_RATIO: false,
      }
    });

</script>
</body>
</html>