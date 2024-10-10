<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class FaqContentBlocksSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/4/en/orm/data-fixtures.html
     */
    public function run(): void
    {
        $data = [
            // FAQ Item 1
            [
                'parent' => 'faq',
                'slug' => 'faq-1-question',
                'label' => 'FAQ 1 Question',
                'description' => 'Question for FAQ item 1',
                'type' => 'text',
                'value' => 'What is FlagMaster?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-1-answer',
                'label' => 'FAQ 1 Answer',
                'description' => 'Answer for FAQ item 1',
                'type' => 'html',
                'value' => '<p>FlagMaster specializes in providing a wide variety of flags, including national, corporate, school, and customized flags. We cater to both individual customers and organizations, offering high-quality products tailored to meet diverse needs.</p>',
            ],
            // FAQ Item 2
            [
                'parent' => 'faq',
                'slug' => 'faq-2-question',
                'label' => 'FAQ 2 Question',
                'description' => 'Question for FAQ item 2',
                'type' => 'text',
                'value' => 'What should I consider when choosing a flag?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-2-answer',
                'label' => 'FAQ 2 Answer',
                'description' => 'Answer for FAQ item 2',
                'type' => 'html',
                'value' => '<p>When selecting a flag, consider the following:</p>
                            <ul>
                                <li><strong>Purpose:</strong> Determine whether the flag is for display, events, or promotional use.</li>
                                <li><strong>Size:</strong> Choose the appropriate size based on where and how you plan to display it.</li>
                                <li><strong>Material:</strong> We offer flags made from durable materials suitable for both indoor and outdoor use.</li>
                                <li><strong>Design:</strong> Decide if you need a standard flag or a customized design to fit your specific needs.</li>
                            </ul>',
            ],
            // FAQ Item 3
            [
                'parent' => 'faq',
                'slug' => 'faq-3-question',
                'label' => 'FAQ 3 Question',
                'description' => 'Question for FAQ item 3',
                'type' => 'text',
                'value' => 'How can I customize a flag with FlagMaster?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-3-answer',
                'label' => 'FAQ 3 Answer',
                'description' => 'Answer for FAQ item 3',
                'type' => 'html',
                'value' => '<p>Customizing a flag with FlagMaster is easy! You can use our customization form to upload your own design or choose from our templates. If you need assistance, our support team is available to help you create the perfect flag for your needs.</p>',
            ],
            // FAQ Item 4
            [
                'parent' => 'faq',
                'slug' => 'faq-4-question',
                'label' => 'FAQ 4 Question',
                'description' => 'Question for FAQ item 4',
                'type' => 'text',
                'value' => 'Why should I buy flags from FlagMaster?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-4-answer',
                'label' => 'FAQ 4 Answer',
                'description' => 'Answer for FAQ item 4',
                'type' => 'html',
                'value' => '<p>FlagMaster offers several advantages:</p>
                            <ul>
                                <li><strong>High-Quality Materials:</strong> Our flags are made from durable fabrics that ensure longevity and vibrant colors.</li>
                                <li><strong>Customization Options:</strong> We provide extensive customization options to meet your specific requirements.</li>
                                <li><strong>Competitive Pricing:</strong> We offer quality products at competitive prices, ensuring great value for your investment.</li>
                                <li><strong>Excellent Customer Service:</strong> Our dedicated support team is here to assist you every step of the way.</li>
                            </ul>',
            ],
            // FAQ Item 5
            [
                'parent' => 'faq',
                'slug' => 'faq-5-question',
                'label' => 'FAQ 5 Question',
                'description' => 'Question for FAQ item 5',
                'type' => 'text',
                'value' => 'Do you offer a money-back guarantee?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-5-answer',
                'label' => 'FAQ 5 Answer',
                'description' => 'Answer for FAQ item 5',
                'type' => 'html',
                'value' => '<p>Yes, we stand by the quality of our products. If you are not completely satisfied with your purchase, please contact our <a href="/contact">customer support</a> within 30 days for a refund or exchange, provided the flag is in its original condition and packaging.</p>',
            ],
            // FAQ Item 6
            [
                'parent' => 'faq',
                'slug' => 'faq-6-question',
                'label' => 'FAQ 6 Question',
                'description' => 'Question for FAQ item 6',
                'type' => 'text',
                'value' => 'Can I track my order?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-6-answer',
                'label' => 'FAQ 6 Answer',
                'description' => 'Answer for FAQ item 6',
                'type' => 'html',
                'value' => '<p>Absolutely! Once your order is shipped, you will receive a tracking number via email. You can use this number to monitor the status of your delivery on our website.</p>',
            ],
            // FAQ Item 7
            [
                'parent' => 'faq',
                'slug' => 'faq-7-question',
                'label' => 'FAQ 7 Question',
                'description' => 'Question for FAQ item 7',
                'type' => 'text',
                'value' => 'What payment methods do you accept?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-7-answer',
                'label' => 'FAQ 7 Answer',
                'description' => 'Answer for FAQ item 7',
                'type' => 'html',
                'value' => '<p>We accept various payment methods, including:</p>
                            <ul>
                                <li><strong>Credit/Debit Cards:</strong> Visa, MasterCard, American Express</li>
                                <li><strong>PayPal:</strong> Secure and convenient online payments</li>
                                <li><strong>Buy Now, Pay Later:</strong> Available for eligible customers through our partner services</li>
                            </ul>',
            ],
            // FAQ Item 8
            [
                'parent' => 'faq',
                'slug' => 'faq-8-question',
                'label' => 'FAQ 8 Question',
                'description' => 'Question for FAQ item 8',
                'type' => 'text',
                'value' => 'Do you ship internationally?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-8-answer',
                'label' => 'FAQ 8 Answer',
                'description' => 'Answer for FAQ item 8',
                'type' => 'html',
                'value' => '<p>Yes, we ship to many countries worldwide. Shipping costs and delivery times vary based on your location and the size of your order.</p>',
            ],
            // FAQ Item 9
            [
                'parent' => 'faq',
                'slug' => 'faq-9-question',
                'label' => 'FAQ 9 Question',
                'description' => 'Question for FAQ item 9',
                'type' => 'text',
                'value' => 'What is your return policy?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-9-answer',
                'label' => 'FAQ 9 Answer',
                'description' => 'Answer for FAQ item 9',
                'type' => 'html',
                'value' => '<p>We accept returns within 30 days of purchase for unworn and unused products in their original packaging. Customized flags are non-returnable unless there is a defect or error on our part.</p>',
            ],
            // FAQ Item 10
            [
                'parent' => 'faq',
                'slug' => 'faq-10-question',
                'label' => 'FAQ 10 Question',
                'description' => 'Question for FAQ item 10',
                'type' => 'text',
                'value' => 'How can I manage my account details?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-10-answer',
                'label' => 'FAQ 10 Answer',
                'description' => 'Answer for FAQ item 10',
                'type' => 'html',
                'value' => '<p>You can manage your account details by logging into your account and accessing the "Profile" section. Here, you can update your personal information, change your password, and view your order history.</p>',
            ],
            // FAQ Item 11
            [
                'parent' => 'faq',
                'slug' => 'faq-11-question',
                'label' => 'FAQ 11 Question',
                'description' => 'Question for FAQ item 11',
                'type' => 'text',
                'value' => 'I’m having trouble using the website. Who can help?',
            ],
            [
                'parent' => 'faq',
                'slug' => 'faq-11-answer',
                'label' => 'FAQ 11 Answer',
                'description' => 'Answer for FAQ item 11',
                'type' => 'html',
                'value' => '<p>If you encounter any technical issues, please reach out to our technical support team through the <a href="/contact">Contact Form</a> or by emailing <a href="mailto:info@flagmaster.com">info@flagmaster.com</a> . We are here to assist you promptly.</p>',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
