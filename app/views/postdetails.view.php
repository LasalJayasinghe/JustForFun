<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../public/assets/css/adminstyles.css" rel = "stylesheet">
    <link href = "../public/assets/css/forumstyles.css" rel = "stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="nav-placeholder"><?php $this->view('includes/nav',$data);?></div>
    <?php if(Auth::loggedin()):?>

    <div class='floatpost'>
        <div class='leftcol'>
            <div class='postcontent'>
                <div class='postTitle'>
                    <?= $data['post']['title']; ?>
                    <?php if ($_SESSION['type'] == 'admin') : ?>
                    <form action="formhandler" method="post">
                        <input type="hidden" name="post_id" value="<?= $data['post']['postID']; ?>" />
                        <button type="submit" name='deletePost'><img src ='<?=ROOT?>/assets/images/delete.svg'> </button>
                    </form>
                <?php endif; ?>
                </div>
                <div class='dateauthor'>
                    <div><b>Posted by:</b> <?= $data['post']['admin']; ?></div>
                    <div><?php
                        $dateTime = new DateTime($data['post']['timestamp']);
                        // Format the timestamp to show only hours and minutes
                        $data['post']['timestamp'] = $dateTime->format('Y-m-d H:i');
                        echo($data['post']['timestamp']); ?></div>
                </div>
                <div class='postDesc'>
                    <?= $data['post']['content']; ?>
                </div>
                
            </div>
            <!-- new comment input and submit -->
            <form action="" method="post" class='newcommentcontainer'>
                <div class='newcomment'>
                    <textarea name="content" class='inputs2' placeholder="comment here"></textarea>
                    <button type="submit" value="submit" class='primarybutton2'>
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.01571 13.4643C1.72877 13.5791 1.45617 13.5539 1.19792 13.3886C0.939672 13.2233 0.810547 12.9831 0.810547 12.6681V9.46147C0.810547 9.26061 0.867936 9.08127 0.982713 8.92345C1.09749 8.76563 1.25531 8.6652 1.45617 8.62216L7.6972 7.07266L1.45617 5.52317C1.25531 5.48012 1.09749 5.37969 0.982713 5.22188C0.867936 5.06406 0.810547 4.88472 0.810547 4.68386V1.47725C0.810547 1.16162 0.939672 0.921157 1.19792 0.755878C1.45617 0.590598 1.72877 0.565633 2.01571 0.680985L15.2725 6.27639C15.6312 6.43421 15.8105 6.69964 15.8105 7.07266C15.8105 7.44569 15.6312 7.71112 15.2725 7.86893L2.01571 13.4643Z" fill="white"/>
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
        <?php if(isset($data['comments']) && is_array($data['comments'])): ?>
            <?php foreach($data['comments'] as $comment): ?>
                <div class='commentbox'>
                    <div class='commentcontent'>
                        <?php if(isset($comment['content'])): ?>
                            <?= $comment['content']; ?>
                        <?php endif; ?>
                        <?php if ($_SESSION['type'] == 'admin') : ?>
                            <form action="formhandler" method="post">
                                <input type="hidden" name="post_id" value="<?= $data['post']['postID']; ?>" />
                                <input type="hidden" name="comment_id" value="<?= $comment['commentID']; ?>" />
                                <button type="submit" name='deleteComment'><img src ='<?=ROOT?>/assets/images/delete.svg'> </button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class='commentdateauthor'>
                        <div><?php if(isset($comment['author'])) echo $comment['author']; ?></div>
                        <div><?php if(isset($comment['timestamp'])) echo $comment['timestamp']; ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</div>

<?php else:
    header('Location: /login');
    exit();
endif;
?>
</body>
</html>
