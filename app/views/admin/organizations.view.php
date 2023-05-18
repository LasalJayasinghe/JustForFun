<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">
    <style>
        #orgs{
            color:#E14761;
        }
    </style>
    <title>Organizations List</title>
</head>
<body>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <?php if(Auth::loggedin()):?>
    
    <div class='table-page-flex-box'>
        <div class='filters-top'>
            <h3>Filters</h3><br>
            <form method="GET" id="filterForm-top">
                <div class='flex_row'>
                <label for="vehicles">Date Range:</label>
                <input type="number" placeholder='mininmum no. of vehicles' name="min_vehicles" id="min_vehicles" class='inputs-small' value="<?=set_value('start_date')?>">
                <input type="number" placeholder='maximum no. of vehicles' name="max_vehicles" id="max_vehicles" class='inputs-small' value="<?=set_value('end_date')?>">
    </div><div>
                <label for="company_search">User Search:</label>
                <input type="text" name="company_search" id="company_search" placeholder="Search by company" class='inputs-small' value="<?=set_value('company_search')?>">
                </div>

                <input type="hidden" name="user" value="<?php echo $_SESSION['type']; ?>">
                <input type="submit" value="Apply Filters" class='primarybutton'>
            </form>
        </div>
            
        <div class='table-container'>
            <table class='organization-tables'>
                <tr>
                    <th>BRN</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Petrol Quota</th>
                    <th></th>
                    <th>Petrol Balance</th>
                    <th>Diesel Quota</th>
                    <th></th>
                    <th>Diesel Balance</th>
                    <th>Number of Vehicles</th>
                </tr>

                <?php foreach($data['tablecontent'] as $row){ ?>

                    <tr>
                        <td><?= $row['brn'] ?></td>
                        <td><?= $row['companyname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['mobileno'] ?></td>
                        <td class='center'><input class='small' type="number" name="petrol_quota" value="<?= $row['petrol_quota'] ?>" disabled></td>
                        <td class='center'>
                            <button class="edit-petrol-quota" data-id="<?= $row['brn'] ?>">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.79496 17.5712C1.33663 17.5712 0.94413 17.4082 0.617464 17.082C0.290797 16.7559 0.127742 16.3634 0.128297 15.9045V4.23787C0.128297 3.77954 0.291631 3.38704 0.618297 3.06037C0.944964 2.73371 1.33719 2.57065 1.79496 2.57121H9.23246L7.5658 4.23787H1.79496V15.9045H13.4616V10.1129L15.1283 8.44621V15.9045C15.1283 16.3629 14.965 16.7554 14.6383 17.082C14.3116 17.4087 13.9194 17.5718 13.4616 17.5712H1.79496ZM11.1075 3.05037L12.295 4.21704L6.79496 9.71704V10.9045H7.96163L13.4825 5.38371L14.67 6.55037L8.66996 12.5712H5.1283V9.02954L11.1075 3.05037ZM14.67 6.55037L11.1075 3.05037L13.1908 0.967041C13.5241 0.633708 13.9236 0.467041 14.3891 0.467041C14.8547 0.467041 15.2469 0.633708 15.5658 0.967041L16.7325 2.15454C17.0519 2.47399 17.2116 2.86287 17.2116 3.32121C17.2116 3.77954 17.0519 4.16843 16.7325 4.48787L14.67 6.55037Z" fill="#35363A"/>
                                </svg>
                            </button>
                            <button class="submit-petrol-quota" data-id="<?= $row['brn'] ?>" style="display:none;">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.97871 17.8511C1.44808 17.8511 0.993663 17.662 0.615466 17.2838C0.237269 16.9056 0.0484917 16.4515 0.0491349 15.9215V2.41444C0.0491349 1.88381 0.238234 1.42939 0.616431 1.0512C0.994628 0.672999 1.44872 0.484222 1.97871 0.484865H12.7602C13.0175 0.484865 13.2629 0.533104 13.4964 0.629583C13.7298 0.726062 13.9347 0.862741 14.1109 1.03962L16.8606 3.78927C17.0375 3.96615 17.1741 4.17133 17.2706 4.4048C17.3671 4.63828 17.4153 4.88334 17.4153 5.13997V15.9215C17.4153 16.4521 17.2262 16.9065 16.848 17.2847C16.4698 17.6629 16.0158 17.8517 15.4858 17.8511H1.97871ZM15.4858 5.16409L12.7361 2.41444H1.97871V15.9215H15.4858V5.16409ZM8.73224 14.9567C9.53623 14.9567 10.2196 14.6753 10.7824 14.1125C11.3452 13.5497 11.6266 12.8663 11.6266 12.0623C11.6266 11.2583 11.3452 10.575 10.7824 10.0122C10.2196 9.44937 9.53623 9.16797 8.73224 9.16797C7.92825 9.16797 7.24486 9.44937 6.68206 10.0122C6.11927 10.575 5.83787 11.2583 5.83787 12.0623C5.83787 12.8663 6.11927 13.5497 6.68206 14.1125C7.24486 14.6753 7.92825 14.9567 8.73224 14.9567ZM3.90829 7.23839H10.6618C10.9352 7.23839 11.1645 7.14577 11.3497 6.96053C11.535 6.77529 11.6272 6.54631 11.6266 6.2736V4.34402C11.6266 4.07067 11.534 3.84137 11.3487 3.65613C11.1635 3.47089 10.9345 3.37859 10.6618 3.37923H3.90829C3.63494 3.37923 3.40564 3.47185 3.2204 3.65709C3.03516 3.84233 2.94286 4.07131 2.9435 4.34402V6.2736C2.9435 6.54696 3.03612 6.77626 3.22136 6.9615C3.4066 7.14674 3.63558 7.23903 3.90829 7.23839ZM1.97871 5.16409V15.9215V2.41444V5.16409Z" fill="#35363A"/>
                                </svg>
                            </button>
                        </td>
                        <td class='center'><?= $row['petrol_balance'] ?></td>
                        <td class='center'><input class='small' type="number" name="diesel_quota" value="<?= $row['diesel_quota'] ?>" disabled></td>
                        <td class='center'>
                            <button class="edit-diesel-quota" data-id="<?= $row['brn'] ?>">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.79496 17.5712C1.33663 17.5712 0.94413 17.4082 0.617464 17.082C0.290797 16.7559 0.127742 16.3634 0.128297 15.9045V4.23787C0.128297 3.77954 0.291631 3.38704 0.618297 3.06037C0.944964 2.73371 1.33719 2.57065 1.79496 2.57121H9.23246L7.5658 4.23787H1.79496V15.9045H13.4616V10.1129L15.1283 8.44621V15.9045C15.1283 16.3629 14.965 16.7554 14.6383 17.082C14.3116 17.4087 13.9194 17.5718 13.4616 17.5712H1.79496ZM11.1075 3.05037L12.295 4.21704L6.79496 9.71704V10.9045H7.96163L13.4825 5.38371L14.67 6.55037L8.66996 12.5712H5.1283V9.02954L11.1075 3.05037ZM14.67 6.55037L11.1075 3.05037L13.1908 0.967041C13.5241 0.633708 13.9236 0.467041 14.3891 0.467041C14.8547 0.467041 15.2469 0.633708 15.5658 0.967041L16.7325 2.15454C17.0519 2.47399 17.2116 2.86287 17.2116 3.32121C17.2116 3.77954 17.0519 4.16843 16.7325 4.48787L14.67 6.55037Z" fill="#35363A"/>
                                </svg>
                            </button>
                            <button class="submit-diesel-quota" data-id="<?= $row['brn'] ?>" style="display:none;">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.97871 17.8511C1.44808 17.8511 0.993663 17.662 0.615466 17.2838C0.237269 16.9056 0.0484917 16.4515 0.0491349 15.9215V2.41444C0.0491349 1.88381 0.238234 1.42939 0.616431 1.0512C0.994628 0.672999 1.44872 0.484222 1.97871 0.484865H12.7602C13.0175 0.484865 13.2629 0.533104 13.4964 0.629583C13.7298 0.726062 13.9347 0.862741 14.1109 1.03962L16.8606 3.78927C17.0375 3.96615 17.1741 4.17133 17.2706 4.4048C17.3671 4.63828 17.4153 4.88334 17.4153 5.13997V15.9215C17.4153 16.4521 17.2262 16.9065 16.848 17.2847C16.4698 17.6629 16.0158 17.8517 15.4858 17.8511H1.97871ZM15.4858 5.16409L12.7361 2.41444H1.97871V15.9215H15.4858V5.16409ZM8.73224 14.9567C9.53623 14.9567 10.2196 14.6753 10.7824 14.1125C11.3452 13.5497 11.6266 12.8663 11.6266 12.0623C11.6266 11.2583 11.3452 10.575 10.7824 10.0122C10.2196 9.44937 9.53623 9.16797 8.73224 9.16797C7.92825 9.16797 7.24486 9.44937 6.68206 10.0122C6.11927 10.575 5.83787 11.2583 5.83787 12.0623C5.83787 12.8663 6.11927 13.5497 6.68206 14.1125C7.24486 14.6753 7.92825 14.9567 8.73224 14.9567ZM3.90829 7.23839H10.6618C10.9352 7.23839 11.1645 7.14577 11.3497 6.96053C11.535 6.77529 11.6272 6.54631 11.6266 6.2736V4.34402C11.6266 4.07067 11.534 3.84137 11.3487 3.65613C11.1635 3.47089 10.9345 3.37859 10.6618 3.37923H3.90829C3.63494 3.37923 3.40564 3.47185 3.2204 3.65709C3.03516 3.84233 2.94286 4.07131 2.9435 4.34402V6.2736C2.9435 6.54696 3.03612 6.77626 3.22136 6.9615C3.4066 7.14674 3.63558 7.23903 3.90829 7.23839ZM1.97871 5.16409V15.9215V2.41444V5.16409Z" fill="#35363A"/>
                                </svg>
                            </button>
                        </td>
                        <td class='center'> <?= $row['diesel_balance'] ?></td>
                        <td class='center'><?= $row['vehicle_count']?></td>
                    </tr>

                <?php
                }
                ?>
                </table>
        </div>
    </div>
    

    <?php else:?>
        <h3>Log in to access the features</h3>
        <a href="<?=ROOT?>/home">
            <div class='primarybutton'>Login</div>
        </a>
    <?php endif;?>

    <script>
        var ROOT = '<?= ROOT ?>';
        const brn = row.querySelector('td:first-child').textContent;

        document.querySelectorAll('.edit-petrol-quota').forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="petrol_quota"]');
                input.disabled = false;
                input.focus();
                e.target.style.display = 'none';
                row.querySelector('.submit-petrol-quota').style.display = 'inline';
            });
        });

        document.querySelectorAll('.submit-petrol-quota').forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="petrol_quota"]');
                const brn = e.target.dataset.id;
                const newQuota = input.value;

                const response = await fetch(ROOT + '/organizations/updatePetrolQuota', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ brn, quota: newQuota })
                });

                    if (response.ok) {
                        input.disabled = true;
                        e.target.style.display = 'none';
                        row.querySelector('.edit-petrol-quota').style.display = 'inline';
                    } else {
                        console.error('Failed to update the quota');
                    }
                });
            });

            document.querySelectorAll('.edit-diesel-quota').forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="diesel_quota"]');
                input.disabled = false;
                input.focus();
                e.target.style.display = 'none';
                row.querySelector('.submit-diesel-quota').style.display = 'inline';
            });
        });

        document.querySelectorAll('.submit-diesel-quota').forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault();
                const row = e.target.parentElement.parentElement;
                const input = row.querySelector('input[name="diesel_quota"]');
                const brn = e.target.dataset.id;
                const newQuota = input.value;

                const response = await fetch(ROOT + '/organizations/updateDieselQuota', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ brn, quota: newQuota })
                });

                    if (response.ok) {
                        input.disabled = true;
                        e.target.style.display = 'none';
                        row.querySelector('.edit-diesel-quota').style.display = 'inline';
                    } else {
                        console.error('Failed to update the quota');
                    }
                });
            });
    </script>
</body>
</html>