<?php
session_start();
require("new-connection.php");
if (!isset($_SESSION['start'])) {
    $_SESSION['log_status'] = FALSE;
    $_SESSION['start'] = TRUE;
}
if ($_SESSION['log_status'] === TRUE) {
    $user_info = $_SESSION['personal_infos'][0];
}
review();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Success</title>
    </head>
    <body>
        <header>
            <h1>Blog</h1>
            <div class="wel_user">
<?php           if ($_SESSION['log_status'] === TRUE) { ?>
                    <span>Welcome <?= $user_info['first_name'] ?>!</span>
                    <form id="log_out" action="process.php" method="post">
                        <input type="submit" name="log_out" value="log out" />
                        <input type="hidden" name="form_type" value="out_main">
                    </form>
<?php           } else { ?>
                    <form id="log_in" action="process.php" method="post">
                        <input type="submit" name="log_in" value="log in" />
                        <input type="hidden" name="form_type" value="log_in_main">
                    </form>
<?php           } ?>
            </div>
        </header>
        <main>
            <article>
                <h1>THIS IS A TITLE</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel ornare nibh. Integer non magna id justo euismod dapibus.
                    Suspendisse potenti. Vestibulum eu congue sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                    turpis egestas. Etiam scelerisque ultricies justo, in iaculis tellus rutrum volutpat. Suspendisse congue tempus ante, sed lobortis
                    ligula suscipit id. Donec ac cursus diam. Morbi maximus volutpat semper. Cras mollis accumsan porttitor. Vivamus dignissim libero
                    nunc, et auctor libero rhoncus id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet varius odio. Phasellus
                    neque justo, volutpat vitae lacus eu, congue tempor lorem. Nullam eget leo congue arcu sagittis vehicula. Praesent laoreet, tellus
                    non vestibulum condimentum, nisi diam scelerisque ex, vel fringilla arcu velit ac mauris. Fusce vel mi interdum nulla faucibus
                    volutpat in vel felis. Nunc efficitur ipsum id nunc mollis, nec vehicula ligula rutrum. Vestibulum suscipit ultricies volutpat.
                    Vivamus pellentesque est ut odio elementum, eu porttitor mauris consectetur. Ut in dui vel diam aliquam commodo. Suspendisse
                    orci justo, consequat et eleifend id, convallis et elit. Suspendisse eleifend at nisl ut luctus. Vestibulum vitae tortor in
                    sapien porttitor ultricies. Sed nec tellus in felis volutpat ullamcorper et sit amet orci. Phasellus commodo lobortis ipsum,
                    molestie auctor est bibendum aliquam. Fusce cursus, sem at pellentesque tristique, tellus justo vulputate magna, et porta massa
                    arcu et metus. Mauris ullamcorper tempus nunc, non bibendum nulla lacinia et. Mauris vitae lobortis leo. Quisque ultricies sodales
                    leo. Fusce vel libero sed neque vestibulum tincidunt non at dui. Nullam diam sem, dignissim nec ipsum vitae, sagittis fringilla elit.</p>
                <span class="hr"></span>
            </article>
            <span>Reviews</span>
<?php           if ($_SESSION['log_status'] === TRUE) { ?>
                <form action="process.php" method="post" id="review">
                    <textarea name="review_content"></textarea>
                    <input type="hidden" name="form_type" value="review">
                    <input type="submit" name="review" value="Post a Review">
                </form>
<?php           } ?>
            <div id="reviews">
                <div>
<?php               foreach ($_SESSION['review_info'] as $review) { ?>
                        <span class="hr"></span>
                        <div class="review">
                            <h3><?= $review['first_name'] ?> <?= $review['last_name'] ?> (<?= $review['date'] ?>) </h3>
                            <p><?= $review['content'] ?></p>
                        </div>
<?php               foreach ($_SESSION['reply_info'] as $reply) {
                        if ($review['review_id'] === $reply['review_id']) { ?>
                            <div class="reply">
                                <h3> - <?= $reply['first_name'] ?> <?= $reply['last_name'] ?> (<?= $reply['date'] ?>) </h3>
                                <p><?= $reply['content'] ?></p>
                            </div>
<?php                       }
                    }
                        if ($_SESSION['log_status'] === TRUE) { ?>
                            <form action="process.php" method="post" id="reply">
                                <textarea name="reply_content"> </textarea>
                                <input type="hidden" name="form_type" value="reply">
                                <input type="hidden" name="review_id" value="<?= $review['review_id'] ?>">
                                <input type="submit" name="reply" value="Reply">
                            </form>
<?php                   }
                    } ?>
                </div>
                <span class="hr"></span>
            </div>
        </main>
    </body>
</html>