<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= ROOT ?>/assets/css/profilee.css" rel="stylesheet">
    <title>Profile update</title>
</head>

<body>
    <?php
    $this->view('includes/nav', $data);
    ?>
    <br><br>

    <?php
    $row = $data['row'];
    if (!empty($row)) : ?>
        <div class="profile-card">
            <div class="card">
                <div><img src="<?= ROOT ?>/assets/images/profiles/<?= $_SESSION['type'] ?>.svg" alt="logo" id="gas"></div>
            </div>

            <div class="form-container">
                <h1>Change Password</h1>

                <form id="form" method="POST">
                    <label for="oldPassword">Old Password</label><br>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Old Password" required1>
                    <?php if (!empty($data['errors']['oldPassword'])) : ?>
                        <div style="color: #ca0000"><?= $data['errors']['oldPassword']; ?></div>
                    <?php endif; ?>
                    <br>

                    <label for="password">New Password</label><br>
                    <input value="<?= set_value('password') ?>" type="password" id="password" name="password" placeholder="Enter the New Password" required1>
                    <?php if (!empty($data['errors']['password'])) : ?>
                        <div style="color: #ca0000"><?= $data['errors']['password']; ?></div>
                    <?php endif; ?>
                    <br>

                    <label for="c_np">New Password Again</label><br>
                    <input type="password" id="c_np" name="c_np" placeholder="Verify the New Password" required1>
                    <?php if (!empty($data['errors']['c_np'])) : ?>
                        <div style="color: #ca0000"><?= $data['errors']['c_np']; ?></div>
                    <?php endif; ?>
                    <br>

                    <button value="Reload Page" onClick="window.location.reload(true)" type="reset" class="secondarybutton">Reset</button>

                    <a href="<?= ROOT ?>/Customer/profile">
                        <button type="submit" class="primarybutton">Save</button>
                    </a>
                </form>
            </div>
        </div>

    <?php else : ?>
        <h4>That profile was not found</h4>
    <?php endif; ?>

</body>

</html>