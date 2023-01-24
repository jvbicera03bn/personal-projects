<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Gotta Catch'em All</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get("https://fakerapi.it/api/v1/images?_quantity=100&_type=kittens", function(res) {
                var kittenimg = res.data;
                var cat;
                for (var i = 0; i < kittenimg.length; i++) {
                    cat +="<h3>"+ i +"</h3><img style='width: 300px; height: 300px;' src='" + kittenimg[i]['url'] + "' alt ='" + kittenimg[i]['title'] + "'>";
                    $("#cats").html(cat);
                }
            }, "json");
        });
    </script>
</head>

<body>
    <div id="cats">
        
    </div>
</body>

</html>