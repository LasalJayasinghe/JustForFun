<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <link href = "<?=ROOT?>/assets/css/customerstyles.css" rel = "stylesheet">
    <style>
        #qr{
            color:#E14761;
        }
    </style>
</head>
<body>
    
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <h1 class="title">QR Code</h1>

<div id="qrcontainer">
    <?php if (Auth::loggedin()): ?>
        <?php
        $code = QrModel::generateQrCode($UID);
        echo "<img src='$code' alt='My QR code'>";
        ?>
        <div id="linkcontainer">
            <a class="linkerror" href="https://wa.me/?text=<?php echo urlencode($code); ?>" target="_blank">
                <i class="fab fa-whatsapp"></i> Share QR Code on WhatsApp
            </a>
            <a class="linkok" href="<?php echo $code; ?>">Download QR</a>
        </div>
</div>

    <?php else:?>
        <h3>Login as customer to access the customer features</h3>
    <?php endif;?>
</body>
</html>












