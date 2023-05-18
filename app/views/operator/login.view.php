<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Station Operator Login</title>
    <link href = "../public/assets/css/loginstyles.css" rel = "stylesheet">
    <link href = "../public/assets/css/operatorstyles.css" rel = "stylesheet">
</head>
<body class='loginbody'>
    <img src="assets/images/whitelogo.png" alt="logo" class="logo" id='logo'>
    <h1>Station Operator</h1>
    <div class="container0">
        <form action="" method="post">
            <div class='formtitle'>
                <a href="<?=ROOT?>">
                    <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4962 22.5833L0.698163 12.8142C0.581865 12.6979 0.499294 12.572 0.450449 12.4363C0.401604 12.3006 0.377569 12.1552 0.378345 12.0002C0.378345 11.8451 0.402379 11.6997 0.450449 11.564C0.498519 11.4284 0.58109 11.3024 0.698163 11.1861L10.4962 1.388C10.7676 1.11664 11.1068 0.980957 11.5138 0.980957C11.9209 0.980957 12.2698 1.12633 12.5605 1.41707C12.8513 1.70782 12.9966 2.04702 12.9966 2.43468C12.9966 2.82234 12.8513 3.16154 12.5605 3.45228L4.01265 12.0002L12.5605 20.548C12.8319 20.8194 12.9676 21.154 12.9676 21.5517C12.9676 21.9494 12.8222 22.2933 12.5315 22.5833C12.2407 22.874 11.9015 23.0194 11.5138 23.0194C11.1262 23.0194 10.787 22.874 10.4962 22.5833Z" fill="#35363A"/>
                    </svg>
                </a>
                <h3>Operator Login</h3>
            </div>
            <label for="code">Employee code</label><br/>
            <input value="<?=set_value('code')?>" type="text" name="code" id="code" class='inputs' placeholder='135100' required><br/><br/>
            <label for="password">Password</label><br/>
            <input type="password" name="password" id="password" class='inputs' required><br/><br/>
            <div class='buttoncont'>    
                <button type="submit" value="Login" class='primarybutton'>Login</button>
                <button type="reset" class='secondarybutton'>Clear</button>
            </div>
        </form>
    </div>
</body>
</html>
