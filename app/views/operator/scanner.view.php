<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href = "../public/assets/css/operatorstyles.css" rel = "stylesheet">
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    </head>
    <body class='dashbody'>
        <div id="nav-placeholder"><?= $this->view('includes/nav',$data); ?></div>

    <div id="container0">
      <h2>QR Scanner</h2>

      <div class='container1' id="btn-scan-qr-cont">
        <a id="btn-scan-qr">
            <img id='scanimg' src="../public/assets/images/Vector.png">
            <p id='scanres' hidden='true'>Scan QR Code</p>
        </a>

        <canvas hidden=" " id="qr-canvas"></canvas>
        </div>
      <form action="<?=ROOT?>/formhandler" method="POST">
            <div class='container2'>
                <input value="<?=set_value('vehicleno')?>" type="hidden" name="vehicleno" id="vehicleno" class='inputsmall' placeholder='CAF-1234' required>
                <button type="submit" name="scan_code" id='sbmitbutton' class='primarybutton'>Check Quota</button>
            </div>     
        </form>

    </div>

        <script src="../public/includes/qrCodeScanner.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const vehicleno = document.getElementById('vehicleno');
                const submitBtn = document.getElementById('sbmitbutton');

                function checkInput() {
                    if (vehicleno.value === '') {
                        submitBtn.disabled = true;
                    } else {
                        submitBtn.disabled = false;
                    }
                }

                // Check the input on page load
                checkInput();

                // Create a mutation observer to watch for changes in the input field's value
                const observer = new MutationObserver(checkInput);
                
                // Start observing the input field with the configured parameters
                observer.observe(vehicleno, { attributes: true, attributeFilter: ['value'] });
            });
        </script>

  </body>

</html>
