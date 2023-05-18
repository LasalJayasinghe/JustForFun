<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">
    <link href = "../public/assets/css/tables.css" rel = "stylesheet">
    <style>
        #vehicles{
            color: #E14761;}
    </style>
    <title>Vehicles</title>
</head>
<body>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>

    <div class='filters'>
    </div>

    <div id="table">
        <table class="data_view" id='data'>
            <tr>
                <th>vehicle number</th>
                <th>Vehicle type</th>
                <th>Fuel type</th>
                <th>Balance quota</th>
            </tr>
            <?php if(!empty($data['vehicles'])):?>
                <?php foreach($data['vehicles'] as $vehicles):?>
                    <tr>
                        <td><?=$vehicles['vehicleno']?></td>
                        <td><?=$vehicles['category']?></td>
                        <td><?=$vehicles['fuel']?></td>
                        <td><?=$vehicles['balance_quota']?></td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td colspan="5">No Vehicles Found</td>
                </tr>
            <?php endif;?>
        </table>
    </div>
</body>
</html>