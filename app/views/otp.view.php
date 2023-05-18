<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/assets/css/loginstyles.css" rel="stylesheet">
    
    <title>Admin-Login</title>
</head>
<body id='loginpagebody'>
    <div class='container'>
        <div id='logo-side'><img id='logolarge' src='../public/assets/images/whitelogo.png'></div>
        <div id="loginform">
            <h1>OTP verification</h1>
            <p>Enter the OTP sent to your email</p>
            <form method="POST">
                <div class="inputcontainer">
                    <input type="text" name="1" class="otp" maxlength="1">
                    <input type="text" name="2" class="otp" maxlength="1">
                    <input type="text" name="3" class="otp" maxlength="1">
                    <input type="text" name="4" class="otp" maxlength="1">
                    <input type="text" name="5" class="otp" maxlength="1">
                    <input type="text" name="6" class="otp" maxlength="1">
                </div>
                <div class="errorcontainer">
                    <p class="error"><?= $data['errors']['otp'] ?></p>
                </div>
                <div id="buttoncontainer">
                    <button type="submit" name="resend" class="secondarybutton">Resend OTP</button>
                    <button type="submit" name="login" class="primarybutton">Verify</button>
                </div>
            </form>
        </div> 
    </div>
    <div>
    
    </div>
</body>
<script>
        var inputs = document.querySelectorAll('.otp');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keyup', function (e) {
                if (e.target.value.length == e.target.maxLength) {
                    var next = e.target;
                    while (next = next.nextElementSibling) {
                        if (next == null)
                            break;
                        if (next.tagName.toLowerCase() == 'input') {
                            next.focus();
                            break;
                        }
                    }
                }
            });
        }

        inputs[i].addEventListener('keydown', function (e) {
                    if (e.keyCode == 8 || e.keyCode == 46 && e.target.value.length == 0) {
                        var previous = e.target;
                        while (previous = previous.previousElementSibling) {
                            if (previous == null)
                                break;
                            if (previous.tagName.toLowerCase() == 'input') {
                                previous.focus();
                                break;
                            }
                        }
                    }
                });
    </script>
</html>