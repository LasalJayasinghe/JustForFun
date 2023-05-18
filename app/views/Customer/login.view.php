<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=ROOT?>/assets/css/loginstyles.css" rel="stylesheet">
    <title>Login</title>
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
                <h1>Private account Login</h1>
            </div>
            <form method="POST"> <!-- Front end bit to get login deets -->
                <input value="<?=set_value('email')?>" class='inputsignin' type="text" name="email" placeholder="Enter your email">
                <?php if (isset($data['errors']['email'])) : ?>
                    <p class="error"><?php echo $data['errors']['email']; ?></p>
                <?php endif; ?>
                <br/></br>
                <input value="<?=set_value('password')?>" class='inputsignin' type="password" name="password" placeholder="Enter password">
                <?php if (isset($data['errors']['password'])) : ?>
                    <p class="error"><?php echo $data['errors']['password']; ?></p>
                <?php endif; ?>
                <br/><br/>
                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton">Reset</button>
                    <button type="submit" class="primarybutton">Login</button>
                </div>
                <div>
                    Don't have an account? <a class="signuplink" href="signup?usertype=customer">Sign up</a>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>
