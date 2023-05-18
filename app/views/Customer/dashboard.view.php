<?php 
if(!empty($data['r'])){
$weeklyQuota = $data['r']['quota'];
}
$bal_quota = $data['row']['balance_quota'];
$dateTime = new DateTime($data['row']['expiry_date']);
$exp = $dateTime->format('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/customerstyles.css">
</head>
<body>
    
    <div id="nav-placeholder"><?php $this->view('includes/dashnav');?></div>
    <h1 class="title">Dashboard</h1>

    <?php if(Auth::loggedin()):?>

<div class="mapcontainer">
    <div class="right">
        <div class="containerholder">
        
            <div class="circular-progress">
                <span class="progress-value">0 L</span>
            </div>
            
        </div>
        <div class="containerholder">
            <div class="table-container">
           

            <?php if (!empty($data['row'])): ?>
                <table>
                <tr>
                    <th>Fuel Balance</th>
                    <td><?= $bal_quota ?> Ltr</td>
                </tr>
                <tr>
                    <th>Expiry Date</th>
                    <td><?= $exp ?></td>
                <?php else: ?>
                <tr>
                    <td colspan="10">no records</td>
                </tr>
                <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

            </div>
    
            <div class="left">
    
                <div class = "nav2">

                    <a id="orgs" href="<?=ROOT?>/Cus_findfuel">
                        <div class="item2">Find Fuel
                            <svg class="icon1" width="77" height="76" viewBox="0 0 77 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M64.0289 59.2087C67.4397 55.105 69.8119 50.2401 70.9449 45.0257C72.0779 39.8112 71.9383 34.4006 70.538 29.2515C69.1377 24.1024 66.5178 19.3663 62.8999 15.4438C59.2821 11.5214 54.7728 8.52803 49.7534 6.71693C44.734 4.90582 39.3523 4.33028 34.0634 5.03898C28.7746 5.74768 23.7342 7.71977 19.3687 10.7884C15.0032 13.8571 11.441 17.9321 8.98348 22.6686C6.52594 27.4051 5.24534 32.6639 5.25001 38C5.25181 45.7572 7.98541 53.266 12.9711 59.2087L12.9236 59.2491C13.0899 59.4486 13.2799 59.6196 13.4509 59.8167C13.6646 60.0614 13.895 60.2917 14.1159 60.5292C14.7809 61.2512 15.4649 61.9447 16.1821 62.5955C16.4006 62.795 16.6263 62.9802 16.8471 63.1702C17.6071 63.8257 18.3885 64.448 19.1984 65.0275C19.3029 65.0987 19.3979 65.1914 19.5024 65.265V65.2365C25.0649 69.1509 31.7006 71.2517 38.5024 71.2517C45.3041 71.2517 51.9399 69.1509 57.5024 65.2365V65.265C57.6069 65.1914 57.6995 65.0987 57.8064 65.0275C58.6139 64.4456 59.3976 63.8257 60.1576 63.1702C60.3785 62.9802 60.6041 62.7926 60.8226 62.5955C61.5399 61.9424 62.2239 61.2512 62.8889 60.5292C63.1098 60.2917 63.3378 60.0614 63.5539 59.8167C63.7225 59.6196 63.9149 59.4486 64.0811 59.2467L64.0289 59.2087ZM38.5 19C40.6138 19 42.6801 19.6268 44.4377 20.8012C46.1952 21.9755 47.5651 23.6447 48.374 25.5976C49.1829 27.5504 49.3945 29.6993 48.9822 31.7725C48.5698 33.8457 47.5519 35.75 46.0572 37.2447C44.5625 38.7394 42.6582 39.7573 40.585 40.1696C38.5119 40.582 36.363 40.3704 34.4101 39.5614C32.4572 38.7525 30.788 37.3827 29.6137 35.6251C28.4393 33.8676 27.8125 31.8013 27.8125 29.6875C27.8125 26.853 28.9385 24.1346 30.9428 22.1303C32.9471 20.126 35.6655 19 38.5 19ZM19.5166 59.2087C19.5578 56.0903 20.8251 53.1134 23.0444 50.9222C25.2636 48.731 28.2563 47.5016 31.375 47.5H45.625C48.7437 47.5016 51.7364 48.731 53.9557 50.9222C56.1749 53.1134 57.4422 56.0903 57.4834 59.2087C52.2746 63.9025 45.5116 66.5002 38.5 66.5002C31.4884 66.5002 24.7254 63.9025 19.5166 59.2087Z" fill="#35363A"/>
                            </svg> 
                        </div>
                    </a>
                    <a id="qr" href="<?=ROOT?>/Cus_qr">
                        <div class="item2">QR Code
                            <svg class="icon1" width="77" height="76" viewBox="0 0 77 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M63.1051 22.895L63.1368 22.8633L53.0351 12.7617C52.5881 12.32 51.9851 12.0723 51.3567 12.0723C50.7284 12.0723 50.1254 12.32 49.6784 12.7617C48.7601 13.68 48.7601 15.2 49.6784 16.1183L54.6818 21.1217C51.3568 22.3883 49.1084 25.7767 49.6784 29.7033C50.1851 33.1867 53.1617 36.005 56.6451 36.385C58.1334 36.5433 59.4317 36.29 60.6667 35.7517V58.5833C60.6667 60.325 59.2417 61.75 57.5001 61.75C55.7584 61.75 54.3334 60.325 54.3334 58.5833V44.3333C54.3334 40.85 51.4834 38 48.0001 38H44.8334V15.8333C44.8334 12.35 41.9834 9.5 38.5001 9.5H19.5001C16.0167 9.5 13.1667 12.35 13.1667 15.8333V63.3333C13.1667 65.075 14.5917 66.5 16.3334 66.5H41.6667C43.4084 66.5 44.8334 65.075 44.8334 63.3333V42.75H49.5834V58.14C49.5834 62.2883 52.5601 66.0567 56.6768 66.4683C57.7808 66.5838 58.8967 66.4658 59.9521 66.1219C61.0076 65.7781 61.9789 65.2162 62.8031 64.4727C63.6273 63.7291 64.2859 62.8205 64.7362 61.8059C65.1865 60.7913 65.4183 59.6934 65.4167 58.5833V28.5C65.4167 26.315 64.5301 24.32 63.1051 22.895ZM38.5001 31.6667H19.5001V19C19.5001 17.2583 20.9251 15.8333 22.6667 15.8333H35.3334C37.0751 15.8333 38.5001 17.2583 38.5001 19V31.6667ZM57.5001 31.6667C55.7584 31.6667 54.3334 30.2417 54.3334 28.5C54.3334 26.7583 55.7584 25.3333 57.5001 25.3333C59.2417 25.3333 60.6667 26.7583 60.6667 28.5C60.6667 30.2417 59.2417 31.6667 57.5001 31.6667Z" fill="#35363A"/>
                            </svg>
                        </div>
                    </a>
                    <a id="forum" href="<?=ROOT?>/forum?user=customer">
                        <div class="item2">Forum
                            <svg class="icon1" width="87" height="85" viewBox="0 0 87 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M72.1667 7.08338H14.8334C10.881 7.08338 7.66675 10.2496 7.66675 14.1384V56.695C7.66675 60.5838 10.881 63.75 14.8334 63.75H25.5834V77.9167L48.3412 63.75H72.1667C76.1192 63.75 79.3334 60.5838 79.3334 56.695V14.1384C79.3277 12.2641 78.5699 10.4686 77.2263 9.14594C75.8827 7.82328 74.0631 7.08149 72.1667 7.08338ZM47.0834 53.125H39.9167V46.0417H47.0834V53.125ZM47.0834 38.9584H39.9167V17.7084H47.0834V38.9584Z" fill="#35363A"/>
                            </svg>
                        </div>
                    </a>
                    <a id="transactions" href="<?=ROOT?>/Cus_transactions">
                        <div class="item2">Transactions
                            <svg class="icon1" width="69" height="68" viewBox="0 0 69 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M67.4375 33.9377C67.4711 52.0852 52.6714 66.9246 34.5239 66.9374C26.686 66.9429 19.4865 64.2107 13.8288 59.6445C12.3576 58.4572 12.2477 56.2523 13.5846 54.9154L15.081 53.419C16.2243 52.2757 18.0497 52.1506 19.3165 53.1555C23.4848 56.4632 28.76 58.4375 34.5 58.4375C48.0077 58.4375 58.9375 47.5056 58.9375 34C58.9375 20.4923 48.0056 9.5625 34.5 9.5625C28.0169 9.5625 22.1287 12.0818 17.7566 16.1941L24.4974 22.9349C25.8361 24.2736 24.888 26.5625 22.9949 26.5625H3.6875C2.51384 26.5625 1.5625 25.6112 1.5625 24.4375V5.13015C1.5625 3.23704 3.85139 2.28889 5.19014 3.62751L11.7474 10.1847C17.6606 4.53369 25.6749 1.0625 34.5 1.0625C52.6701 1.0625 67.4039 15.7755 67.4375 33.9377ZM43.4101 44.4012L44.7147 42.7238C45.7956 41.3342 45.5452 39.3315 44.1556 38.2508L38.75 34.0464V20.1875C38.75 18.4271 37.3229 17 35.5625 17H33.4375C31.6771 17 30.25 18.4271 30.25 20.1875V38.2036L38.9371 44.9604C40.3268 46.041 42.3293 45.7908 43.4101 44.4012Z" fill="#35363A"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div> <!-- Mapcontainer closes -->
                       


      <?php else:?>
        <h3>Login as customer to access the customer features</h3>
    <?php endif;?>
</body>
            <script>
            let circularProgress_Petrol = document.querySelector(".circular-progress"),
                    progressValue_Petrol = document.querySelector(".progress-value");

            let progressStartValue_Petrol = 0,
                b = <?php echo $weeklyQuota ?>,
                y = <?php echo $bal_quota ?>;
            i = u = <?php echo $bal_quota ?> + "/" + <?php echo $weeklyQuota ?>,
                progressEndValue_Petrol = Math.round((y / b) * 100),
                speed = 10;

            let progress_Petrol = setInterval(() => {
                progressStartValue_Petrol++;

                progressValue_Petrol.textContent = i
                circularProgress_Petrol.style.background = `conic-gradient(${getProgressColor(progressEndValue_Petrol)} ${progressStartValue_Petrol * 3.6}deg, #ededed 0deg)`

                if (progressStartValue_Petrol == progressEndValue_Petrol) {
                    clearInterval(progress_Petrol);
                }
            }, speed);

            function getProgressColor(progress) {
                if (progress < 15) {
                    return "#E12D14"; // red
                } else if (progress >= 15 && progress < 75) {
                    return '#FDCE00' // yellow
                } else {
                    return "#49A153"; // blue
                }
            }
            </script>
</html>
