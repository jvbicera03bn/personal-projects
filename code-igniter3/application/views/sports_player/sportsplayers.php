<!DOCTYPE html>
<?php
$players = $vdata['players'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                border: 0px;
                font-family: Andale Mono, monospace;
            }
            main{
                width: 1000px;
                margin: 60px auto;
                border: 1px solid;
                border-radius: 10px;
                box-shadow: -1px 0px 6px 1px rgba(0,0,0,0.29);
            }
            div#sidebar{
                border-radius: 10px;
                box-shadow: -1px 0px 6px 1px rgba(0,0,0,0.29);
                border: 1px solid;
                margin: 10px;
                width: 22%;
                height: 500px;
                display: inline-block;
                vertical-align: top;
                padding: 10px;
            }
            div#maincontent{
                border-radius: 10px;
                box-shadow: -1px 0px 6px 1px rgba(0,0,0,0.29);
                border: 1px solid;
                margin: 10px 10px 10px 0px;
                width: 69%;
                height: 500px;
                display: inline-block;
                vertical-align: top;
                padding: 10px;
            }
            .cbox{
                margin:5px;
            }
            .cbox input {
                margin: 10px;
            }
            .cbox label {
                font-size: 23px;
            }
            #sbar{
                padding: 10px;
            }
            input#player{
                border-radius: 10px;
                padding: 5px;
                margin: 10px;
                border: 1px solid;
                width: 185px;
            }
            input#form_submit{
                padding: 5px;
                border: 1px solid;
                border-radius: 10px;
                box-shadow: -1px 0px 6px 1px rgba(0,0,0,0.29);
                position: relative;
                left: 155px;
            }
            .profile{
                display: inline-block;
                text-align: center;
                border-radius: 10px;
                border: 1px solid;
                padding: 5px;
                margin: 5px 9px;
            }
            .playerpic{
                width:100px;
                height: 100px;
            }

        </style>
        <title>Document</title>
    </head>
    <body>
        <main>
            <div id="sidebar">
                <form action="search-players" method="post">
                        <input type="text" name="player_search" id="player" placeholder="Enter Name">
                    <div class="cbox">
                        <input type="checkbox" id="Male" name="gender1" value="Male"/><label for="Male">Male</label>
                    </div>
                    <div class="cbox">
                        <input type="checkbox" id="Female" name="gender2" value="Female"/><label for="Female">Female</label>
                    </div>
                    <h2 id='sbar'>Sports</h2>
                    <div class="cbox">
                        <input type="checkbox" id="Basketball" name="sports1" value="Basketball"/><label for="Basketball">Basketball</label>
                    </div>
                    <div class="cbox">
                        <input type="checkbox" id="Volleyball" name="sports2" value="Volleyball"/><label for="Volleyball">Volleyball</label>
                    </div>
                    <div class="cbox">
                        <input type="checkbox" id="Baseball" name="sports3" value="Baseball"/><label for="Baseball">Baseball</label>
                    </div>
                    <div class="cbox">
                        <input type="checkbox" id="Soccer" name="sports4" value="Soccer"/><label for="Soccer">Soccer</label>
                    </div>
                    <div class="cbox">
                        <input type="checkbox" id="Football" name="sports5" value="Football"/><label for="Football">Football</label>
                    </div>
                    <input type="submit" value="Search" id="form_submit">
                </form>
            </div>
            <div id="maincontent">
<?php           foreach ($players as $player){ ?>
                    <div class="profile">
                        <img src='<?=$player['img_link']?>' alt="player" class="playerpic">
                        <h4><?=ucfirst($player['first_name'])?> <?=ucfirst($player['last_name'])?></h4>
                    </div>
<?php           } ?>
            </div>
        </main>
        
    </body>
</html>