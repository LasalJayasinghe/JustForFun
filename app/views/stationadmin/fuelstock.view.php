<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/stationstyles.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/css/deletepopup.css" rel="stylesheet">
  <style>
    #restock {
      color: #E14761;
    }
  </style>
  <title>Fuel Stock</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data);
  ?>

  <form method="GET" id="filterForm">

    <div class='filterinput'>
      <label for="daterange">Date Range:</label>
      <input type="date" name="start_date" id="start_date" class='input-filters' placeholder="From" value="<?= set_value('start_date') ?>">
      <label for="daterange">to</label>
      <input type="date" name="end_date" id="end_date" class='input-filters' placeholder="To" value="<?= set_value('end_date') ?>">
    </div>

    <div class='filterinput'>
      <label for="fuel_search">Search by Fuel:</label>
      <select value="<?= set_value('fuel_search') ?>" type="text" name="fuel_search" id="fuel_search" placeholder="Search by user" class='input-filters' required1>
        <option value='' selected disabled>select fuel type</option>
        <option value=''>All</option>
        <option value='petrol92'>Petrol92</option>
        <option value='petrol95'>Petrol95</option>
        <option value='dieselauto'>Auto Diesel</option>
        <option value='dieselsuper'>Super Diesel</option>
      </select>
    </div>

    <button type="submit" value="Apply Filters" class='primarybutton'>Apply filter</button>
  </form>



  <div class="operator-deets">
    <div class="table-container">
      <table class="table" id="table-data">
        <tr>
          <th>Fuel Type</th>
          <th>Amount(G)</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan='2'>Actions</th>
        </tr>
        <?php $rows = $data['rows'];
        if (!empty($rows)) : ?>
          <?php foreach ($rows as $row) : ?>
            <tr>
              <td data-label="Fuel Type"><?= $row['fuel_type'] ?></td>
              <td data-label="Fuel Amount"> <?= $row['fuel_amount'] ?> </td>
              <td data-label="Date"><?= date('Y-m-d', strtotime($row['update_time'])) ?></td>
              <td data-label="Time"><?= date('H:i', strtotime($row['update_time'])) ?></td>
              <!-- <td data-label="Update">
                <img src='<?= ROOT ?>/assets/images/edit.svg' alt="edit" class="edit" id="<?= $row['restocking_id'] ?>">
              </td> -->
              <td data-label="Delete">
                <button class="delete-btn" id="<?= $row['restocking_id'] ?>">
                  <img src="<?= ROOT ?>/assets/images/delete.svg" alt="delete">
                </button>
              </td>
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

    <div id='divider'></div>

    <div class="op-form-content">
      <h3>Add Restocking Details</h3>
      <form class='forum-form' method="POST">
        <label for="station_id">Station ID</label>
        <input value="<?= Auth::getStation_id() ?>" type="text" id="station_id" name="station_id" placeholder="station_id" class='inputs3' readonly>
        <br><br>

        <label for="fuel_amount">Fuel amount</label>
        <input value="<?= set_value('fuel_amount') ?>" type="number" id="fuel_amount" name="fuel_amount" placeholder="in gallons" class='inputs3' required1>
        <?php if (!empty($errors['fuel_amount'])) : ?>
          <div class="error"><?= $errors['fuel_amount'] ?></div>
        <?php endif; ?>
        <br><br>

        <select value="<?= set_value('fuel_type') ?>" class='inputs3' type="text" name="fuel_type" required1>
          <option value='fuel_type' selected disabled>select fuel type</option>
          <option value='petrol92'>Petrol92</option>
          <option value='petrol95'>Petrol95</option>
          <option value='dieselauto'>Auto Diesel</option>
          <option value='dieselsuper'>Super diesel</option>
        </select>
        <?php if (!empty($errors['fuel_type'])) : ?>
          <div class="error"><?= $errors['fuel_type'] ?></div>
        <?php endif; ?>
        <br><br>
        <input type="submit" name="submit" value="Submit" class='primarybutton'>
      </form>
    </div>

    <script>
      // Select all delete buttons
      const deleteButtons = document.querySelectorAll('.delete-btn');

      // Loop through delete buttons and add click event listener
      deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
          // Prevent default form submit
          event.preventDefault();

          // Get fuelstock ID from button ID attribute
          const fuelstockId = button.getAttribute('id');

          // Create confirmation popup
          const confirmation = document.createElement('div');
          confirmation.classList.add('confirm-delete');
          confirmation.innerHTML = `
      <div class="popup">
        <h3>Are you sure you want to delete?</h3>
        <button id="confirm-yes">Yes</button>
        <button id="confirm-no">No</button>
      </div>
    `;

          // Add confirmation popup to document body
          document.body.appendChild(confirmation);

          // Add click event listener to confirmation buttons
          const confirmYesButton = confirmation.querySelector('#confirm-yes');
          confirmYesButton.addEventListener('click', () => {
            // If "Yes" is clicked, submit form
            window.location.href = `<?= ROOT ?>/Station_deletefuel/${fuelstockId}`;
            // Remove confirmation popup from document body
            confirmation.remove();
          });

          const confirmNoButton = confirmation.querySelector('#confirm-no');
          confirmNoButton.addEventListener('click', () => {
            // If "No" is clicked, remove confirmation popup from document body
            confirmation.remove();
          });
        });
      });
    </script>
</body>

</html>