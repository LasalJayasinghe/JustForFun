<link href="<?=ROOT?>/assets/css/nav.css" rel="stylesheet">
<nav>
    <div id="nav_container">
        <div class="logo">
            <a href="<?=ROOT?>/<?=$_SESSION['type']?>_dashboard"><img class="logo" src="<?=ROOT?>/assets/images/logo.png"></a>
        </div>

        <?php if(Auth::logged_in()):?>
            <?php if($_SESSION['type'] == 'admin'):?>
                <h3 class='nav_header'>Admin: <?= Auth::getusername() ?></h3>
                <div class="nav">
    
                </div>
            <?php elseif($_SESSION['type'] == 'station'): ?>
                <!-- === change this to fit stations === -->
                <h3 class='nav_header'>Station: <?= Auth::getname() ?></h3>
                <div class="nav">
   
                </div>
                
            <?php elseif($_SESSION['type'] == 'org'):?>
                <!-- === change this to fit organizations === -->
                <h3 class='nav_header'>Organization: <?= Auth::getcompanyname() ?></h3>
                <div class="nav">

                </div>
                <?php elseif($_SESSION['type'] == 'customer'):?>
                <!-- === change this to fit organizations === -->
                <div class="nav">

                </div>
            <?php elseif($_SESSION['type'] == 'operator'):?>
                <!-- change this to fit operators -->
                <div class="nav">

                    <div class="item"></div>        
                </div>

            <?php elseif($_SESSION['type'] == 'customer'):?>
                <!-- change this to fit customers -->
                <div class="nav">

                    <div class="item"></div>        
                </div>
            <?php endif;?>
        <?php endif; ?>
    
        <div class='dp'>
            <img class='dp' src="<?=ROOT?>/assets/images/profiles/<?=$_SESSION['type']?>.svg" onclick="togglemenu()">
        </div>
    </div>
    <div class='profilemenuwrap' id="profmenu">
        <div class='profilemenu'>
            <ul type='none'>
                <li class='profilemenu-item'><strong>Hello <?=Auth::getname();?></strong></li>
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
