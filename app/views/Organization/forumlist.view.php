<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">
    <title>Admin Forum</title>
</head>
<body>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <?php if(Auth::loggedin()):?>
    
    <div class='forum-flex-box'>
        <div class='filters'>
            <h3>Filters</h3>
            <form method="GET" id="filterForm">
                <label for="daterange">Date Range:</label>
                <input type="date" name="start_date" id="start_date" class='inputs' value="<?=set_value('start_date')?>">
                <input type="date" name="end_date" id="end_date" class='inputs' value="<?=set_value('end_date')?>">
                <br/><br/>

                <label for="user_search">User Search:</label>
                <input type="text" name="user_search" id="user_search" placeholder="Search by user" class='inputs' value="<?=set_value('user_search')?>">
                <br/><br/>

                <label for="search_words">Search by Words:</label>
                <input type="text" name="search_words" id="search_words" placeholder="Search by words" class='inputs' value="<?=set_value('search_words')?>">
                <br/><br/>

                <input type="submit" value="Apply Filters" class='primarybutton'>
            </form>
        </div>
        <div class='header'>
            <div id='new' class='new'>
                <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M37.834 46.1666V58.6666C37.834 59.8471 38.234 60.8374 39.034 61.6374C39.834 62.4374 40.8229 62.836 42.0006 62.8332C43.1812 62.8332 44.1715 62.4332 44.9715 61.6332C45.7715 60.8332 46.1701 59.8444 46.1673 58.6666V46.1666H58.6673C59.8479 46.1666 60.8381 45.7666 61.6381 44.9666C62.4381 44.1666 62.8368 43.1777 62.834 41.9999C62.834 40.8194 62.434 39.8291 61.634 39.0291C60.834 38.2291 59.8451 37.8305 58.6673 37.8333H46.1673V25.3333C46.1673 24.1527 45.7673 23.1624 44.9673 22.3624C44.1673 21.5624 43.1784 21.1638 42.0006 21.1666C40.8201 21.1666 39.8298 21.5666 39.0298 22.3666C38.2298 23.1666 37.8312 24.1555 37.834 25.3333V37.8333H25.334C24.1534 37.8333 23.1632 38.2333 22.3632 39.0333C21.5632 39.8333 21.1645 40.8221 21.1673 41.9999C21.1673 43.1805 21.5673 44.1708 22.3673 44.9708C23.1673 45.7708 24.1562 46.1694 25.334 46.1666H37.834ZM42.0006 83.6666C36.2368 83.6666 30.8201 82.5721 25.7507 80.3832C20.6812 78.1944 16.2715 75.2263 12.5215 71.4791C8.77148 67.7291 5.80343 63.3194 3.61732 58.2499C1.43121 53.1805 0.336762 47.7638 0.333984 41.9999C0.333984 36.236 1.42843 30.8194 3.61732 25.7499C5.80621 20.6805 8.77426 16.2708 12.5215 12.5208C16.2715 8.77075 20.6812 5.8027 25.7507 3.61659C30.8201 1.43047 36.2368 0.33603 42.0006 0.333252C47.7645 0.333252 53.1812 1.4277 58.2506 3.61659C63.3201 5.80547 67.7298 8.77353 71.4798 12.5208C75.2298 16.2708 78.1993 20.6805 80.3881 25.7499C82.577 30.8194 83.6701 36.236 83.6673 41.9999C83.6673 47.7638 82.5729 53.1805 80.384 58.2499C78.1951 63.3194 75.227 67.7291 71.4798 71.4791C67.7298 75.2291 63.3201 78.1985 58.2506 80.3874C53.1812 82.5763 47.7645 83.6694 42.0006 83.6666ZM42.0006 75.3332C51.3062 75.3332 59.1881 72.1041 65.6465 65.6457C72.1048 59.1874 75.334 51.3055 75.334 41.9999C75.334 32.6944 72.1048 24.8124 65.6465 18.3541C59.1881 11.8958 51.3062 8.66658 42.0006 8.66658C32.6951 8.66658 24.8131 11.8958 18.3548 18.3541C11.8965 24.8124 8.66732 32.6944 8.66732 41.9999C8.66732 51.3055 11.8965 59.1874 18.3548 65.6457C24.8131 72.1041 32.6951 75.3332 42.0006 75.3332Z" fill="#130E32"/>
                </svg>
            </div>
            <div class='announcements'>
                <?php foreach($data['announcements'] as $announcement): ?>
                    <div class="announcement" style="display: none;">
                        <h3><?= $announcement['title'] ?></h3>
                        <p><?= $announcement['content'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class='posts'>
            <?php
            if (!empty($data['posts'])) {
                foreach ($data['posts'] as $post) {?>
                    <a href='postdetails?id=<?=$post["postID"]?>' class='card'>
                        <div class='card-title-content'>
                            <div class="cardTitle"><?=$post["title"]?> </div>
                            <div class="cardContent"><?= truncate($post["content"],140); ?></div>
                        </div>
                        <div class='authortime'><small>Posted by: <?php
                            if($post["admin"]){
                                echo "Admin: ".$post['admin'];
                            } elseif($post["ownerID"]) {
                                echo $post["ownerID"];
                            } elseif($post["BRN"]) {
                                echo "Business: ".$post['BRN'];
                            }?><br/> on <?= $post["timestamp"]?> </small></div>
                    </a>
                <?php }
            } else {
                echo "<p>No posts found</p>";
            }
            ?>
        </div>
    </div>
    
    <div id='floatform' class='new-forum-form'>
        <div class="form-content">
            <span class="close">&times;</span>
            <h1>Add a new post</h1>
            <form class='forum-form' method="POST">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Title" class='inputs' required>
                <br/>
                <label for="content">Content</label>
                <textarea name="content" class='input-area' placeholder="Content" required></textarea>
                <br/>
                <br/><br/>
                <input type="submit" name="submit" value="Submit" class='primarybutton'>
            </form>
        </div>
    </div>
<!-- 
    <div id='floatpost' class='floating-forum-post'>
        <div class="post-content">
        </div>
        <span class="close">&times;</span>
    </div>
 -->

    <?php else:?>
        <h3>Log in to access the features</h3>
        <a href="<?=ROOT?>/home">
            <div class='primarybutton'>Login</div>
        </a>
    <?php endif;?>

    <script>
        // Get the modal and the div to be clicked
        var modal = document.getElementById("floatform");
        var div = document.getElementById("new");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

<div class="contain">
<a id="forum" href="<?=ROOT?>/forumscreate">
<div class="item2"><h1>Add Post</h1>
    <img class="icon1" src="<?=ROOT?>/assets/images/plus.png">
</div>
</a>
</div>
        // When the user clicks on the div, open the modal
        div.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }

        //announcements rotation:
        const announcements = document.querySelectorAll('.announcements .announcement');
        let currentIndex = 0;

        function displayAnnouncement(index) {
            announcements.forEach((announcement, i) => {
                if (i === index) {
                    announcement.style.display = 'block';
                } else {
                    announcement.style.display = 'none';
                }
            });
        }

        function rotateAnnouncements() {
            if (announcements.length === 0) return;

            displayAnnouncement(currentIndex);
            currentIndex = (currentIndex + 1) % announcements.length;
            setTimeout(rotateAnnouncements, 10000); // Change the announcement every 10 seconds
        }

        rotateAnnouncements();
    </script>
</body>
</html>