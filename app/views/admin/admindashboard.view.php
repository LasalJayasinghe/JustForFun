<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../public/assets/css/adminstyles.css" rel="stylesheet">
    <link href="../public/assets/css/dashboard.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/chartstyles.css" rel="stylesheet">
</head>
<body id='dash-body'>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <div class='dash-content'>

    <!-- ================= QUOTA TABLE AND FORM ================= -->
        <div class='dash-form' id='quota-table-form'>
            <h2>Weekly Quotas</h2>
            <form id="quota-form">
                <table>
                    <thead>
                        <tr>
                            <th>Vehicle Type</th>
                            <th>Quota (L)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($weeklyQuotas as $quota): ?>
                        <tr>
                            <td><?= $quota['vehicle_type'] ?></td>
                            <td><input type="number" name="quota" value="<?= $quota['quota'] ?>" disabled></td>
                            <td class='action_buttons_field'>
                                <button class="edit-quota" data-id="<?= $quota['vehicle_type'] ?>">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.79496 17.5712C1.33663 17.5712 0.94413 17.4082 0.617464 17.082C0.290797 16.7559 0.127742 16.3634 0.128297 15.9045V4.23787C0.128297 3.77954 0.291631 3.38704 0.618297 3.06037C0.944964 2.73371 1.33719 2.57065 1.79496 2.57121H9.23246L7.5658 4.23787H1.79496V15.9045H13.4616V10.1129L15.1283 8.44621V15.9045C15.1283 16.3629 14.965 16.7554 14.6383 17.082C14.3116 17.4087 13.9194 17.5718 13.4616 17.5712H1.79496ZM11.1075 3.05037L12.295 4.21704L6.79496 9.71704V10.9045H7.96163L13.4825 5.38371L14.67 6.55037L8.66996 12.5712H5.1283V9.02954L11.1075 3.05037ZM14.67 6.55037L11.1075 3.05037L13.1908 0.967041C13.5241 0.633708 13.9236 0.467041 14.3891 0.467041C14.8547 0.467041 15.2469 0.633708 15.5658 0.967041L16.7325 2.15454C17.0519 2.47399 17.2116 2.86287 17.2116 3.32121C17.2116 3.77954 17.0519 4.16843 16.7325 4.48787L14.67 6.55037Z" fill="#35363A"/>
                                    </svg>
                                </button>
                                <button class="submit-quota" data-id="<?= $quota['vehicle_type'] ?>" style="display:none;">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.97871 17.8511C1.44808 17.8511 0.993663 17.662 0.615466 17.2838C0.237269 16.9056 0.0484917 16.4515 0.0491349 15.9215V2.41444C0.0491349 1.88381 0.238234 1.42939 0.616431 1.0512C0.994628 0.672999 1.44872 0.484222 1.97871 0.484865H12.7602C13.0175 0.484865 13.2629 0.533104 13.4964 0.629583C13.7298 0.726062 13.9347 0.862741 14.1109 1.03962L16.8606 3.78927C17.0375 3.96615 17.1741 4.17133 17.2706 4.4048C17.3671 4.63828 17.4153 4.88334 17.4153 5.13997V15.9215C17.4153 16.4521 17.2262 16.9065 16.848 17.2847C16.4698 17.6629 16.0158 17.8517 15.4858 17.8511H1.97871ZM15.4858 5.16409L12.7361 2.41444H1.97871V15.9215H15.4858V5.16409ZM8.73224 14.9567C9.53623 14.9567 10.2196 14.6753 10.7824 14.1125C11.3452 13.5497 11.6266 12.8663 11.6266 12.0623C11.6266 11.2583 11.3452 10.575 10.7824 10.0122C10.2196 9.44937 9.53623 9.16797 8.73224 9.16797C7.92825 9.16797 7.24486 9.44937 6.68206 10.0122C6.11927 10.575 5.83787 11.2583 5.83787 12.0623C5.83787 12.8663 6.11927 13.5497 6.68206 14.1125C7.24486 14.6753 7.92825 14.9567 8.73224 14.9567ZM3.90829 7.23839H10.6618C10.9352 7.23839 11.1645 7.14577 11.3497 6.96053C11.535 6.77529 11.6272 6.54631 11.6266 6.2736V4.34402C11.6266 4.07067 11.534 3.84137 11.3487 3.65613C11.1635 3.47089 10.9345 3.37859 10.6618 3.37923H3.90829C3.63494 3.37923 3.40564 3.47185 3.2204 3.65709C3.03516 3.84233 2.94286 4.07131 2.9435 4.34402V6.2736C2.9435 6.54696 3.03612 6.77626 3.22136 6.9615C3.4066 7.14674 3.63558 7.23903 3.90829 7.23839ZM1.97871 5.16409V15.9215V2.41444V5.16409Z" fill="#35363A"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- ==================== QUOTA TABLE AND FORM END ========================== -->

        <!-- =================== FUEL PRICES MANAGEMENT TABLE AND FORM ==================== -->
        <div class='dash-form' id='prices-table-form'> 
            <h2>Fuel Prices</h2>
            <form id="price-form">
                <table>
                    <thead>
                        <tr>
                            <th>Fuel Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fuelPrices as $fuelPrice): ?>
                        <tr>
                            <td><?= $fuelPrice['fuel_type_desc'] ?></td>
                            <td><input type="number" step="0.01" name="price" value="<?= $fuelPrice['price'] ?>" disabled></td>
                            <td>
                                <button class="edit-price" data-id="<?= $fuelPrice['fuel_type'] ?>">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.79496 17.5712C1.33663 17.5712 0.94413 17.4082 0.617464 17.082C0.290797 16.7559 0.127742 16.3634 0.128297 15.9045V4.23787C0.128297 3.77954 0.291631 3.38704 0.618297 3.06037C0.944964 2.73371 1.33719 2.57065 1.79496 2.57121H9.23246L7.5658 4.23787H1.79496V15.9045H13.4616V10.1129L15.1283 8.44621V15.9045C15.1283 16.3629 14.965 16.7554 14.6383 17.082C14.3116 17.4087 13.9194 17.5718 13.4616 17.5712H1.79496ZM11.1075 3.05037L12.295 4.21704L6.79496 9.71704V10.9045H7.96163L13.4825 5.38371L14.67 6.55037L8.66996 12.5712H5.1283V9.02954L11.1075 3.05037ZM14.67 6.55037L11.1075 3.05037L13.1908 0.967041C13.5241 0.633708 13.9236 0.467041 14.3891 0.467041C14.8547 0.467041 15.2469 0.633708 15.5658 0.967041L16.7325 2.15454C17.0519 2.47399 17.2116 2.86287 17.2116 3.32121C17.2116 3.77954 17.0519 4.16843 16.7325 4.48787L14.67 6.55037Z" fill="#35363A"/>
                                    </svg>
                                </button>
                                <button class="submit-price" data-id="<?= $fuelPrice['fuel_type'] ?>" style="display:none;">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.97871 17.8511C1.44808 17.8511 0.993663 17.662 0.615466 17.2838C0.237269 16.9056 0.0484917 16.4515 0.0491349 15.9215V2.41444C0.0491349 1.88381 0.238234 1.42939 0.616431 1.0512C0.994628 0.672999 1.44872 0.484222 1.97871 0.484865H12.7602C13.0175 0.484865 13.2629 0.533104 13.4964 0.629583C13.7298 0.726062 13.9347 0.862741 14.1109 1.03962L16.8606 3.78927C17.0375 3.96615 17.1741 4.17133 17.2706 4.4048C17.3671 4.63828 17.4153 4.88334 17.4153 5.13997V15.9215C17.4153 16.4521 17.2262 16.9065 16.848 17.2847C16.4698 17.6629 16.0158 17.8517 15.4858 17.8511H1.97871ZM15.4858 5.16409L12.7361 2.41444H1.97871V15.9215H15.4858V5.16409ZM8.73224 14.9567C9.53623 14.9567 10.2196 14.6753 10.7824 14.1125C11.3452 13.5497 11.6266 12.8663 11.6266 12.0623C11.6266 11.2583 11.3452 10.575 10.7824 10.0122C10.2196 9.44937 9.53623 9.16797 8.73224 9.16797C7.92825 9.16797 7.24486 9.44937 6.68206 10.0122C6.11927 10.575 5.83787 11.2583 5.83787 12.0623C5.83787 12.8663 6.11927 13.5497 6.68206 14.1125C7.24486 14.6753 7.92825 14.9567 8.73224 14.9567ZM3.90829 7.23839H10.6618C10.9352 7.23839 11.1645 7.14577 11.3497 6.96053C11.535 6.77529 11.6272 6.54631 11.6266 6.2736V4.34402C11.6266 4.07067 11.534 3.84137 11.3487 3.65613C11.1635 3.47089 10.9345 3.37859 10.6618 3.37923H3.90829C3.63494 3.37923 3.40564 3.47185 3.2204 3.65709C3.03516 3.84233 2.94286 4.07131 2.9435 4.34402V6.2736C2.9435 6.54696 3.03612 6.77626 3.22136 6.9615C3.4066 7.14674 3.63558 7.23903 3.90829 7.23839ZM1.97871 5.16409V15.9215V2.41444V5.16409Z" fill="#35363A"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
         <!-- ============== END OF FUEL PRICES MANAGEMENT TABLE AND FORM ================ -->

        <!-- =============== USERBASE DISTRIBUTION CHART LIKE THING ================== -->
        <div class='user-distribution-chart'>
            <h3>Registered User Base</h3>
            <div>
                <table class='user-base'>
                    <tr><th></th><th>Active</th><th>All</th></tr>
                    <tr><th>Private Accounts</th><td><?=$data['userbasecount']['active']['customer']?></td><td><?=$data['userbasecount']['al']['customer']?></td></tr>
                    <tr><th>Organization Accounts</th><td><?=$data['userbasecount']['active']['org']?></td><td><?=$data['userbasecount']['all']['org']?></td></tr>
                    <tr><th>Station Accounts</th><td><?=$data['userbasecount']['active']['station']?></td><td><?=$data['userbasecount']['all']['station']?></td></tr>
                    <tr><th>Vehicles</th><td><?=$data['userbasecount']['active']['vehicles']?></td><td><?=$data['userbasecount']['all']['vehicles']?></td></tr>
                </table>
            </div>
        </div>
<!-- ============== END OF USERBASE DISTRIBUTION TABLE ================ -->

        <!-- =============== VEHICLE DISTRIBUTION CHART LIKE THING ================== -->

        <div class='vehicle-distribution-chart'>
            <h3>Vehicle Distribution</h3>
            <canvas id='vehicle-distribution'></canvas>
        </div>

    </div>
    <!-- Include your preferred JavaScript library here, e.g. jQuery -->
    <script>
        var ROOT = '<?= ROOT ?>';
        document.querySelectorAll('.edit-quota').forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="quota"]');
                input.disabled = false;
                input.focus();
                e.target.style.display = 'none';
                row.querySelector('.submit-quota').style.display = 'inline';
            });
        });

        document.querySelectorAll('.edit-price').forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="price"]');
                input.disabled = false;
                input.focus();
                e.target.style.display = 'none';
                row.querySelector('.submit-price').style.display = 'inline';
            });
        });

        // Add event listeners for the submit buttons to update the data
            document.querySelectorAll('.submit-quota').forEach(button => {
                button.addEventListener('click', async e => {
                    e.preventDefault();
                    const row = e.target.parentElement.parentElement;
                    const input = row.querySelector('input[name="quota"]');
                    const vehicle_type = e.target.dataset.id;
                    const newQuota = input.value;

                    const response = await fetch(ROOT + '/admin_dashboard/updateQuota', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ vehicle_type, quota: newQuota })
                    });

                    if (response.ok) {
                        input.disabled = true;
                        e.target.style.display = 'none';
                        row.querySelector('.edit-quota').style.display = 'inline';
                    } else {
                        console.error('Failed to update the quota');
                    }
                });
            });

                document.querySelectorAll('.submit-price').forEach(button => {
                button.addEventListener('click', async e => {
                    e.preventDefault();
                    const row = e.target.parentElement.parentElement;
                    const input = row.querySelector('input[name="price"]');
                    const fuel_type = e.target.dataset.id;
                    const newPrice = input.value;

                    const response = await fetch(ROOT + '/admin_dashboard/updatePrice', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ fuel_type, price: newPrice })
                    });

                    if (response.ok) {
                        input.disabled = true;
                        e.target.style.display = 'none';
                        row.querySelector('.edit-price').style.display = 'inline';
                    } else {
                        console.error('Failed to update the price');
                    }
                });
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  
    var categoriesCounts = <?php echo json_encode($data['categoriesandcounts']); ?>;

    var labels = categoriesCounts.map(function(item) { return item.category; });
    var pvtData = categoriesCounts.map(function(item) { return item.pvt; });
    var orgData = categoriesCounts.map(function(item) { return item.org; });
    
    // Create the doughnut charts
    var ctx1 = document.getElementById('vehicle-distribution').getContext('2d');
    var pvtChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Private Vehicles',
                data: pvtData,
                backgroundColor: 'rgba(225, 71, 97,0.4)',
                borderColor: 'rgba(225, 71, 97,1)',
                borderWidth: 1
            },
            {
                label: 'Organization Vehicles',
                data: orgData,
                backgroundColor: 'rgba(206, 194, 255,0.4)',
                borderColor: 'rgba(206, 194, 255,1)',
                borderWidth: 1
            }
        ]
        }
        ,
        options: {
          responsive: true,
          MAINTAIN_ASPECT_RATIO: false,
      }
    });

</script>

</body>
</html>
