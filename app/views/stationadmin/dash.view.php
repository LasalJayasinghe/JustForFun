<?php
$rows = $data['rows'];
$oprows = $data['oprows'];
$strow = $data['strow'];
if (!empty($strow)) :
    foreach ($strow as $srow) :
        $petrol95 = $srow['petrol95_bal'];
        $petrol95_tank = $srow['petrol95_tank'];

        $petrol92 = $srow['petrol92_bal'];
        $petrol92_tank = $srow['petrol92_tank'];


        $diesel = $srow['dieselauto_bal'];
        $diesel_tank = $srow['dieselauto_tank'];


        $superdiesel = $srow['dieselsuper_bal'];
        $superdiesel_tank = $srow['dieselsuper_tank'];

    endforeach;
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard </title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/dash.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/stationstyles.css">
</head>

<body>
    <?php
    $this->view('includes/nav', $data)
    ?>

    <!-- Order Details List -->
    <div class="stock">
        <div class="recentStock">
            <div class="cardHeader">
                <h2>Stock Details</h2>
            </div>
            <div class="containerbox">
                <div class="container">
                    <div class="circular-progress1">
                        <span class="progress-value1">0</span>
                    </div>
                    <span class="text">Petrol-92</span>
                </div>
                <div class="container">
                    <div class="circular-progress2">
                        <span class="progress-value2">0</span>
                    </div>
                    <span class="text">Petrol-95</span>
                </div>
                <div class="container">
                    <div class="circular-progress3">
                        <span class="progress-value3">0</span>
                    </div>
                    <span class="text">Diesel</span>
                </div>
                <div class="container">
                    <div class="circular-progress4">
                        <span class="progress-value4">0</span>
                    </div>
                    <span class="text">Super Diesel</span>
                </div>
            </div>
        </div>
        <div class="recentStocktablecontainer">
            <table class='recentStocktable'>
                <thead>
                    <tr>
                        <th>Fuel Type</th>
                        <th>Fuel Amount</th>
                        <th>Date time</th>
                    </tr>
                </thead>
                <?php if (!empty($rows)) : ?>
                    <tbody>
                        <?php foreach ($rows as $drow) : ?>
                            <tr>
                                <td data-label="Fuel Type"><?= $drow['fuel_type']; ?></td>
                                <td data-label="Fuel Amount"> <?= $drow['fuel_amount']; ?> </td>
                                <td data-label="Date time"><?= $drow['update_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                <?php else : ?>
                    <tr>
                        <td colspan="10">no records</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <!-- New Customers -->
        <div class="Employee">
            <div class="cardHeader">
                <h2>Pump Operators</h2>
            </div>
            <?php if (!empty($oprows)) : ?>
                <table class='employeetable'>
                    <tbody>
                        <?php foreach ($oprows as $orow) : ?>
                            <tr>
                                <td data-label="opid"><?= $orow['code'] ?></td>
                                <td data-label="name"><?= $orow['name'] ?></td>
                                <td data-label="status">
                                    <?php if ($orow['loggedin_status']) : ?>
                                        <img src='<?= ROOT ?>/assets/images/green.svg'>
                                    <?php else : ?>
                                        <img src='<?= ROOT ?>/assets/images/red.svg'>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No Operators Registered</p>
            <?php endif; ?>
        </div>
    </div>
    </div>
</body>
<!-- Scripts  -->
<script>
    let circularProgress_petrol92 = document.querySelector(".circular-progress1"),
        progressValue_petrol92 = document.querySelector(".progress-value1");

    let progressStartValue_petrol92 = 0,
        a = <?php echo $petrol92_tank ?>,
        x = <?php echo $petrol92 ?>;
    h = u = <?php echo $petrol92 ?> + "/" + <?php echo $petrol92_tank ?>,
        progressEndValue_petrol92 = Math.round((x / a) * 100),
        speed = 10;

    let progress_petrol92 = setInterval(() => {
        progressStartValue_petrol92++;

        progressValue_petrol92.textContent = h
        circularProgress_petrol92.style.background = `conic-gradient(#E14761 ${progressStartValue_petrol92 * 3.6}deg, #ededed 0deg)`

        if (progressStartValue_petrol92 == progressEndValue_petrol92) {
            clearInterval(progress_petrol92);
        }
    }, speed);



    let circularProgress_petrol95 = document.querySelector(".circular-progress2"),
        progressValue_petrol95 = document.querySelector(".progress-value2");

    let progressStartValue_petrol95 = 0,
        b = <?php echo $petrol95_tank ?>,
        y = <?php echo $petrol95 ?>;
    i = u = <?php echo $petrol95 ?> + "/" + <?php echo $petrol95_tank ?>,
        progressEndValue_petrol95 = Math.round((y / b) * 100),
        speed = 10;

    let progress_petrol95 = setInterval(() => {
        progressStartValue_petrol95++;

        progressValue_petrol95.textContent = i
        circularProgress_petrol95.style.background = `conic-gradient(#E14761 ${progressStartValue_petrol95 * 3.6}deg, #ededed 0deg)`

        if (progressStartValue_petrol95 == progressEndValue_petrol95) {
            clearInterval(progress_petrol95);
        }
    }, speed);



    let circularProgress_diesel = document.querySelector(".circular-progress3"),
        progressValue_diesel = document.querySelector(".progress-value3");

    let progressStartValue_diesel = 0,
        c = <?php echo $diesel_tank ?>,
        z = <?php echo $diesel ?>;
    j = <?php echo $diesel ?> + "/" + <?php echo $diesel_tank ?>,
        progressEndValue_diesel = Math.round((z / c) * 100),
        speed = 10;

    let progress_diesel = setInterval(() => {
        progressStartValue_diesel++;

        progressValue_diesel.textContent = j
        circularProgress_diesel.style.background = `conic-gradient(#E14761 ${progressStartValue_diesel * 3.6}deg, #ededed 0deg)`

        if (progressStartValue_diesel == progressEndValue_diesel) {
            clearInterval(progress_diesel);
        }
    }, speed);



    let circularProgress_superdiesel = document.querySelector(".circular-progress4"),
        progressValue_superdiesel = document.querySelector(".progress-value4");

    let progressStartValue_superdiesel = 0,
        d = <?php echo $superdiesel_tank ?>,
        r = <?php echo $superdiesel ?>;
    k = <?php echo $superdiesel ?> + "/" + <?php echo $superdiesel_tank ?>,
        progressEndValue_superdiesel = Math.round((r / d) * 100),
        speed = 10;

    let progress_superdiesel = setInterval(() => {
        progressStartValue_superdiesel++;

        progressValue_superdiesel.textContent = k
        circularProgress_superdiesel.style.background = `conic-gradient(#E14761 ${progressStartValue_superdiesel * 3.6}deg, #ededed 0deg)`

        if (progressStartValue_superdiesel == progressEndValue_superdiesel) {
            clearInterval(progress_superdiesel);
        }
    }, speed);
</script>


</html>