<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="/css/catalog.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="path/to/logo.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Shop All</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <div class="cart">
        <a href="#"><img src="path/to/cart-icon.png" alt="Cart"></a>
    </div>
</header>

<main>
    <section class="catalog-header">
        <h1>Flags</h1>
        <p>Crafted from premium, durable materials, our flags feel great wherever and age beautifully as the years go by.</p>
    </section>

    <section class="filters">
        <h3>Storage</h3>
        <ul>
            <li><input type="checkbox" id="National"><label for="Nationals">National</label></li>
            <li><input type="checkbox" id="Events"><label for="event">Events</label></li>
            <li><input type="checkbox" id="Colours"><label for="Colour">Colour</label></li>
        </ul>
    </section>

    <section class="products">
        <div class="product">
            <img src="path/to/product1.jpg" alt="Product 1">
            <h3>Australian Flag</h3>
            <p class="price">$249</p>
            <p class="label">Bestseller</p>
        </div>
        <div class="product">
            <img src="path/to/product2.jpg" alt="Product 2">
            <h3>China Flag</h3>
            <p class="price">$189 - $229</p>
            <p class="label">Bestseller</p>
        </div>
        <div class="product">
            <img src="path/to/product3.jpg" alt="Product 3">
            <h3>American Flag</h3>
            <p class="price">$99 - $129</p>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Your Company</p>
</footer>

</body>
</html>


<style>
/* catalog.css */

body {
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
}

header {
display: flex;
justify-content: space-between;
padding: 20px;
background-color: #fff;
border-bottom: 1px solid #ddd;
}

nav ul {
list-style-type: none;
display: flex;
gap: 20px;
}

nav ul li {
display: inline;
}

nav ul li a {
text-decoration: none;
color: #333;
}

.catalog-header {
text-align: center;
padding: 50px;
background-color: #f8f8f8;
}

.filters {
float: left;
width: 20%;
padding: 20px;
background-color: #f0f0f0;
border-right: 1px solid #ddd;
}

.products {
float: right;
width: 75%;
padding: 20px;
}

.product {
display: inline-block;
width: 30%;
margin-right: 3%;
margin-bottom: 20px;
background-color: #fff;
border: 1px solid #ddd;
padding: 10px;
box-sizing: border-box;
text-align: center;
}

.product img {
width: 100%;
height: auto;
}

.product h3 {
font-size: 16px;
color: #333;
}

.product .price {
font-size: 18px;
color: #555;
}

.product .label {
font-size: 12px;
color: #f00;
margin-top: 10px;
}

footer {
clear: both;
text-align: center;
padding: 20px;
background-color: #333;
color: #fff;
position: relative;
bottom: 0;
width: 100%;
}
</style>
