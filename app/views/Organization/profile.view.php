<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">
  <link href="<?= ROOT ?>/assets/css/profilee.css" rel="stylesheet">
  <title>Profile</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data)
  ?>

  <br>
  <?php
  $row = $data['row'];
    if (!empty($row)) : ?>
    <div class="profile-card">
      <div class="card">
        <div><img src="<?= ROOT ?>/assets/images/logo.png" alt="logo"  style="float:left" id="gas"></div>

        <div class="buttoncontainer">
          <a href="<?= ROOT ?>/logout">
            <button type="submit" class="secondarybutton">Logout</button>
          </a>
          <a href="<?= ROOT ?>/Org_logout">
            <button type="submit" class="primarybutton">Deactivate</button>
          </a>
        </div>
      </div>

      <div class="form-container">
        <div class="form">

        <h1>Profile</h1>

        <table id="profile">
          <tr>
            <td>Business Registration Number</td>
            <td><?= $row['brn'] ?></td>
          </tr>
          <tr>
            <td>Company Name</td>
            <td><?= $row['companyname'] ?></td>
          </tr>
          <tr>
            <td>Mobile No</td>
            <td><?= $row['mobileno'] ?></td>
          </tr>
          <tr>
            <td>Email</td>
      <td><?= $row['email'] ?></td>
          </tr>
          <tr>
            
        </table>
        <a href="<?= ROOT ?>/Org_profileupdate">
            <button type="update" class="primarybutton" style="float:right"><b>Update</b></button>
          </a>

      </div>
    </div>

  <?php else : ?>
    <h4>That profile was not found</h4>
  <?php endif; ?>
<!-- ------------------------------------------------------------------------------------- -->
  <!-- <button onclick="showPopup()">Update Table</button>

<div id="popup" style="display:none;">
  <form>
    <label for="cell1">Cell 1:</label>
    <input type="text" id="cell1" name="cell1"><br>

    <label for="cell2">Cell 2:</label>
    <input type="text" id="cell2" name="cell2"><br>

    <input type="submit" value="Update">
  </form>

  
</div>
</body>
<script>
  function showPopup() {
  document.getElementById("popup").style.display = "block";
}

document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault();
  // code to update the cell table goes here
  document.getElementById("popup").style.display = "none";
});
</script> -->

</html>
