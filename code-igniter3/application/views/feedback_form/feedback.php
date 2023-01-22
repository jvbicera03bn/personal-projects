<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("application/assets/feedback.css"); ?>" type="text/css" media="all" />
    <title>Document</title>
</head>

<body>
    <h1>Feedback Form</h1>
    <form method="POST" action="feedbackctrler/result">
        <div class="inp">
            <label for="name">Your Name:</label>
            <input type="text" name="name">
        </div>
        <div class="inp">
            <label for="course">Course Title:</label>
            <select name="course" id="course">
                <option value="Web Fundamental">Web Fundamental</option>
                <option value="PHP Track">PHP Track</option>
                <option value="Jquery Track">Jquery Track</option>
                <option value="Python Track">Python track</option>
            </select>
        </div>
        <div class="inp">
            <label for="rate">Rate:</label>
            <select name="rate" id="rate">
                <?php for ($i = 0; $i <= 10; $i++) { ?>
                    <option value=<?= '"' . $i . '"' ?>><?= $i ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="inp">
            <label for="reason">Reason</label>
            <textarea type="text" name="reason"></textarea>
        </div>
        <input type="submit" name="submit" id="subttn" Placeholder="feedback_form">
    </form>
</body>

</html>