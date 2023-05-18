<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">
    <link href = "../public/assets/css/tables.css" rel = "stylesheet">
    <style>
        #customers{
            color: #E14761;}
    </style>
    <title>Customers</title>
</head>
<body>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    
    <form method="POST">
        <div class = 'filters'>
            <div class = 'filter_section'> NIC Number<input type="text" name="nic" id='nic' placeholder="Enter NIC here"></div>
            <div class = 'filter_section'>Phone Number<input type="text" name="phone" id='phone' placeholder="07.."></div>
            <div class = 'filter_section'>Select Location &ensp;
                <select name='loc' id='loc'>
                    <option value='' disabled>Select Location</option>
                    <option value=''>All</option>
                    <?php
                        foreach($data['city'] as $city):?>
                            <option value='<?=$city['city']?>'><?=$city['city']?></option>
                        <?php endforeach;?>
                </select>
            </div>
           <button class = 'filter_button' type="submit" name="filter">Filter</button>
           <button class = 'unfilter_button' type="reset" name="filter">Send All</button>
        </div>
    </form>
    
    <div id="table">
        <table class="data_view" id='data'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            <?php if(!empty($data['customers'])):?>
                <?php foreach($data['customers'] as $customer):?>
                    <tr>
                        <td><?=$customer['id']?></td>
                        <td><?=$customer['name']?></td>
                        <td><?=$customer['email']?></td>
                        <td><?=$customer['phone']?></td>
                        <td><?=$customer['res_number']?>, <?=$customer['street_num']?>,<?=$customer['city']?></td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td colspan="5">No Customers Found</td>
                </tr>
            <?php endif;?>
        </table>
    </div>
</body>
</html>