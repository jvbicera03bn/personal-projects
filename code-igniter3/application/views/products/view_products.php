<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/products.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://localhost:/application/assets/products.js"></script>
    <title>All Products</title>
</head>

<body>
    <main>
        <div id="table">
        </div>
        <form id="show" method="post">
            <input id="search_input" type="text" name="search" placeholder="Search an Item">
            <select name="category" id="category">
                <option value="" selected disabled hidden>Choose here</option>
                <option value="electronics">Electronics</option>
                <option value="furniture">Furniture</option>
                <option value="outdoor">Outdoor</option>
                <option value="accessories">Accessories</option>
                <option value="art supplies">Art Supplies</option>
            </select>
        </form>
    </main>
</body>
</html>