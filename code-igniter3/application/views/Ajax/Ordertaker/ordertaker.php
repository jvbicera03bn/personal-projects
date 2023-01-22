<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        main {
            border: 1px solid;
            border-radius: 4px;
            margin: 100px auto;
            width: 1000px
        }

        h5,
        p,
        h3 {
            margin: 10px auto;
        }

        div#orders {
            margin: 20px auto;
            width: 95%;
            border-radius: 4px;
        }

        div.order {
            width: 30%;
            height: 170px;
            border: 1px solid;
            border-radius: 4px;
            margin: 13px;
            text-align: center;
            overflow-x: auto;
            display: inline-block;
            vertical-align: top;
        }

        div.order p {
            padding: 10px;
        }

        form {
            margin: 0px auto;
            border: 1px solid;
            padding: 15px;
        }

        form input[type="text"] {
            padding: 5px;
            width: 89%;
            font-size: 20px;
        }

        form input[type="submit"] {
            padding: 5px;
            width: 9%;
            font-size: 20px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $.get("/order/partial", function(res) {
                $("#orders").html(res);
            });

            $("#new_order").submit(function(event) {
                /* console.log($(this).serialize()); */
                $.post('order/take_order', $(this).serialize(), function(res) {
                    $('#quotes').html(res);
                });
            });
        })
    </script>
    <title>Document</title>
</head>

<body>
    <main>
        <div id="orders">

        </div>
        <form id="new_order" method="post">
            <input type="text" name="order_message" placeholder="Type customer's order here">
            <input type="submit" value="Submit">
        </form>
    </main>

</body>

</html>