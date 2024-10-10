<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class AboutUsContentBlocksSeeder extends AbstractSeed
{
    /**
     * Run Method for About Us Page Content Blocks Seeder
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            // Section 1
            [
                'parent' => 'about-us',
                'slug' => 'section-1-heading-small',
                'label' => 'Section 1 Small Heading',
                'description' => 'Small heading for section 1',
                'type' => 'text',
                'value' => 'The',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-1-heading-main',
                'label' => 'Section 1 Main Heading',
                'description' => 'Main heading for section 1',
                'type' => 'text',
                'value' => 'Beginning',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-1-description',
                'label' => 'Section 1 Description',
                'description' => 'Description for section 1',
                'type' => 'html',
                'value' => '<p>The story began in a modest storefront, nestled in the heart of our community, where the love for national pride and the symbolism of flags sparked something extraordinary. What started as a small venture selling custom flags and accessories soon became a cornerstone for anyone wanting to express their identity, values, and passions through the art of flag-making.</p>',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-1-image',
                'label' => 'Section 1 Image',
                'description' => 'Image for section 1',
                'type' => 'image',
            ],

            // Section 2
            [
                'parent' => 'about-us',
                'slug' => 'section-2-heading-small',
                'label' => 'Section 2 Small Heading',
                'description' => 'Small heading for section 2',
                'type' => 'text',
                'value' => 'A Commitment',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-2-heading-main',
                'label' => 'Section 2 Main Heading',
                'description' => 'Main heading for section 2',
                'type' => 'text',
                'value' => 'To Craft',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-2-description',
                'label' => 'Section 2 Description',
                'description' => 'Description for section 2',
                'type' => 'html',
                'value' => '<p>Our customers didn’t just see flags; they saw the embodiment of their heritage, dreams, and beliefs. This realization fueled our commitment to not just craft flags but to create symbols of meaning and quality. Every stitch, every color, and every design was chosen with care, ensuring that our products weren’t just items to be displayed, but cherished possessions that tell a story.</p>',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-2-image',
                'label' => 'Section 2 Image',
                'description' => 'Image for section 2',
                'type' => 'image',
            ],

            // Section 3
            [
                'parent' => 'about-us',
                'slug' => 'section-3-heading-small',
                'label' => 'Section 3 Small Heading',
                'description' => 'Small heading for section 3',
                'type' => 'text',
                'value' => 'Fast Forward',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-3-heading-main',
                'label' => 'Section 3 Main Heading',
                'description' => 'Main heading for section 3',
                'type' => 'text',
                'value' => 'Where We Are Today',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-3-description',
                'label' => 'Section 3 Description',
                'description' => 'Description for section 3',
                'type' => 'html',
                'value' => '<p>Today, Flagmaster isn’t just a store; it’s a movement, a hub for those who want to fly their flags high and proud. We continue to operate with the same small-batch, artisanal approach that started it all, ensuring that every product we offer online carries the mark of quality, durability, and the personal touch that only Flagmaster can provide. Our online shop is the next chapter in a story that is still being written, one flag at a time.</p>',
            ],
            [
                'parent' => 'about-us',
                'slug' => 'section-3-image',
                'label' => 'Section 3 Image',
                'description' => 'Image for section 3',
                'type' => 'image',
            ],
        ];

        $this->table('content_blocks')->insert($data)->save();
    }
}
