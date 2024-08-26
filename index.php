<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlagMaster - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f9f9f9;
        }
        .header {
            background-color: white;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        .header img {
            height: 50px;
            float: left;
        }
        .nav {
            display: inline-block;
            margin: 0 20px;
        }
        .nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid transparent;
        }
        .nav a:hover, .nav a.active {
            border-bottom: 2px solid black;
        }
        .search-bar {
            float: right;
            margin-top: 10px;
        }
        .search-bar input[type="text"] {
            padding: 5px;
            font-size: 16px;
        }
        .banner {
            padding: 100px 20px;
            background-color: #eee;
        }
        .banner h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .banner .buttons a {
            text-decoration: none;
            color: black;
            background-color: white;
            padding: 15px 30px;
            margin: 0 10px;
            border: 2px solid black;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .banner .buttons a:hover {
            background-color: #ddd;
        }
        .footer {
            background-color: white;
            padding: 40px 20px;
            font-size: 14px;
            color: #555;
            border-top: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="logo.png" alt="Logo">
    <div class="nav">
        <a href="#" class="active">About</a>
        <a href="#">Shop All</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Search">
    </div>
</div>

<div class="banner">
    <h1>"Wave Quality, Fly with Pride."</h1>
    <div class="buttons">
        <a href="#">Shop Now</a>
        <a href="#">Customise</a>
    </div>
</div>

<div class="footer">
    <p>
        footer is about the company, and maybe ask client what is it, I'm not sure about it but I need to write something to looks like footer
    </p>
</div>
</body>
</html>