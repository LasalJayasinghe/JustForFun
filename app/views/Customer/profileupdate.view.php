<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/dashboard.css">
  <link href="<?= ROOT ?>/assets/css/profilee.css" rel="stylesheet">
  
  <title>Profile update</title>
</head>

<body>
  <?php
  $this->view('includes/nav', $data)
  ?>

  <?php 
    $row = $data['row'];
  if (!empty($row)) : ?>
    <div class="profile-card">
      <div class="card">
        <div><img src="<?=ROOT?>/assets/images/profiles/customer.svg" alt="logo" id="gas"></div>
        <div class="buttoncontainer">
          <!-- <div id="new" class="new"><button type="save" class="forword">Change password</button></div> -->
          <a href="<?= ROOT ?>/profilepasswordupdate">
            <button type="submit" class="forword">Change Password</button>
          </a>

          <a href="<?= ROOT ?>/logout">
            <button type="reset" class="Back">Logout</button>
          </a>
        </div>
      </div>

      <div class="form-container">
        <h1>Profile Update</h1>

        <form method="post">
          <!-- Front end bit to get login deets -->
          <label for="fname">NIC:</label>
          <input value="<?= $row['nic'] ?>" class='inputsignin' type="text" name="nic" id="nic" placeholder="NIC" readonly>
          <br>

          <label for="fname">Name:</label>
          <svg style ="float:right" version="1.0" xmlns="http://www.w3.org/2000/svg"
              width="12pt" height="12pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
              <path d="M4253 5080 c-78 -20 -114 -37 -183 -83 -44 -29 -2323 -2296 -2361 -2349 -21 -29 -329 -1122 -329 -1168 0 -56 65 -120 122 -120 44 0 1138 309 1166 329 15 11 543 536 1174 1168 837 838 1157 1165 1187 1212 74 116 105 270 82 407 -7 39 -30 105 -53 154 -36 76 -55 99 -182 226 -127 127 -150 145 -226 182 -135 65 -260 78 -397 42z m290 -272 c55 -27 258 -231 288 -288 20 -38 24 -60 24 -140 0 -121 -18 -160 -132 -279 l-82 -86 -303 303 -303 303 88 84 c49 46 108 93 132 105 87 42 203 41 288 -2z m-383 -673 l295 -295 -933 -932 -932 -933 -295 295 c-162 162 -295 299 -295 305 0 13 1842 1855 1855 1855 6 0 143 -133 305 -295z m-1822 -2284 c-37 -12 -643 -179 -645 -178 -1 1 30 115 68 252 38 138 79 285 91 329 l21 78 238 -238 c132 -132 233 -241 227 -243z"/> 
              <path d="M480 4584 c-209 -56 -370 -206 -444 -414 l-31 -85 0 -1775 c0 -1693 1 -1778 18 -1834 37 -120 77 -187 167 -277 63 -63 104 -95 157 -121 146 -73 3 -69 2113 -66 l1895 3 67 26 c197 77 336 218 401 409 22 64 22 74 25 710 3 579 2 648 -13 676 -21 40 -64 64 -114 64 -33 0 -49 -7 -79 -34 l-37 -34 -5 -634 c-5 -631 -5 -633 -28 -690 -41 -102 -118 -179 -220 -220 l-57 -23 -1834 -3 c-1211 -1 -1853 1 -1890 8 -120 22 -227 104 -277 213 l-29 62 0 1760 0 1760 29 63 c37 80 122 161 203 194 l58 23 630 5 c704 6 664 1 700 77 23 48 13 95 -31 138 l-35 35 -642 -1 c-533 0 -651 -3 -697 -15z"/> 
            </g>
          </svg>
          <input value="<?= $row['name'] ?>" class='inputsignin' type="text" name="name" id="name" placeholder="Name" >
          <?php if (!empty($errors['companyname'])) : ?>
            <div class="error"><?= $errors['companyname'] ?></div>
          <?php endif; ?>
          <br>

          <label for="fname">Mobile No:</label>
          <svg style ="float:right" version="1.0" xmlns="http://www.w3.org/2000/svg"
              width="12pt" height="12pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
              <path d="M4253 5080 c-78 -20 -114 -37 -183 -83 -44 -29 -2323 -2296 -2361 -2349 -21 -29 -329 -1122 -329 -1168 0 -56 65 -120 122 -120 44 0 1138 309 1166 329 15 11 543 536 1174 1168 837 838 1157 1165 1187 1212 74 116 105 270 82 407 -7 39 -30 105 -53 154 -36 76 -55 99 -182 226 -127 127 -150 145 -226 182 -135 65 -260 78 -397 42z m290 -272 c55 -27 258 -231 288 -288 20 -38 24 -60 24 -140 0 -121 -18 -160 -132 -279 l-82 -86 -303 303 -303 303 88 84 c49 46 108 93 132 105 87 42 203 41 288 -2z m-383 -673 l295 -295 -933 -932 -932 -933 -295 295 c-162 162 -295 299 -295 305 0 13 1842 1855 1855 1855 6 0 143 -133 305 -295z m-1822 -2284 c-37 -12 -643 -179 -645 -178 -1 1 30 115 68 252 38 138 79 285 91 329 l21 78 238 -238 c132 -132 233 -241 227 -243z"/> 
              <path d="M480 4584 c-209 -56 -370 -206 -444 -414 l-31 -85 0 -1775 c0 -1693 1 -1778 18 -1834 37 -120 77 -187 167 -277 63 -63 104 -95 157 -121 146 -73 3 -69 2113 -66 l1895 3 67 26 c197 77 336 218 401 409 22 64 22 74 25 710 3 579 2 648 -13 676 -21 40 -64 64 -114 64 -33 0 -49 -7 -79 -34 l-37 -34 -5 -634 c-5 -631 -5 -633 -28 -690 -41 -102 -118 -179 -220 -220 l-57 -23 -1834 -3 c-1211 -1 -1853 1 -1890 8 -120 22 -227 104 -277 213 l-29 62 0 1760 0 1760 29 63 c37 80 122 161 203 194 l58 23 630 5 c704 6 664 1 700 77 23 48 13 95 -31 138 l-35 35 -642 -1 c-533 0 -651 -3 -697 -15z"/> 
            </g>
          </svg>
          <input value="<?= $row['phone'] ?>" class='inputsignin' type="text" name="phone" id="phone" placeholder="mobileno" required>
          <?php if (!empty($errors['mobileno'])) : ?>
            <div class="error"><?= $errors['mobileno'] ?></div>
          <?php endif; ?>
          <br>

         <label for="fname">Email:</label>
         <svg style ="float:right" version="1.0" xmlns="http://www.w3.org/2000/svg"
              width="12pt" height="12pt" viewBox="0 0 512.000000 512.000000"  preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
              <path d="M4253 5080 c-78 -20 -114 -37 -183 -83 -44 -29 -2323 -2296 -2361 -2349 -21 -29 -329 -1122 -329 -1168 0 -56 65 -120 122 -120 44 0 1138 309 1166 329 15 11 543 536 1174 1168 837 838 1157 1165 1187 1212 74 116 105 270 82 407 -7 39 -30 105 -53 154 -36 76 -55 99 -182 226 -127 127 -150 145 -226 182 -135 65 -260 78 -397 42z m290 -272 c55 -27 258 -231 288 -288 20 -38 24 -60 24 -140 0 -121 -18 -160 -132 -279 l-82 -86 -303 303 -303 303 88 84 c49 46 108 93 132 105 87 42 203 41 288 -2z m-383 -673 l295 -295 -933 -932 -932 -933 -295 295 c-162 162 -295 299 -295 305 0 13 1842 1855 1855 1855 6 0 143 -133 305 -295z m-1822 -2284 c-37 -12 -643 -179 -645 -178 -1 1 30 115 68 252 38 138 79 285 91 329 l21 78 238 -238 c132 -132 233 -241 227 -243z"/> 
              <path d="M480 4584 c-209 -56 -370 -206 -444 -414 l-31 -85 0 -1775 c0 -1693 1 -1778 18 -1834 37 -120 77 -187 167 -277 63 -63 104 -95 157 -121 146 -73 3 -69 2113 -66 l1895 3 67 26 c197 77 336 218 401 409 22 64 22 74 25 710 3 579 2 648 -13 676 -21 40 -64 64 -114 64 -33 0 -49 -7 -79 -34 l-37 -34 -5 -634 c-5 -631 -5 -633 -28 -690 -41 -102 -118 -179 -220 -220 l-57 -23 -1834 -3 c-1211 -1 -1853 1 -1890 8 -120 22 -227 104 -277 213 l-29 62 0 1760 0 1760 29 63 c37 80 122 161 203 194 l58 23 630 5 c704 6 664 1 700 77 23 48 13 95 -31 138 l-35 35 -642 -1 c-533 0 -651 -3 -697 -15z"/> 
            </g>
          </svg>
          <input value="<?= $row['email'] ?>" class='inputsignin' type="email" name="email" id="email" placeholder="Email" required>
          <?php if (!empty($errors['email'])) : ?>
            <div class="error"><?= $errors['email'] ?></div>
          <?php endif; ?>
          <br>

          <a href="<?= ROOT ?>/profile">
            <button type="submit" class="Back">Back</button>
          </a>

          <a href="<?= ROOT ?>/profile">
            <button type="submit" class="forword">Save</button>
          </a>
        </form>
      </div>
    </div>

  <?php else : ?>
    <h4>That profile was not found</h4>
  <?php endif; ?>

  <div id='changepassword' class='Change-new'>
    <div class="Change-content">
      <span class="close">&times;</span>
      <h1>Change Password</h1>
      <?php if (!empty($row)) : ?>
        <form id="form" method="POST" action="<?= ROOT ?>/profilepasswordupdate/<?= $row['id'] ?>">
          <!-- <label for="oldPassword">Old Password</label><br>
          <input type="password" id="oldPassword" name="oldPassword" placeholder="Old Password" required><br>
          <?php if (!empty($errors['oldPassword'])) : ?>
            <div class="error"><?= $errors['oldPassword'] ?></div>
          <?php endif; ?>

          <label for="password">New Password</label><br>
          <input value="id="password" name="password" placeholder="New Password" required><br>
          <?php if (!empty($errors['password'])) : ?>
            <div class="error"><?= $errors['password'] ?></div>
          <?php endif; ?>

          <label for="c_np">New Password Again</label><br>
          <input type="password" id="c_np" name="c_np" placeholder="New Password Again" required><br>
          <?php if (!empty($errors['c_np'])) : ?>
            <div class="error"><?= $errors['c_np'] ?></div>
          <?php endif; ?>

          <div class="Change-buttoncontainer">
            <button type="submit" class="forword">Save</button>
          </div>
        </form> -->
      <?php else : ?>
        <h4>That profile was not found</h4>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Get the modal and the div to be clicked
    var modal = document.getElementById("changepassword");
    var div = document.getElementById("new");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the div, open the modal
    div.onclick = function() {
      document.getElementById("form").reset();
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }


    // var form = document.getElementById("myForm");
    // form.addEventListener('submit', function(e) {
    //   e.preventDefault();
    //   // Perform custom validation logic here
    // });
  </script>

</body>

</html>