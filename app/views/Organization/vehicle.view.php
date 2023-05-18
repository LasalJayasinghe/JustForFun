<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/tableform.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
  <script src="<?=ROOT?>/assets/js/functions.js"></script>
  <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">

  <style>
    #vehicles{
      color: #E14761;
    }

    .forum-flex-box{
      margin:25px;
    }
    </style>
  <title>Vehicles</title>
</head>

<body>
<?php $this->view('includes/nav' , $data); ?>



    <div class='forum-flex-box'>
        <div class='filters'>
            <h3>Filters</h3>
            <form method="GET" id="filterForm">
                <label for="daterange">Used Range:</label>
                <input type="number" name="start_amount" placeholder="Start Value" id="start_amount" class='inputs' value="<?=set_value('start_amount')?>">
                <input type="number" name="end_amount" id="end_amount" class='inputs' placeholder="End Value"  value="<?=set_value('end_amount')?>">
                <br/><br/>

                <label for="search_words">Search by Vehicle No:</label>
                <input type="text" name="search_words" id="search_words" placeholder="Vehicle No" class='inputs' value="<?=set_value('search_words')?>">
                <br/><br/>


                <input type="submit" value="Apply Filters" class='primarybutton'>
            </form>

            <a href="<?= ROOT ?>/Org_addVehicle">
            <br><br>
      <button class="primarybutton"><b>Add Vehicles</b></button> <br>
    </a>

      <button  onclick = "exportTableToCSV('myTable')" class="primarybutton">Export as CSV</button>
      <br>
      <button  onclick = "exportPDF('myTable')" class="primarybutton">Export as PDF</button>
        </div>
    <div id='myTable' class="line">
      <table id = 'myTable' class="table">
        <thead>
          <tr>
            <th>Vehicle Type</th>
            <th>Registration Number</th>
            <th>Fuel Type</th>
            <th>Used Amount</th>
          </tr>
        </thead>

        <?php if (!empty($data['posts'])) : ?>
          <tbody>
            <?php foreach ($data['posts'] as $row) :
                    $vehicleno = $row['vehicleno'];     ?>
              <tr>
                <td data-label="Type"><?= $data[$vehicleno]['category']?></td>
                <td data-label="RegNumber"><?= $row['vehicleno']?></td>
                <td data-label="Ftype"><?= $data[$vehicleno]['fuel'] ?></td>
                <td data-label="Fquota"><?=$row['monthly_used_amount'] ?> </td>
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
        </br></br>
        
  <div class="table-container">
    
    </div>
  </div>
</body>



</html>