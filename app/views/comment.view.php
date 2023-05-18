<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/assets/css/adminstyles.css" rel="stylesheet">
    <link href="../public/assets/css/forumstyles.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        overflow: hidden;
    }


    .container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 20px f
    }



    .inputs {
        height: 40px;
        width: 90%;
        border-radius: 10px;
        border: 0px;
        padding-left: 20px;
        background-color: #f0f0f0;
        margin: 3px 0px 3px 0px;
    }

    .input-area {
        min-height: 120px;
        max-height: 160px;
        min-width: 90%;
        max-width: 90%;
        border-radius: 10px;
        border: 0px;
        padding-left: 20px;
        background-color: #f0f0f0;
        margin: 3px 0px 3px 0px;
    }

    #buttoncontainer {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 95%;
    }

    .primarybutton {
        width: 150px;
        height: 40px;
        border-radius: 10px;
        border: 0px;
        background-color: #E14761;
        color: #fff;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .primarybutton2 {
        width: 50px;
        height: 42px;
        border-radius: 10px;
        border: 0px;
        background-color: #E14761;
        color: #fff;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin: 3px 0px 3px 0px;
    }

    .secondarybutton {
        width: 150px;
        height: 40px;
        border-radius: 10px;
        border: 2px solid #E14761;
        background-color: white;
        color: #E14761;
    }



    a.hover {
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .item {
        width: 150px;
        font-weight: bold;
        justify-content: center;
        align-items: center;
    }

    #container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        background-color: #f1f1f1;
        padding: 10px;
    }

    button {
        border: 0px;
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .newadmins {
        height: fit-content;
        max-height: 340px;
        width: 90%;
        background-color: #f1f1f3;
        padding: 2px 5px 2px 5px;
        border-radius: 10px;
        grid-column: 1 / 1;
        grid-row: 1 / 1;
    }




    /* forum page */
    .forum-flex-box {
        display: grid;
        height: 85vh;
        width: 97%;
        gap: 15px;
        margin-top: 15px;
        grid-template-columns: 1fr 7fr;
        grid-template-rows: 1fr 3fr;
    }

    .filters {
        height: 100%;
        width: 250px;
        background-color: #f1f1f3;
        color: #35363A;
        padding: 15px 5px 5px 15px;
        grid-row: 1/4;
        border-radius: 10px;
    }

    .header {
        height: 100%;
        width: 100%;
        grid-column: 2/8;
        grid-row: 1/2;
        border-radius: 10px;
        display: flex;
        flex-direction: row;
        column-gap: 20px;
    }

    .new {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-left: 30px;
        padding-right: 30px;
        border-radius: 10px;
        background-color: #f1f1f3;
        color: #35363A;
    }

    .announcements {
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: center;
        border-radius: 10px;
        background-color: #f1f1f3;
        color: #35363A;
        padding-left: 25px;
        padding-right: 25px;
        width: 100%;
    }

    .announcements:hover {
        cursor: pointer;
    }

    .posts {
        display: flex;
        column-gap: 10px;
        row-gap: 10px;
        flex-direction: row;
        align-items: left;
        flex-wrap: wrap;
        height: 100%;
        width: 100%;
        color: #35363A;
        padding: 15px 5px 5px 0px;
        grid-column: 2/8;
        grid-row: 2/4;
        margin-top: 15px;
        border-radius: 10px;
        overflow: scroll;
    }

    .new-forum-form {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
    }

    .form-content {
        background-color: white;
        margin: 30px auto;
        /* 15% from the top and centered */
        padding: 20px;
        width: 50%;
        /* Could be more or less, depending on screen size */
        height: 50%;
        border-radius: 10px;
        margin-top: 100px;
    }

    .forum-form {
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: top;
        height: 100%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .card {
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: space-between;
        width: 185px;
        height: 180px;
        background-color: #f1f1f3;
        color: #35363A;
        padding: 15px 5px 15px 15px;
        border-radius: 10px;
        border: 2px solid transparent;
    }

    .cardTitle {
        overflow: hidden;
        white-space: nowrap;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        text-overflow: ellipsis;
        display: block;
        font-weight: bold;
        height: 30px;
    }

    .card-title-content {
        display: flex;
        flex-direction: column;
        justify-content: top;
        align-items: left;
    }

    .cardContent {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .authortime {
        height: 30px;
        margin-bottom: 0px;
        ;
    }

    .card:hover {
        border: #35363A solid 2px;
        cursor: pointer;
    }

    .floatpost {
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: space-between;
        width: 80%;
        height: 100%;
        border: 2px solid #35363A;
        border-radius: 10px;
        padding: 25px;
    }

    .postTitle {
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 5;
        text-overflow: ellipsis;
        display: block;
        font-weight: bold;
        font-size: large;
        height: 30px;
    }

    .postcontent {
        display: flex;
        flex-direction: column;
        justify-content: top;
        align-items: left;
        border-bottom: #35363A 0.7px solid;
        padding: 10px 0px 10px 0px;
    }

    .dateauthor,
    .commentdateauthor {
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;
        height: 30px;
        margin: 10px 0px 0px 5px;
        font-size: small;
    }

    .commentcontent {
        overflow: scroll;
    }

    .commentbox {
        width: 100%;
        border-bottom: #35363A 0.3px solid;
        padding: 5px 0px 5px 0px;
    }

    .newcomment {
        display: flex;
        flex-direction: row;
        align-items: left;
        justify-content: space-between;
        width: 100%;
    }

    /* for desktop */
    @media(min-width:900px) {
        .nav {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
        }

        .nav2 {
            width: 100%;
            height: 450px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            grid-column: 2 / 2;
            grid-row: 1 / 2;
        }

        .item {
            display: flex;
        }

        .item2 {
            width: 150px;
            height: 150px;
            background-color: #f1f1f3;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-content: center;
            align-items: center;
        }

        .icon1 {
            width: 70px;
            height: 70px;
        }

        .nav2 {
            height: 100%;
        }

        #container {
            padding: 12px
        }

        .grid-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 2fr 1fr;
            gap: 10px;
            height: 400px;
        }

        .newadmins {
            height: 100%;
            width: 95%;
            background-color: #f1f1f3;
            padding: 2px 5px 2px 5px;
            border-radius: 10px;
            grid-column: 1 / 1;
            grid-row: 1 / 2;
        }

    }
</style>

<body>
    <?php
    // $this->view('stationadmin/stationadmin-header', $data)
    $this->view('includes/nav', $data)
    ?>
    <?php if (Auth::logged_in()) : ?>
<br>
        <div class='floatpost'>
            <div class='leftcol'>
                <div class='postcontent'>
                    <div class='postTitle'>
                        <?= $data['post']['title']; ?>
                    </div>
                    <div class='dateauthor'>
                        <div><b>Posted by:</b> <?= $data['post']['admin']; ?></div>
                        <div><?php
                                $dateTime = new DateTime($data['post']['timestamp']);
                                // Format the timestamp to show only hours and minutes
                                $data['post']['timestamp'] = $dateTime->format('Y-m-d H:i');
                                echo ($data['post']['timestamp']); ?></div>
                    </div>
                    <div class='postDesc'>
                        <?= $data['post']['content']; ?>
                    </div>
                
                    <?php if ($_SESSION['type'] == 'admin') : ?>
                    <form action="formhandler" method="post">
                        <input type="hidden" name="post_id" value="<?= $data['post']['postID']; ?>" />
                        <button type="submit"><img src ='<?=ROOT?>/assets/images/delete.svg'> </button>
                    </form>
                <?php endif; ?>
                </div>
                <!-- new comment input and submit -->
                <form action="" method="post" class='newcommentcontainer'>
                    <div class='newcomment'>
                        <textarea name="content" class='inputs2' placeholder="comment here"></textarea>
                        <button type="submit" value="submit" class='primarybutton2'>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.01571 13.4643C1.72877 13.5791 1.45617 13.5539 1.19792 13.3886C0.939672 13.2233 0.810547 12.9831 0.810547 12.6681V9.46147C0.810547 9.26061 0.867936 9.08127 0.982713 8.92345C1.09749 8.76563 1.25531 8.6652 1.45617 8.62216L7.6972 7.07266L1.45617 5.52317C1.25531 5.48012 1.09749 5.37969 0.982713 5.22188C0.867936 5.06406 0.810547 4.88472 0.810547 4.68386V1.47725C0.810547 1.16162 0.939672 0.921157 1.19792 0.755878C1.45617 0.590598 1.72877 0.565633 2.01571 0.680985L15.2725 6.27639C15.6312 6.43421 15.8105 6.69964 15.8105 7.07266C15.8105 7.44569 15.6312 7.71112 15.2725 7.86893L2.01571 13.4643Z" fill="white" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>


            <div class='rightcol'>
                <div class='postTitle'>
                    Responses
                </div>
                <div class='commentcontent'>
                     <?php foreach ($data['comments'] as $comment) { ?>
                        <div class='commentbox'>
                        <form action="formhandler" method="post">
                            <input type="hidden" name="comment_id" value="<?= $data['comments']['commendID']; ?>" />
                            <button type="submit"><img src ='<?=ROOT?>/assets/images/delete.svg'> </button>
                        </form>
                            <div class='commentcontent'>
                                <?= $comment['content']; ?>
                            </div>
                            <div class='commentdateauthor'>
                                <div> <?= $comment['timestamp']; ?></div>
                                <div><?= $comment['author']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    <?php else :
    // header('location: /login');
    endif;
    ?>
</body>

</html>