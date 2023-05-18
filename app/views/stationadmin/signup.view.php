<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale.0">
    <link href="../public/assets/css/loginstyles.css" rel="stylesheet">
    <title>Admin-Signup</title>
    <style>
        .dropdown {
            padding: 10px;
            width: 40%;
        }

        .inputflex {
            display: flex;
            flex-direction: row;
            justify-content: left;
            column-gap: 5%;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body id='loginpagebody'>


    <div class='container'>
        <div id='logo-side'><img id='logolarge' src='../public/assets/images/logo2.png'></div>
        <div id="loginform">
            <div class='formtitle'>
                <a href="<?= ROOT ?>">
                    <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4962 22.5833L0.698163 12.8142C0.581865 12.6979 0.499294 12.572 0.450449 12.4363C0.401604 12.3006 0.377569 12.1552 0.378345 12.0002C0.378345 11.8451 0.402379 11.6997 0.450449 11.564C0.498519 11.4284 0.58109 11.3024 0.698163 11.1861L10.4962 1.388C10.7676 1.11664 11.1068 0.980957 11.5138 0.980957C11.9209 0.980957 12.2698 1.12633 12.5605 1.41707C12.8513 1.70782 12.9966 2.04702 12.9966 2.43468C12.9966 2.82234 12.8513 3.16154 12.5605 3.45228L4.01265 12.0002L12.5605 20.548C12.8319 20.8194 12.9676 21.154 12.9676 21.5517C12.9676 21.9494 12.8222 22.2933 12.5315 22.5833C12.2407 22.874 11.9015 23.0194 11.5138 23.0194C11.1262 23.0194 10.787 22.874 10.4962 22.5833Z" fill="#35363A" />
                    </svg>
                </a>
                <h1>Station Registration</h1>
            </div>
            <form id="myForm" method="post"> <!-- Front end bit to get login deets -->
                <input value="<?= set_value('station_id') ?>" oninput="validateInputs()" class='inputsignin' type="text" name="station_id" id="station_id" placeholder="Station registration number">
                <?php if (!empty($errors['station_id'])) : ?>
                    <div class="error"><?= $errors['station_id'] ?></div>
                <?php endif; ?>
                <br>

                <input value="<?= set_value('name') ?>" oninput="validateInputs()" class='inputsignin' type="text" name="name" id="station_name" placeholder="Station name">
                <?php if (!empty($errors['name'])) : ?>
                    <div class="error"><?= $errors['name'] ?></div>
                <?php endif; ?>
                <br>

                <input value="<?= set_value('phone') ?>" oninput="validateInputs()" class='inputsignin' type="text" name="phone" id="phone" placeholder="Phone number">
                <?php if (!empty($errors['phone'])) : ?>
                    <div class="error"><?= $errors['phone'] ?></div>
                <?php endif; ?>
                <br>

                <div class='inputflex'>
                    <select value="<?= set_value('company') ?>" oninput="validateInputs()" class='inputsignin dropdown' type="text" name="company" id="company" placeholder="company">
                        <option value='' selected disabled>select company</option>
                        <option value='IOC'>IOC</option>
                        <option value='CEP'>CEP</option>
                        <option value='LGF'>Laugfs</option>
                    </select>
                    <input value="<?= set_value('email') ?>" oninput="validateInputs()" class='inputsignin2' type="email" name="email" id="email" placeholder="Email">
                </div>

                <div class='inputflex'>
                    <?php if (!empty($errors['company'])) : ?>
                        <div class="error"><?= $errors['company'] ?></div>
                    <?php endif; ?>

                    <?php if (!empty($errors['email'])) : ?>
                        <div class="error"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>


                <input value="<?= set_value('password') ?>" oninput="validateInputs()" class='inputsignin' type="password" name="password" id="password" placeholder="Password">
                <?php if (!empty($errors['password'])) : ?>
                    <div class="error"><?= $errors['password'] ?></div>
                <?php endif; ?>
                <br>

                <input value="<?= set_value('Rpassword') ?>" oninput="validateInputs()" class='inputsignin' type="password" name="Rpassword" id="Rpassword" placeholder="Retype password">
                <?php if (!empty($errors['Rpassword'])) : ?>
                    <div class="error"><?= $errors['Rpassword'] ?></div>
                <?php endif; ?>
                <br>

                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton" onclick="clearErrors()">Reset</button>
                    <button type="submit" class="primarybutton">Next</button>
                </div>
                <div>
                    Already have an account? <a class="signuplink" href="<?= ROOT ?>/login?usertype=station">Login</a>
                </div>

            </form>
        </div>
    </div>

    <script>

        function clearErrors() {
            // Get all error elements and clear their innerHTML
            var errorElements = document.getElementsByClassName("error");
            for (var i = 0; i < errorElements.length; i++) {
                errorElements[i].innerHTML = "";
            }
        }
    </script>
</body>

</html>