<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("../public/assets/nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
            // document.getElementById("vehicles").style.display = 'none';
            // document.getElementById("orgs").style.display = 'none';
            // document.getElementById("customers").style.display = 'none';
            // document.getElementById("transactions").style.display = 'none';
            // document.getElementById("complains").style.display = 'none';
            // document.getElementById("stations").style.display = 'none';
        });
        </script>
    <link href="../public/assets/css/adminstyles.css" rel="stylesheet">
</head>
<body>
    <!-- <div id="nav-placeholder"></div> -->
    <h1>Admin Dashboard</h1>
    
     <?php 
        //session_start();
        //$uname = $_SESSION['uname'];
        //echo("<h2>Welcome $uname</h2>");
        //greeting message (just to confirm which account is in use at the moment)
    ?> 

    <div class = "nav2">
        <a id="vehicles" href="vehiclerecords.php"><div class="item2">Vehicles</div></a>
        <a id="customers" href="customerrecords.php"><div class="item2">Customers</div></a>
        <a id="orgs" href="orgrecords.php"><div class="item2">Organizations</div></a>
        <a id="stations" href="stationrecords.php"><div class="item2">Stations</div></a>
        <a id="complains" href="complainsview.php?complainsbtn=pending"><div class="item2">Forum</div></a>
        <a id="transactions" href="transactions.php?sno=&fromdate=&todate=&filter=Filter.php"><div class="item2">Transactions</div></a>
    </div>
</body>
</html>
