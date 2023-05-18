<?php
    $Petrol_tank = $data['rows']['petrol_quota'];
    $Petrol = $data['rows']['petrol_balance'];
    $Diesel = $data['rows']['diesel_balance'];
    $Diesel_tank = $data['rows']['diesel_quota'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Orgdashboard.css">
</head>
<body>
<?php if(Auth::logged_in()):?>
    <?php $this->view('includes/nav' , $data); ?>

    <div class = "container">
        <div class="left-container">
            <h3 class="title">Remaining Quota</h3>
            <div class="containerbox">
                <div class="containerCircle">
                    <div class="circular-progress1">
                        <span class="progress-value1">0</span>
                    </div>
                    <span class="text">Petrol</span>
                </div>
                <div class="containerCircle">
                    <div class="circular-progress2">
                        <span class="progress-value2">0</span>
                    </div>
                    <span class="text">Diesel</span>
                </div>
            </div>
        </div>
    
    <div class = "right-container">

        <a id="qr" href="<?=ROOT?>/Org_qr">
            <div class="item2">QR Code
                <svg class="icon1" width="77" height="76" viewBox="0 0 77 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M63.1051 22.895L63.1368 22.8633L53.0351 12.7617C52.5881 12.32 51.9851 12.0723 51.3567 12.0723C50.7284 12.0723 50.1254 12.32 49.6784 12.7617C48.7601 13.68 48.7601 15.2 49.6784 16.1183L54.6818 21.1217C51.3568 22.3883 49.1084 25.7767 49.6784 29.7033C50.1851 33.1867 53.1617 36.005 56.6451 36.385C58.1334 36.5433 59.4317 36.29 60.6667 35.7517V58.5833C60.6667 60.325 59.2417 61.75 57.5001 61.75C55.7584 61.75 54.3334 60.325 54.3334 58.5833V44.3333C54.3334 40.85 51.4834 38 48.0001 38H44.8334V15.8333C44.8334 12.35 41.9834 9.5 38.5001 9.5H19.5001C16.0167 9.5 13.1667 12.35 13.1667 15.8333V63.3333C13.1667 65.075 14.5917 66.5 16.3334 66.5H41.6667C43.4084 66.5 44.8334 65.075 44.8334 63.3333V42.75H49.5834V58.14C49.5834 62.2883 52.5601 66.0567 56.6768 66.4683C57.7808 66.5838 58.8967 66.4658 59.9521 66.1219C61.0076 65.7781 61.9789 65.2162 62.8031 64.4727C63.6273 63.7291 64.2859 62.8205 64.7362 61.8059C65.1865 60.7913 65.4183 59.6934 65.4167 58.5833V28.5C65.4167 26.315 64.5301 24.32 63.1051 22.895ZM38.5001 31.6667H19.5001V19C19.5001 17.2583 20.9251 15.8333 22.6667 15.8333H35.3334C37.0751 15.8333 38.5001 17.2583 38.5001 19V31.6667ZM57.5001 31.6667C55.7584 31.6667 54.3334 30.2417 54.3334 28.5C54.3334 26.7583 55.7584 25.3333 57.5001 25.3333C59.2417 25.3333 60.6667 26.7583 60.6667 28.5C60.6667 30.2417 59.2417 31.6667 57.5001 31.6667Z" fill="#35363A"/>
                </svg>
            </div>
        </a>
        <a id="forum" href="<?=ROOT?>/forum?user=org">
            <div class="item2">Forum
                <svg class="icon1" width="87" height="85" viewBox="0 0 87 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M72.1667 7.08338H14.8334C10.881 7.08338 7.66675 10.2496 7.66675 14.1384V56.695C7.66675 60.5838 10.881 63.75 14.8334 63.75H25.5834V77.9167L48.3412 63.75H72.1667C76.1192 63.75 79.3334 60.5838 79.3334 56.695V14.1384C79.3277 12.2641 78.5699 10.4686 77.2263 9.14594C75.8827 7.82328 74.0631 7.08149 72.1667 7.08338ZM47.0834 53.125H39.9167V46.0417H47.0834V53.125ZM47.0834 38.9584H39.9167V17.7084H47.0834V38.9584Z" fill="#35363A"/>
                </svg>
            </div>
        </a>
        <a id="forum" href="<?=ROOT?>/Org_vehicle">
            <div class="item2">Vehicles
                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="57" fill="none" viewBox="0 0 61 57">
                    <path fill="#35363A" d="M15.5 49v3.75a3.75 3.75 0 0 1-7.5 0V49h7.5ZM53 49v3.75a3.75 3.75 0 0 1-7.5 0V49H53ZM44.975.25a9.375 9.375 0 0 1 9.195 7.537l.739 3.713h2.779a2.813 2.813 0 0 1 2.786 2.43l.026.383a2.813 2.813 0 0 1-2.43 2.786l-.383.026h-1.653l.42 2.1a5.625 5.625 0 0 1 4.046 5.4v15a5.625 5.625 0 0 1-5.625 5.625H6.125A5.625 5.625 0 0 1 .5 39.625v-15a5.625 5.625 0 0 1 4.046-5.4l.417-2.1h-1.65a2.812 2.812 0 1 1 0-5.625h2.775l.742-3.713A9.375 9.375 0 0 1 16.025.25h28.95ZM15.5 28.375a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5Zm30 0a3.75 3.75 0 1 0 0 7.5 3.75 3.75 0 0 0 0-7.5ZM44.975 4h-28.95a5.625 5.625 0 0 0-5.516 4.523L8.409 19h44.178L50.492 8.523A5.625 5.625 0 0 0 44.98 4h-.004Z"/>
                </svg>
            </div>
        </a>
        <a id="transactions" href="<?=ROOT?>/Org_transactions">
            <div class="item2">Transactions
                <svg class="icon1" width="69" height="68" viewBox="0 0 69 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M67.4375 33.9377C67.4711 52.0852 52.6714 66.9246 34.5239 66.9374C26.686 66.9429 19.4865 64.2107 13.8288 59.6445C12.3576 58.4572 12.2477 56.2523 13.5846 54.9154L15.081 53.419C16.2243 52.2757 18.0497 52.1506 19.3165 53.1555C23.4848 56.4632 28.76 58.4375 34.5 58.4375C48.0077 58.4375 58.9375 47.5056 58.9375 34C58.9375 20.4923 48.0056 9.5625 34.5 9.5625C28.0169 9.5625 22.1287 12.0818 17.7566 16.1941L24.4974 22.9349C25.8361 24.2736 24.888 26.5625 22.9949 26.5625H3.6875C2.51384 26.5625 1.5625 25.6112 1.5625 24.4375V5.13015C1.5625 3.23704 3.85139 2.28889 5.19014 3.62751L11.7474 10.1847C17.6606 4.53369 25.6749 1.0625 34.5 1.0625C52.6701 1.0625 67.4039 15.7755 67.4375 33.9377ZM43.4101 44.4012L44.7147 42.7238C45.7956 41.3342 45.5452 39.3315 44.1556 38.2508L38.75 34.0464V20.1875C38.75 18.4271 37.3229 17 35.5625 17H33.4375C31.6771 17 30.25 18.4271 30.25 20.1875V38.2036L38.9371 44.9604C40.3268 46.041 42.3293 45.7908 43.4101 44.4012Z" fill="#35363A"/>
                </svg>
            </div>
        </a>
    </div>
</div>
<?php else:?>
    Pls Login
<?php endif;?>
</body>
<script>
    let circularProgress_Diesel = document.querySelector(".circular-progress1"),
        progressValue_Diesel = document.querySelector(".progress-value1");

    let progressStartValue_Diesel = 0,
        a = <?php echo $Diesel_tank ?>,
        x = <?php echo $Diesel ?>;
    h = u = <?php echo $Diesel ?> + "/" + <?php echo $Diesel_tank ?>,
        progressEndValue_Diesel = Math.round((x / a) * 100),
        speed = 10;

    let progress_Diesel = setInterval(() => {
        if (x !== 0) {
            progressStartValue_Diesel++;

            progressValue_Diesel.textContent = h
            circularProgress_Diesel.style.background = `conic-gradient(${getProgressColor(progressEndValue_Diesel)} ${progressStartValue_Diesel * 3.6}deg, #ededed 0deg)`

            if (progressStartValue_Diesel == progressEndValue_Diesel) {
                clearInterval(progress_Diesel);
            }
        } else {
            clearInterval(progress_Diesel);
        }
    }, speed);

    let circularProgress_Petrol = document.querySelector(".circular-progress2"),
        progressValue_Petrol = document.querySelector(".progress-value2");

    let progressStartValue_Petrol = 0,
        b = <?php echo $Petrol_tank ?>,
        y = <?php echo $Petrol ?>;
    i = u = <?php echo $Petrol ?> + "/" + <?php echo $Petrol_tank ?>,
        progressEndValue_Petrol = Math.round((y / b) * 100),
        speed = 10;

    let progress_Petrol = setInterval(() => {
        if (y !== 0) {
        progressStartValue_Petrol++;

        progressValue_Petrol.textContent = i
        circularProgress_Petrol.style.background = `conic-gradient(${getProgressColor(progressEndValue_Petrol)} ${progressStartValue_Petrol * 3.6}deg, #ededed 0deg)`

        if (progressStartValue_Petrol == progressEndValue_Petrol) {
            clearInterval(progress_Petrol);
        }
    }else{
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