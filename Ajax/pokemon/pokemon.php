<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Poke Dex</title>
    <style>
        img {
            margin: 10px 12px;
            border-radius: 10px;
        }

        img:hover {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        img:active {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        }

        .dialog {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            /* overflow: auto; */
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .dialog-content {
            background-color: #fefefe;
            margin: 12% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 28%;
            border-radius: 10px;
        }

        .dialog-content img {
            margin: 0px 145px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
        }

        .dialog-content h3 {
            text-align: center;
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
    </style>
    <script>
        $(document).ready(function() {
            var httr_str;
            var modal = document.getElementById("mydialog");
            /* To Display Pokemon Cards */
            for (i = 1; i <= 100; i++) {
                httr_str += "<img class='pokecard' src='https://images.pokemontcg.io/ex11/" + i + ".png" + "' id ='" + i + "'alt ='" + i + "'>"
            }
            var newhtt_str = httr_str.replace('undefined','');
            $("#pokemons").html(newhtt_str);
            /* Edit Modal */
            $('body').on('click', 'img', function(click) {
                var cardid = click.target.id
                $.get("https://api.pokemontcg.io/v2/cards/ex11-" + cardid, function(res) {
                    var stats = "<img class='pokecard' src='" + res.data['images']['small'] + "'> <h3>Name:" + res.data['name'] + "</h3><h3> HP:" + res.data['hp'] + " </h3><h3>Type:" + res.data['types'] + " </h3><h3>Evolution:" + res.data['evolvesFrom'] + "</h3>";
                    $(".dialog-content").html(stats);
                }, "json");
                modal.style.display = "block";
                console.log('Clicked');
            });
            /* Closes The Modal */
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</head>

<body>
    <div id="mydialog" class="dialog">
        <div class="dialog-content">

        </div>
    </div>
    <div id="pokemons">

    </div>
</body>

</html>