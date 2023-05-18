<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/assets/css/loginstyles.css" rel="stylesheet">
    <!-- <link href="../public/assets/css/adminstyles.css" rel="stylesheet"> -->
    <title>operator-Signup</title>
</head>
<body id='loginpagebody'>
    <div class='container'>
        <div id="loginform">
            <h1>Admin Sign up</h1>
            <form method="POST"> <!-- Front end bit to get login deets -->
                <input value="<?=set_value('code')?>" class='inputsignin' type="text" name="code" placeholder="Admin name" required1>
                <?php if(!empty($errors['username'])):?>
                    <div class="error"><?=$errors['username']?></div>
                <?php endif;?><br/></br>
                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton">Reset</button>
                    <button type="submit" name="login" class="primarybutton">Sign in</button>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>
