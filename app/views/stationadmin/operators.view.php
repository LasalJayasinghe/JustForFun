<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/assets/css/stationstyles.css" rel="stylesheet">
  <link href="<?= ROOT ?>/assets/css/deletepopup.css" rel="stylesheet">
  <style>
    #operators {
      color: #E14761;
    }
  </style>
  <title>Fuel Stock</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data);
  ?>
  <div class="operator-deets">
    <div class="operators-table-container">
      <table class="table-small" id="table-data">
        <tr>
          <th>Emp Code</th>
          <th>Name</th>
          <th>Online</th>
          <th colspan='2'>Last Online</th>
          <th>Acc. status</th>
          <th colspan='2'>Actions</th>
        </tr>
        <tbody>
          <?php $rows = $data['rows'];
          if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <td data-label="Emp code"><?= $row['code'] ?></td>
                <td data-label="Name"> <?= $row['name'] ?> </td>
                <!-- <td data-label="Online"> <?= $row['loggedin_status'] ?> </td> -->
                <td data-label="Online">
                  <?php if ($row['loggedin_status']) : ?>
                    <img src='<?= ROOT ?>/assets/images/green.svg'>
                  <?php else : ?>
                    <img src='<?= ROOT ?>/assets/images/red.svg'>
                  <?php endif; ?>
                </td>
                <td data-label="Date"><?= date('Y-m-d', strtotime($row['last_online'])) ?></td>
                <td data-label="Time"><?= date('H:i', strtotime($row['last_online'])) ?></td>
                <td data-label="Status"> <?= $row['Account_status'] ?> </td>
                <td data-label="password update">
                  <!-- <button class="password-btn" id="<?= $row['code'] ?>">
                    <img src="<?= ROOT ?>/assets/images/edit.svg" alt="delete">
                  </button> -->
                  <a href="<?= ROOT ?>/Station_operatorpasswordchange/<?= $row['code'] ?>">
                    <button class="update-btn">
                      <img src='<?= ROOT ?>/assets/images/passwordreset.svg' alt="edit" class="edit" ?>
                    </button>
                  </a>
                </td>
                <td data-label="Update">
                  <a href="<?= ROOT ?>/Station_operatorupdate/<?= $row['code'] ?>">
                    <button class="update-btn">
                      <img src='<?= ROOT ?>/assets/images/edit.svg' alt="edit" class="edit" ?>
                    </button>
                  </a>
                </td>
                <td data-label="Delete">
                  <button class="delete-btn" id="<?= $row['code'] ?>">
                    <img src="<?= ROOT ?>/assets/images/delete.svg" alt="delete">
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      <?php else : ?>
        <tr>
          <td colspan="5">no records</td>
        </tr>
      <?php endif; ?>
      </table>
    </div>

    <div id='divider'></div>

    <div class="op-form-content">
      <h3>Add Employee Details</h3>
      <form class='forum-form' method="POST" action="<?= ROOT ?>/formhandler">
        <label for="station_id">Station ID</label>
        <input value="<?= Auth::getStation_id() ?>" type="text" id="station_id" name="station_id" placeholder="Station_id" class='inputs4' readonly>
        <br>
        <label for="code">Employee Code</label>
        <input type="text" id="code" name="code" placeholder="Code" class='inputs4'>
        <?php if (!empty($errors['code'])) : ?>
          <div class="error"><?= $errors['code'] ?></div>
        <?php endif; ?>
        <br>

        <label for="Name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" class='inputs4'>
        <?php if (!empty($errors['name'])) : ?>
          <div class="error"><?= $errors['name'] ?></div>
        <?php endif; ?>
        <br>

        <label for="Email">Email</label>
        <input type="text" id="email" name="email" placeholder="Email" class='inputs4'>
        <?php if (!empty($errors['email'])) : ?>
          <div class="error"><?= $errors['email'] ?></div>
        <?php endif; ?>
        <br><br>

        <input type="submit" name="add_new" value="Add Operator" class='primarybutton'>
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
          const operatorID = button.getAttribute('id');

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
            window.location.href = `<?= ROOT ?>/Station_deleteoperator/${operatorID}`;
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