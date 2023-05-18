<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle details</title>
    <link href = "../public/assets/css/operatorstyles.css" rel = "stylesheet">
</head>
<body class='dashbody'>
    <div id="nav-placeholder"><?= $this->view('includes/nav',$data); ?></div>
    <h2>Vehicle quota details</h2>
    <hr>
    <table>
        <tr>
            <th>Vehicle number</th>
            <td><?= $data['current_vehicle']['vehicleno']; ?></td>
        </tr><tr>
            <th>Quota</th>
            <td><?= $data['current_vehicle']['total_quota']; ?></td>
        </tr><tr>
            <th>Balance</th>
            <td><?= $data['current_vehicle']['balance_quota']; ?></td>
        </tr><tr>
            <th>Fuel type</th>
            <td><?= $data['current_vehicle']['fuel_type']; ?></td>
        </tr>
    </table>

    <label class='largetext'><?= $data['current_vehicle']['vehicleno']; ?></label>
    <label class='largetext'><?= $data['current_vehicle']['balance_quota']; ?> L Available</label>
    
    <div class='container1'>
    <form action="<?=ROOT?>/formhandler" method="POST">
    <!-- <form method="POST"> -->
        
        <div class='container2'>
            <label>To pump:</label>
            <input type="text" name="amount" id="fuel" class='inputsmall' placeholder='MAX - <?= $data['current_vehicle']['balance_quota']; ?>'>
            <select name="fueltype" id="fueltype" class='inputdropdown'>
                <?php if($data['current_vehicle']['fuel_type'] == "petrol"):?>
                    <option value="92">Petrol 92</option>
                    <option value="95">Petrol 95</option>
                <?php else: ?>
                    <option value="auto">Auto Diesel</option>
                    <option value="super">Super Diesel</option>
                <?php endif; ?>
            </select>

            <div class='buttoncont'>
                <button type="submit" name="update" value='update' id='pump' class='primarybutton'>Pump Fuel</button>
                <button type='submit' name='exit' id="exit" class='secondarybutton'>Exit</button>
            </div>
        </div>        
    </form>
    </div>

    <script>
        window.onload = function(){
            var amount = <?php echo $data['current_vehicle']['balance_quota']; ?>;
            var to_pump = document.getElementById("fuel");
            if(amount == 0){
                document.getElementById("fuel").disabled = true;
                document.getElementById("fueltype").disabled = true;
                document.getElementById("pump").disabled = true;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const fuelInput = document.getElementById('fuel');
            const submitBtn = document.getElementById('pump');
            var amount = <?php echo $data['current_vehicle']['balance_quota']; ?>;

            fuelInput.addEventListener('input', function() {
                let fuelValue = parseInt(fuelInput.value, 10);

                if (fuelValue < 1 || fuelValue > amount || isempty(fuelValue)) {
                    submitBtn.disabled = true;
                    submitBtn.style.backgroundColor = "#F36B82";

                } else {
                    submitBtn.disabled = false;
                    submitBtn.style.backgroundColor = "#E14761";
                }
            });
        });
    </script>

</body>
</html>