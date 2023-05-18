<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href = "<?=ROOT?>/assets/css/qr.css" rel = "stylesheet">
	<link href="<?=ROOT?>/assets/css/dashboard.css" rel="stylesheet">

	<style>
		#qr{
			color:#E14761;
		}
	</style>

	<title>FuelUp</title>
	
	<?php
		$cht = "qr";
		$chs = "100x100";
		$chl = urlencode("http://aamnah.com");
		$choe = "UTF-8";
		$qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
		?>
</head>
<body>
<?php if(Auth::loggedin()):?>
	<?php $this->view('includes/nav' , $data); ?>
	<div class='forum-flex-box'>
        <div class='filters'>
            <h3>Filters</h3>
            <form method="GET" id="filterForm">
				<br>
                <label for="search_words">Search by Vehicle No:</label>
                <input type="text" name="search_words" id="search_words" placeholder="Vehicle No" class='inputs' value="<?=set_value('search_words')?>">
                <br/><br/>

                <input type="submit" value="Apply Filters" class='primarybutton'>
            </form>
        </div>
		<div class='header'>
			<div class="smallCard">	
				<div class="cardtitle">Remaining Diesel Quotal :
					<div class="cardAnswer"> <?= $data['org']['diesel_balance'] ?> L</div>
					<br/>
					<div class="progress-bar" id="dieselProgress">
						<div class="fill" style="width: <?= ($data['org']['diesel_balance'] / $data['org']['diesel_quota']) * 100 ?>%;"></div>
					</div>
				</div>
			</div>
			<div class="smallCard">	
				<div class="cardtitle">Remaining Petrol Quota :
					<div class="cardAnswer"> <?= $data['org']['petrol_balance'] ?> L</div>
					<br/>
					<div class="progress-bar" id="petrolProgress">
						<div class="fill" style="width: <?= ($data['org']['petrol_balance'] / $data['org']['petrol_quota']) * 100 ?>%;"></div>
					</div>
				</div>
			</div>
			<div class="smallCard">	
				<div class="cardtitle">Expiry Date : 
					<div class="cardAnswer"> <?= substr($data['org']['expiry_date'], 0, 10) ?> </div>
				</div>
			</div>
		</div>
		<div class='posts'>	
			<?php  $rows = $data['posts'];
				if (!empty($rows)) :
				foreach ($rows as $index => $row) :
				$cardId = "card-" . $index;
				$vehicleno = $row['vehicleno'];
			?>
				<div id="<?= $cardId ?>" class="card">
				  <div class="card-title-content">
					<div class="cardTitle"><?= $row['vehicleno'] ?></div>
					<div class="cardContent">
					  <?php
					  					//   $myVariable = $row['chassis'];
										// 	$key = "mysecretkey";
										// 	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
										// 	$encryptedVariable = openssl_encrypt($myVariable, 'aes-256-cbc', $key, 0, $iv);
										// 	$decryptedVariable = openssl_decrypt($encryptedVariable, 'aes-256-cbc', $key, 0, $iv);
										// 	echo $encryptedVariable;
										// 	echo $decryptedVariable;
					  $code = QrModel::generateQrCode($row['vehicleno'] );
					  echo "<img src='$code' alt='My QR code'>";
					  ?>
					</div>
				  </div>
					<div class="authortime">Used Quota: <?= $row["monthly_used_amount"] ?> L</div>
					<div class="authortime">Account Status : <?= $row["monthly_used_amount"] ?> </div>

				</div>

				</br></br>
			<div id="modal-<?= $index ?>" class="new-forum-form">
				<div class="form-content">
					<span class="close">&times;</span>
					<form class='forum-form' method="POST">
						<div >
							<h1 class="cardTitle" style="margin-top: 10px;"><?= $row['vehicleno'] ?> </h1>
							<img id="qr-code" src="<?= $code ?>" alt="QR code" width="100" height="100" style="transform: scale(1.9); margin-top: 115px;">
							<div class="inputcontainer">
								<!-- WHatsapp -->
									<a href="whatsapp://send?text=<?php echo urlencode('Check out this QR code: ' . $code); ?>" data-action="share/whatsapp/share">
										<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-whatsapp" viewBox="0 0 16 16"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/> </svg>							
									</a>
								<!-- Download -->
								<a href="<?= $code ?>" download="qrcode.png">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
										<path d="M12 18l-6-6h4v-7h4v7h4l-6 6zm-6-2h12v2h-12z"/>
									</svg>
								</a>
							</div>
							<div class="authortime">Used Quota: <?= $row["monthly_used_amount"] ?> L</div>
							<div class="authortime">Chassis Number: <?= $data[$vehicleno]['chassis_number']?> </div>

						</div>
					</form>
				</div>
			</div>

				<?php endforeach; ?>
			<?php else : ?>
			<div class="no-records">
				<h2>No records to display</h2>
				<p>There are currently no records to display in this table.</p>
				<a href="<?= ROOT ?>/Org_addVehicle">
					<button>Add Vehicle</button>
				</a>
			</div>
			<?php endif; ?>
		</div>
	</div>	
<?php else : ?> Login pls
<?php endif; ?>
</div>
</body>

<script>
// Get all the card elements
// Get all the card elements
var cards = document.querySelectorAll(".card");

// Add a click event listener to each card element
cards.forEach(function(card, index) {
  // Get the modal element for the current card
  var modal = document.getElementById("modal-" + index);
  // Get the <img> element inside the modal
  var qrCodeImg = modal.querySelector("img");

  card.addEventListener("click", function() {
    // Get the QR code image source from the card
    var qrCodeSrc = this.querySelector("img").src;
    // Set the QR code image source in the modal
    qrCodeImg.src = qrCodeSrc;
    // Show the modal
    modal.style.display = "block";
  });

  // When the user clicks on <span> (x), close the modal
  var closeBtn = modal.querySelector(".close");
  closeBtn.onclick = function() {
    modal.style.display = "none";
  };
});

window.onload = function() {
    var progressBars = document.querySelectorAll('.progress-bar .fill');
    progressBars.forEach(updateProgressBarColor);
};

function updateProgressBarColor(fillBar) {
    var percentage = parseInt(fillBar.style.width);

    if (percentage > 50) {
        fillBar.style.backgroundColor = '#49A153';
    } else if (percentage > 25) {
        fillBar.style.backgroundColor = '#FDCE00';
    } else {
        fillBar.style.backgroundColor = '#E12D14';
    }
}
</script>
</html>