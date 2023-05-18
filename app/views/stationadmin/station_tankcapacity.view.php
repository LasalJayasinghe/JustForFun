<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/assets/css/loginstyles.css" rel="stylesheet">
    <title>Admin-Signup</title>
</head>
<style>
    .error1 {
        color: red;
        font-size: 12px;
        padding: 0px;
        margin-left: 270px;
    }

    /* .error{
    color: red;
    font-size: 12px;
    padding: 0px;
    margin-top: 5px;
} */
</style>

<body id='loginpagebody'>
    <div class='container'>
        <div id='logo-side'><img id='logolarge' src='../public/assets/images/logo2.png'></div>
        <div id="loginform">
            <h1>Station Tank Capacity</h1>
            <form method="post"> <!-- Front end bit to get login deets -->
                <div class='inputflex'>
                    <input value="<?= set_value('petrol95_tank') ?>" class='inputsignin2' type="number" name="petrol95_tank" id="petrol95_tank" placeholder="Petrol95 Tank">
                    <input value="<?= set_value('petrol95_bal') ?>" class='inputsignin2' type="number" name="petrol95_bal" id="petrol95_bal" placeholder="Petrol95 Current Balance">
                </div>
                <?php if (!empty($errors['petrol95_tank'])) : ?>
                    <div class="error"><?= $errors['petrol95_tank'] ?></div>
                <?php endif; ?>
                <?php if (!empty($errors['petrol95_bal'])) : ?>
                    <div class="error1"><?= $errors['petrol95_bal'] ?></div>
                <?php endif; ?>
                <br>

                <div class='inputflex'>
                    <input value="<?= set_value('petrol92_tank') ?>"  class='inputsignin2' type="number" name="petrol92_tank" id="petrol92_tank" placeholder="Petrol92 Tank" required1>
                    <input value="<?= set_value('petrol92_bal') ?>"  class='inputsignin2' type="number" name="petrol92_bal" id="petrol92_bal" placeholder="Petrol92 Current Balance" required1>
                </div>
                <?php if (!empty($errors['petrol92_tank'])) : ?>
                    <div class="error"><?= $errors['petrol92_tank'] ?></div>
                <?php endif; ?>
                <?php if (!empty($errors['petrol92_bal'])) : ?>
                    <div class="error1"><?= $errors['petrol92_bal'] ?></div>
                <?php endif; ?>
                <br>

                <div class='inputflex'>
                    <input value="<?= set_value('dieselauto_tank',) ?>"  class='inputsignin2' type="number" name="dieselauto_tank" id="dieselauto_tank" placeholder="Auto Diesel Tank">
                    <input value="<?= set_value('dieselauto_bal') ?>"  class='inputsignin2' type="number" name="dieselauto_bal" id="dieselauto_bal" placeholder="Auto Diesel Current Balance">
                </div>
                <?php if (!empty($errors['dieselauto_tank'])) : ?>
                    <div class="error"><?= $errors['dieselauto_tank'] ?></div>
                <?php endif; ?>
                <?php if (!empty($errors['dieselauto_bal'])) : ?>
                    <div class="error1"><?= $errors['dieselauto_bal'] ?></div>
                <?php endif; ?>
                <br>

                <div class='inputflex'>
                    <input value="<?= set_value('dieselsuper_tank',) ?>" class='inputsignin2' type="number" name="dieselsuper_tank" id="dieselsuper_tank" placeholder="Super Diesel Tank">
                    <input value="<?= set_value('dieselsuper_bal') ?>" class='inputsignin2' type="number" name="dieselsuper_bal" id="dieselsuper_bal" placeholder="Super Diesel Current Balance">
                </div>
                <?php if (!empty($errors['dieselsuper_tank'])) : ?>
                    <div class="error"><?= $errors['dieselsuper_tank'] ?></div>
                <?php endif; ?>
                <?php if (!empty($errors['dieselsuper_bal'])) : ?>
                    <div class="error1"><?= $errors['dieselsuper_bal'] ?></div>
                <?php endif; ?>
                <br>

                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton">Reset</button>
                    <button type="submit" id='submit' class='primarybutton'>Sign in</button>
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
        // // This function validates the inputs and updates the form accordingly.
        // function validateInputs() {
        //     // Get the form inputs.
        //     var petrol95_tank = document.getElementById('petrol95_tank').value;
        //     var petrol95_bal = document.getElementById('petrol95_bal').value;
        //     var petrol92_tank = document.getElementById('petrol92_tank').value;
        //     var petrol92_bal = document.getElementById('petrol92_bal').value;
        //     var dieselauto_tank = document.getElementById('dieselauto_tank').value;
        //     var dieselauto_bal = document.getElementById('dieselauto_bal').value;
        //     var dieselsuper_tank = document.getElementById('dieselsuper_tank').value;
        //     var dieselsuper_bal = document.getElementById('dieselsuper_bal').value;

        //     // Validate the inputs.
        //     var isValid = true;
        //     if (petrol95_bal > petrol95_tank || petrol92_bal > petrol92_tank || dieselauto_bal > dieselauto_tank || dieselsuper_bal > dieselsuper_tank) {
        //         isValid = false;
        //     }
        //     if (petrol95_tank < 0 || petrol95_bal < 0 || petrol92_tank < 0 || petrol92_bal < 0 || dieselauto_tank < 0 || dieselauto_bal < 0 || dieselsuper_tank < 0 || dieselsuper_bal < 0) {
        //         isValid = false;
        //     }

        //     // Get the submit button and the error message element.
        //     var submitButton = document.getElementById('submit');
        //     var errorMessage = document.getElementById('error');

        //     if (isValid) {
        //         // If the inputs are valid, enable the submit button and hide the error message.
        //         submitButton.disabled = false;
        //         errorMessage.style.display = 'none';
        //     } else {
        //         // If the inputs are not valid, disable the submit button and show the error message.
        //         submitButton.disabled = true;
        //         errorMessage.style.display = 'block';
        //     }
        // }
    </script>

</body>

</html>