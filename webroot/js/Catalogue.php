<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
        /* catalog.css */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .logo img {
            height: 40px;
        }

        .main-nav {
            flex: 1;
            text-align: center;
        }

        .main-nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline-block;
        }

        .main-nav ul li {
            display: inline;
            margin: 0 15px;
        }

        .main-nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        .cart img {
            height: 40px;
        }

        .catalog-header {
            text-align: center;
            padding: 50px;
            background-color: #f8f8f8;
        }

        .content-container {
            display: flex;
            padding: 20px;
        }

        .filters {
            width: 20%;
            padding: 20px;
            background-color: #f0f0f0;
            border-right: 1px solid #ddd;
        }

        .filter-category {
            margin-bottom: 20px;
        }

        .filter-category label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        .filter-category select {
            width: 100%;
            padding: 5px;
            font-size: 14px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .clear-filters {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
        }

        .products-container {
            width: 80%;
            padding: 20px;
        }

        .catalog-options {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }

        .sort-by {
            display: flex;
            align-items: center;
        }

        .sort-by label {
            margin-right: 10px;
            font-size: 14px;
            color: #333;
        }

        .sort-by select {
            padding: 5px;
            font-size: 14px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .products {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            text-align: center;
            flex: 1 1 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
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
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <img src="path/to/logo.png" alt="Logo">
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Shop All</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="cart">
            <a href="#"><img src="path/to/cart-icon.png" alt="Cart"></a>
        </div>
    </div>
</header>

<main>
    <section class="catalog-header">
        <h1>Flags</h1>
        <p>Crafted from premium, durable materials, our flags feel great wherever and age beautifully as the years go by. </p>
    </section>

    <div class="content-container">
        <section class="filters">
            <h3>Filters</h3>
            <div class="filter-category">
                <label for="color">Color</label>
                <select id="color">
                    <option value="">Select Color</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                </select>
            </div>

            <div class="filter-category">
                <label for="material">Material</label>
                <select id="material">
                    <option value="">Select Material</option>
                    <option value="cotton">Cotton</option>
                    <option value="polyester">Polyester</option>
                    <option value="nylon">Nylon</option>
                </select>
            </div>

            <div class="filter-category">
                <label for="size">Size</label>
                <select id="size">
                    <option value="">Select Size</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>

            <button class="clear-filters">Clear All Filters</button>
        </section>

        <section class="products-container">
            <div class="catalog-options">
                <div class="sort-by">
                    <label for="sort">Sort by:</label>
                    <select id="sort">
                        <option value="popular">Most popular</option>
                        <option value="recent">Most recent</option>
                        <option value="priceLowToHigh">Price (low to high)</option>
                        <option value="priceHighToLow">Price (high to low)</option>
                    </select>
                </div>
            </div>

            <div class="products">
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
            </div>
        </section>
    </div>
</main>

<footer>
    <p>&copy; 2024 Your Company</p>
</footer>

</body>
</html>
