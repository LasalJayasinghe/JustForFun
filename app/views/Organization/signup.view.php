<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=ROOT?>/assets/css/loginstyles.css" rel="stylesheet">
    <title>Signup</title>
</head>
<body id='loginpagebody'>
    <div class='container'>
      <div id='logo-side'><img id='logolarge' src='<?=ROOT?>/assets/images/whitelogo.png'></div>
        <div id="loginform">
        <div class='formtitle'>
                <a href="<?=ROOT?>">
                    <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4962 22.5833L0.698163 12.8142C0.581865 12.6979 0.499294 12.572 0.450449 12.4363C0.401604 12.3006 0.377569 12.1552 0.378345 12.0002C0.378345 11.8451 0.402379 11.6997 0.450449 11.564C0.498519 11.4284 0.58109 11.3024 0.698163 11.1861L10.4962 1.388C10.7676 1.11664 11.1068 0.980957 11.5138 0.980957C11.9209 0.980957 12.2698 1.12633 12.5605 1.41707C12.8513 1.70782 12.9966 2.04702 12.9966 2.43468C12.9966 2.82234 12.8513 3.16154 12.5605 3.45228L4.01265 12.0002L12.5605 20.548C12.8319 20.8194 12.9676 21.154 12.9676 21.5517C12.9676 21.9494 12.8222 22.2933 12.5315 22.5833C12.2407 22.874 11.9015 23.0194 11.5138 23.0194C11.1262 23.0194 10.787 22.874 10.4962 22.5833Z" fill="#35363A"/>
                    </svg>
                </a>
                <h2>Business Acc. registration</h2>
            </div>
            <form method="POST"> <!-- Front end bit to get login deets -->
                <input value="<?=set_value('companyname')?>" class='inputsignin' type="text" name="companyname" placeholder="Company Name" required>
                <?php if(!empty($errors['companyname'])):?>
                    <div class="error"><?=$errors['companyname']?></div>
                <?php endif;?><br/></br>

                <input value="<?=set_value('brn')?>" class='inputsignin' type="text" name="brn" placeholder="Business Registration Number" required>
                <?php if(!empty($errors['brn'])):?>
                    <div class="error"><?=$errors['brn']?></div>
                <?php endif;?><br/></br>

                <input value="<?=set_value('email')?>" class='inputsignin' type="email" name="email" placeholder="Email address" required>
                <?php if(!empty($errors['email'])):?>
                    <div class="error"><?=$errors['email']?></div>
                <?php endif;?><br/><br/>

                <input value="<?=set_value('mobileno')?>" class='inputsignin' type="number" name="mobileno" placeholder="Mobile Number" required>
                <?php if(!empty($errors['mobileno'])):?>
                    <div class="error"><?=$errors['mobileno']?></div>
                <?php endif;?><br/></br>

                <input value="<?=set_value('password_hash')?>" class='inputsignin' type="password" name="password_hash" placeholder="Enter password" required>
                <?php if(!empty($errors['password_hash'])):?>
                    <div class="error"><?=$errors['password_hash']?></div>
                <?php endif;?><br/><br/>

                <input class='inputsignin' type="password" name="password_confirmation" placeholder="Confirm password" required>
                <?php if(!empty($errors['password_confirmation'])):?>
                    <div class="error"><?=$errors['password_confirmation']?></div>
                <?php endif;?><br/><br/>

                <div>
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">I agree to the  <a href="<?=ROOT?>/Terms">Terms & Conditions</a>. </label>
                </div>
                
                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton" onclick=clearErrors()>Reset</button>
                    <button type="submit" name='submit' class="primarybutton" value="submit">Register</button>

                </div>
                <div>
                    Already have an account? <a class="signuplink" href="<?=ROOT?>/login?usertype=org">Login</a>
                </div>
            </form>
        </div> 
      </div>
    </div>
</body>

<script>
function clearErrors() {
  // Get all error elements and clear their innerHTML
  var errorElements = document.getElementsByClassName("error");
  for (var i = 0; i < errorElements.length; i++) {
    errorElements[i].innerHTML = "";
  }
}
</script>
</html>
