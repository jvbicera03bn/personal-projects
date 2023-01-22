<?php
session_start();
require("new-connection.php");
if (!isset($_SESSION['start'])) {
    $_SESSION['log_status'] = FALSE;
    $_SESSION['start'] = TRUE;
}
if ($_SESSION['log_status'] === TRUE) {
    $user_info = $_SESSION['personal_infos'];
}
$query = "SELECT reviews.review_id,user.first_name, user.last_name,reviews.content, DATE_FORMAT(reviews.created_at, '%b %D %Y %h:%i%p' ) as date  FROM reviews
    INNER JOIN user ON reviews.user_id = user.user_id ORDER BY date asc;";
$_SESSION['review_info'] = fetch_all($query);
$query = "SELECT user.first_name, user.last_name, reply.content, DATE_FORMAT(reply.created_at, '%b %D %Y %h:%i%p') as date, reply.review_id FROM reply
INNER JOIN user ON reply.user_id = user.user_id INNER JOIN reviews ON reply.review_id = reviews.review_id ORDER BY date asc;";
$_SESSION['reply_info'] = fetch_all($query);
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
        <h1>The Wall</h1>
        <div class="wel_user">
<?php       if ($_SESSION['log_status'] === TRUE) { ?>
                <span>Welcome <?= ucfirst($user_info['first_name']) ?>!</span>
                <form id="log_out" action="process.php" method="post">
                    <input type="submit" name="form_type" value="Log out" />
                </form>
<?php           } else { ?>
                <form id="log_in" action="process.php" method="post">
                    <input type="submit" name="form_type" value="Log in"/>
                </form>
<?php           } ?>
        </div>
    </header>
    <main>
        <?php if ($_SESSION['log_status'] === TRUE) { ?>
            <div id="post_form">
                <h4 class="label">Post Something in your wall</h4>
                <form action="process.php" method="post" id="review">
                    <textarea name="review_content"></textarea>
                    <input type="hidden" name="form_type" value="review">
                    <input type="submit" name="review" value="Post a Review">
                </form>
            </div>
<?php           } ?>
        <div id="wall">
<?php       foreach ($_SESSION['review_info'] as $review) { ?>
                <div class="post">
                    <div class="review">
                        <h3><?= ucfirst($review['first_name']) ?> <?= ucfirst($review['last_name']) ?> (<?= $review['date'] ?>) </h3>
                        <p><?= $review['content'] ?></p>
                    </div>
<?php               foreach ($_SESSION['reply_info'] as $reply) {
                        if ($review['review_id'] === $reply['review_id']) { ?>
                            <div class="reply">
                                <h3> - <?= ucfirst($reply['first_name']) ?> <?= ucfirst($reply['last_name']) ?> (<?= $reply['date'] ?>) </h3>
                                <p><?= $reply['content'] ?></p>
                            </div>
<?php                       }
                    }
                    if ($_SESSION['log_status'] === TRUE) { ?>
                        <h4 class="label">Comment</h4>
                        <form action="process.php" method="post" id="reply">
                            <textarea name="reply_content"> </textarea>
                            <input type="hidden" name="form_type" value="reply">
                            <input type="hidden" name="review_id" value="<?= $review['review_id'] ?>">
                            <input type="submit" name="reply" value="Reply">
                        </form>
<?php                   } ?>
                </div>
<?php               } ?>
            <span class="hr"></span>
        </div>
    </main>
</body>
</html>