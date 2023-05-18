<link href="<?=ROOT?>/assets/css/nav.css" rel="stylesheet">
<nav>
    <div id="nav_container">
        <div class="logo">
            <a href="<?=ROOT?>/<?=$_SESSION['type']?>_dashboard"><img class="logo" src="<?=ROOT?>/assets/images/logo.png"></a>
        </div>

        <?php if(Auth::logged_in()):?>
            <?php if($_SESSION['type'] == 'admin'):?>
                <?php $user = Auth::getusername(); ?>
                <h3 class='nav_header'>Admin: <?= $user ?></h3>
                <div class="nav">
                    <div class="item"><a id="add-admin" href="<?=ROOT?>/signup?usertype=admin">Add Admin</a></div>
                    <div class="item"><a id="orgs" href="<?=ROOT?>/organizations">Organizations</a></div>
                    <!-- <div class="item"><a id="stations" href="<?=ROOT?>/stations">Stations</a></div> -->
                    <div class="item"><a id="forum" href="<?=ROOT?>/forum">Forum</a></div>     
                </div>
            <?php elseif($_SESSION['type'] == 'station'): ?>
                <!-- === change this to fit stations === -->
                <?php $user = Auth::getname(); ?>
                <h3 class='nav_header'>Station: <?= $user ?></h3>
                <div class="nav">
                    <div class="item"><a id="operators" href="<?=ROOT?>/operators">Operators</a></div>
                    <div class="item"><a id="restock" href="<?=ROOT?>/fuelrestock">Stock updates</a></div>
                    <div class="item"><a id="forum" href="<?=ROOT?>/forum">Forum</a></div>
                    <div class="item"><a id="stats" href="<?=ROOT?>/stats">Stats</a></div>    
                </div>
                
            <?php elseif($_SESSION['type'] == 'org'):?>
                <!-- === change this to fit organizations === -->
                <?php $user = Auth::getcompanyname(); ?>
                <h3 class='nav_header'>Organization: <?= $user ?></h3>
                <div class="nav">
                    <div class="item"><a id="qr" href="<?=ROOT?>/Org_qr">QR Code</a></div>
                    <div class="item"><a id="forum" href="<?=ROOT?>/forum?user=org">Forum</a></div>
                    <div class="item"><a id="vehicles" href="<?=ROOT?>/Org_vehicle">Vehicles</a></div>
                    <div class="item"><a id="others" href="<?=ROOT?>/Org_Other">Others</a></div>
                    <div class="item"><a id="transactions" href="<?=ROOT?>/Org_transactions">Transactions</a></div>
                </div>
                <?php elseif($_SESSION['type'] == 'customer'):?>
                <!-- === change this to fit organizations === -->
                <?php $user = Auth::getname(); ?>
                <h3 class='nav_header'>User: <?= $user ?></h3>
                <div class="nav">
                    <div class="item"><a id="find_fuel" href="<?=ROOT?>/Cus_findfuel">Find Fuel</a></div>
                    <div class="item"><a id="qr" href="<?=ROOT?>/Cus_qr">QR Code</a></div>
                    <div class="item"><a id="forum" href="<?=ROOT?>/forum?user=customer">Forum</a></div>
                    <div class="item"><a id="transactions" href="<?=ROOT?>/Cus_transactions">Transactions</a></div>
                </div>

            <?php elseif($_SESSION['type']=='operator'):
                $user = Auth::getname(); ?>
            <?php endif;?>
        <?php endif; ?>
    
        <div class='dp'>
            <img class='dp' src="<?=ROOT?>/assets/images/profiles/<?=$_SESSION['type']?>.svg" onclick="togglemenu()">
        </div>
    </div>
    <div class='profilemenuwrap' id="profmenu">
        <div class='profilemenu'>
            <ul type='none'>
                <li class='profilemenu-item'><strong>Logged in as <?= $user;?></strong></li>
                <li class='profilemenu-item' class='disabled'><a href="<?=ROOT?>/Profile">Edit profile</a></li>
                <li class='profilemenu-item'><a href="<?=ROOT?>/logout">Log out</a></li>
            </ul>
        </div>
    </div>
</nav> 

<script>
    let profmenu = document.getElementById('profmenu');

    function togglemenu(){
        profmenu.classList.toggle("openmenu");
    }
</script>
