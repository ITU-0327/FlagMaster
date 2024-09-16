<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class LandingPageContentBlocksSeeder extends AbstractSeed
{
    /**
     * Run Method for Landing Page Content Blocks Seeder
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'slug' => 'company-name',
                'label' => 'Company Name',
                'description' => 'Name of the company.',
                'type' => 'text',
                'value' => 'FlagMaster',
            ],
            [
                'parent' => 'global',
                'slug' => 'email',
                'label' => 'Email',
                'description' => 'Email address of the company.',
                'type' => 'text',
                'value' => 'info@flagmaster.com',
            ],
            [
                'parent' => 'global',
                'slug' => 'logo',
                'label' => 'Website Logo',
                'description' => 'Logo displayed on the website.',
                'type' => 'image',
            ],
            [
                'parent' => 'global',
                'slug' => 'preloader-logo',
                'label' => 'Preloader Logo',
                'description' => 'Logo displayed when the page is loading.',
                'type' => 'image',
            ],
            [
                'parent' => 'global',
                'slug' => 'favicon',
                'label' => 'Favicon',
                'description' => 'Favicon displayed on the website.',
                'type' => 'image',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'tagline',
                'label' => 'Tagline',
                'description' => 'Tagline above the headlines.',
                'type' => 'text',
                'value' => 'Start your flag shopping journey.',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'main-headline',
                'label' => 'Main Headline',
                'description' => 'Primary heading on the landing page.',
                'type' => 'html',
                'value' => 'Most type &
                            <span class="text-primary"> Best Quality</span>
                            Sale',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'sub-headline',
                'label' => 'Sub Headline',
                'description' => 'Secondary heading on the landing page.',
                'type' => 'text',
                'value' => 'Flagmaster is the Largest flag supplier in Australia',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'hero-image-1',
                'label' => 'Hero Image 1',
                'description' => 'First image displayed in the hero section. (needs to be a svg image)',
                'type' => 'image',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'hero-image-2',
                'label' => 'Hero Image 2',
                'description' => 'Second image displayed in the hero section. (needs to be a svg image)',
                'type' => 'image',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'styles-section-title',
                'label' => 'Styles Section Title',
                'description' => 'Title of the styles section.',
                'type' => 'text',
                'value' => 'A variety of flag designs available for selection',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'review-section-title',
                'label' => 'Review Section Title',
                'description' => 'Title of the review section.',
                'type' => 'text',
                'value' => 'Don’t just take our words for it, See what customers like you are saying',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-section-title',
                'label' => 'Key Benefits Section Title',
                'description' => 'Title of the key benefits section.',
                'type' => 'text',
                'value' => 'Why Choose Flag Master?',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-1',
                'label' => 'Key Benefit 1',
                'description' => 'First key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-paint-brush text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Customizable Flag Designs</h5>
                            <p class="mb-0 text-dark">
                                Easily customize your flags with real-time previews.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-2',
                'label' => 'Key Benefit 2',
                'description' => 'Second key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-boxes text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Bulk Orders for Institutions</h5>
                            <p class="mb-0 text-dark">
                                Streamlined bulk ordering for schools, organizations, and more.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-3',
                'label' => 'Key Benefit 3',
                'description' => 'Third key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-globe text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Global Shipping</h5>
                            <p class="mb-0 text-dark">
                                Fast and reliable worldwide shipping options.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-4',
                'label' => 'Key Benefit 4',
                'description' => 'Fourth key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-credit-card text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Secure Payment Options</h5>
                            <p class="mb-0 text-dark">
                                Multiple secure payment methods, including buy-now, pay-later.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-5',
                'label' => 'Key Benefit 5',
                'description' => 'Fifth key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-tools text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Easy Customization Tools</h5>
                            <p class="mb-0 text-dark">
                                Intuitive tools for easy flag design customization.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-6',
                'label' => 'Key Benefit 6',
                'description' => 'Sixth key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-shipping-fast text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Track Your Orders</h5>
                            <p class="mb-0 text-dark">
                                Track your orders in real-time from production to delivery.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-7',
                'label' => 'Key Benefit 7',
                'description' => 'Seventh key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-headset text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Customer Support</h5>
                            <p class="mb-0 text-dark">
                                Dedicated support to help with your custom orders and inquiries.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'key-benefits-8',
                'label' => 'Key Benefit 8',
                'description' => 'Eighth key benefit.',
                'type' => 'html',
                'value' => '<i class="fas fa-heart text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Save Favorite Designs</h5>
                            <p class="mb-0 text-dark">
                                Save your favorite flag designs for easy re-ordering.
                            </p>',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'footer-text',
                'label' => 'Footer Text',
                'description' => 'Text displayed in the footer.',
                'type' => 'text',
                'value' => 'All rights reserved by FlagMaster. Designed & Developed by',
            ],
            [
                'parent' => 'landing-page',
                'slug' => 'footer-website-link',
                'label' => 'Footer Website Link',
                'description' => 'The link used in the footer.',
                'type' => 'text',
                'value' => 'https://u24s2123.iedev.org/',
            ],
        ];

        $this->table('content_blocks')->insert($data)->save();
    }
}
