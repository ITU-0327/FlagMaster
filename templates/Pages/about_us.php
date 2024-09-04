<?php
// Dynamic content array
$sections = [
    [
        'heading_small' => 'The',
        'heading_main' => 'Beginning',
        'description' => 'The story began in a modest storefront, nestled in the heart of our community, where the love for national pride and the symbolism of flags sparked something extraordinary. What started as a small venture selling custom flags and accessories soon became a cornerstone for anyone wanting to express their identity, values, and passions through the art of flag-making.',
        'image' => 'aboutUs/aboutus_1.jpg',
        'alt' => 'The Beginning',
        'reverse' => false,
    ],
    [
        'heading_small' => 'A Commitment',
        'heading_main' => 'To Craft',
        'description' => 'Our customers didn’t just see flags; they saw the embodiment of their heritage, dreams, and beliefs. This realization fueled our commitment to not just craft flags but to create symbols of meaning and quality. Every stitch, every color, and every design was chosen with care, ensuring that our products weren’t just items to be displayed, but cherished possessions that tell a story.',
        'image' => 'aboutUs/aboutus_2.jpg',
        'alt' => 'To Craft',
        'reverse' => true,
    ],
    [
        'heading_small' => 'Fast Forward',
        'heading_main' => 'Where We Are Today',
        'description' => 'Today, Flagmaster isn’t just a store; it’s a movement, a hub for those who want to fly their flags high and proud. We continue to operate with the same small-batch, artisanal approach that started it all, ensuring that every product we offer online carries the mark of quality, durability, and the personal touch that only Flagmaster can provide. Our online shop is the next chapter in a story that is still being written, one flag at a time.',
        'image' => 'aboutUs/aboutus_3.jpg',
        'alt' => 'Where We Are Today',
        'reverse' => false,
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <?php foreach ($sections as $section): ?>
        <div class="section <?= $section['reverse'] ? 'reverse' : '' ?>">
            <div class="image">
                <?= $this->Html->image($section['image'], [
                    'alt' => $section['alt'],
                    'class' => 'img-fluid',
                ]) ?>
            </div>
            <div class="text">
                <h6 class="small-heading"><?= h($section['heading_small']) ?></h6>
                <h2 class="main-heading"><?= h($section['heading_main']) ?></h2>
                <p><?= h($section['description']) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>

<style>

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 60px;
    }

    .section.reverse {
        flex-direction: row-reverse;
    }

    .text {
        width: 50%;
        padding: 20px;
    }

    .text .small-heading {
        font-size: 16px;
        letter-spacing: 1.5px;
        color: #555;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .text .main-heading {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .text p {
        font-size: 18px;
        line-height: 1.6;
    }

    .image {
        width: 50%;
        padding: 20px;
    }

    .image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .section {
            flex-direction: column;
            text-align: center;
        }

        .section.reverse {
            flex-direction: column;
        }

        .text, .image {
            width: 100%;
        }

        .image {
            margin-bottom: 20px;
        }
    }
</style>
