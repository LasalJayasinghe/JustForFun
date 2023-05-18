<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href = "<?=ROOT?>/assets/css/customerstyles.css" rel = "stylesheet">
</head>
<body>
    
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <h1 class="title">Profile</h1>

    <?php if(Auth::loggedin()):?>
        <div class="mapcontainer">
		<div class="left">
        <?php if(Auth::loggedin()):?>
          <div class='dp1'>
                <img class='dp1' src="<?=ROOT?>/assets/images/customer.svg">
          </div>
        <?php endif; ?>
        <a href="<?= ROOT ?>/logout"><button type="button"class="primarybutton">Log Out</button></a>
        <form method="POST">
          <button type="submit" name='disable' class="secondarybutton">Disable Account</button>
        </form>
		</div>
		<div class="right">
        <div class="table-container">
  <h2>Owner Information</h2>

  <table>
      <tr>
        <th>NIC</th><td><?= $data['row']['nic']; ?></td>
        </tr><tr>
        <th>Phone</th><td><?= $data['row']['phone']; ?></td>
        </tr><tr>
        <th>Name</th><td><?= $data['row']['name']; ?></td>
        </tr><tr>
        <th>Email</th><td><?= $data['row']['email']; ?></td>
      </tr>
    <tbody> 
</tbody>
  </table>

  <h2>Vehicle Information</h2>
  <table>
    <tr>
        <th>Vehicle No.</th><td><?=$data['vehicles']['vehicleno'] ?></td>
            </tr><tr>
        <th>Type</th><td><?= $data['vehicles']['category']; ?></td>
        </tr><tr>
        <th>Fuel Type</th><td><?= $data['vehicles']['fuel']; ?></td>
        </tr><tr>
        <th>Chassis</th><td><?= $data['vehicles']['chassis_number']; ?></td>
      </tr>
    </tbody>
  </table>
  <a href="<?= ROOT ?>/Cus_profileupdate">
            <button type="update" class="primarybutton"><b>Update</b></button>
          </a>
</div>
</div>
	</div>



    <?php else:?>
        <h3>Login as customer to access the customer features</h3>
    <?php endif;?>
</body>
</html>