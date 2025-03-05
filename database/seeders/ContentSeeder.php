<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $homeSections = [
                ['type' => 'text', 'content' => ['title' => 'Some Title']],
                ['type' => 'text', 'content' => ['subtitle' => 'Subtitle']],
                ['type' => 'text', 'content' => ['paragraph' => 'This is a paragraph of text']],
                ['type' => 'button', 'content' => ['text' => 'Get Started']],
                ['type' => 'video_text', 'content' => ['text' => 'Play Video']],
                ['type' => 'image', 'content' => ['src' => 'images/istockphoto-1308949444-1024x1024.jpg']],
                ['type' => 'stats', 'content' => [
                    ['title' => '3x Won Awards', 'description' => 'List of awards'],
                    ['title' => '6.5k Hires', 'description' => 'List of hires'],
                    ['title' => '80K Something', 'description' => 'Worldwide'],
                    ['title' => '6x More Things', 'description' => 'All the things'],
                ]],
            ];

            foreach ($homeSections as $homeSection) {
                Content::create([
                    'section' => 'home',
                    'type' => $homeSection['type'],
                    'content' => $homeSection['content'],
                ]);
            }
        } {
            $aboutUsSections = [
                ['type' => 'text', 'content' => ['title' => 'MORE ABOUT US']],
                ['type' => 'text', 'content' => ['heading' => 'OUR GOALS OR SOMETHING LIKE THAT']],
                ['type' => 'text', 'content' => ['subheading' => 'What has inspired us to be the way we are']],
                
                ['type' => 'list', 'content' => [
                    ['text' => 'this'],
                    ['text' => 'this thing'],
                    ['text' => 'this other thing'],
                    ['text' => 'this'],
                    ['text' => 'this thing'],
                    ['text' => 'this other thing'],
                ]],
            
                // ✅ Keeping only the founder's profile image
                ['type' => 'profile', 'content' => [
                    'name' => 'Mario Smith',
                    'role' => 'CEO & Founder',
                    'image' => 'images/istockphoto-1308949444-1024x1024.jpg'
                ]],
            
                ['type' => 'contact', 'content' => [
                    'label' => 'Call us anytime',
                    'phone' => '+123456-789'
                ]],
            
                ['type' => 'image', 'content' => [
                    'src' => 'images/istockphoto-1308949444-1024x1024.jpg',
                    'style' => 'top' 
                ]],
                ['type' => 'image', 'content' => [
                    'src' => 'images/istockphoto-1308949444-1024x1024.jpg',
                    'style' => 'bottom' 
                ]]
            ];
            
            foreach ($aboutUsSections as $aboutUsSection) {
                Content::create([
                    'section' => 'aboutus',
                    'type' => $aboutUsSection['type'],
                    'content' => $aboutUsSection['content'],
                ]);
            }
            
        } {
            $featuresSections = [
                ['type' => 'text', 'content' => ['title' => 'Features', 'description' => 'Explore our awesome features.']],

                ['type' => 'text', 'content' => [
                    'title' => 'Random Text Insert Here',
                    'subheading' => 'Random Sub Insert',
                ]],

                ['type' => 'text', 'content' => ['scroll_text' => 'More things to add text scroll']],

                ['type' => 'text', 'content' => [
                    'items_with_icons' => [
                        ['name' => 'Feature One', 'title' => 'Feature One Title', 'subheading' => 'Feature One Subheading', 'list' => [
                            ['text' => 'This'],
                            ['text' => 'This thing'],
                            ['text' => 'This other thing'],
                        ], 'scroll_text' => 'More details', 'image' => 'images/istockphoto-1308949444-1024x1024.jpg'],

                        ['name' => 'Feature Two', 'title' => 'Feature Two Title', 'subheading' => 'Feature Two Subheading', 'list' => [
                            ['text' => 'That'],
                            ['text' => 'That thing'],
                            ['text' => 'That other thing'],
                        ], 'scroll_text' => 'Even more details', 'image' => 'images/istockphoto-1308949444-1024x1024.jpg']
                    ]
                ]],

                ['type' => 'feature_boxes', 'content' => [
                    'feature_boxes' => [
                        ['title' => 'So This Volupes', 'text' => 'Text stuff added', 'icon' => 'bi-award', 'background_color' => '#fcae06', 'icon_color' => '#eeddb8'],
                        ['title' => 'So This Volupes', 'text' => 'Text stuff added', 'icon' => 'bi-patch-check', 'background_color' => '#04b8ff', 'icon_color' => '#a3c8f1'],
                        ['title' => 'So This Volupes', 'text' => 'Text stuff added', 'icon' => 'bi-sunrise', 'background_color' => '#03ff39', 'icon_color' => '#b1f1bf'],
                        ['title' => 'So This Volupes', 'text' => 'Text stuff added', 'icon' => 'bi-shield-check', 'background_color' => '#ff3030', 'icon_color' => '#fac9c9'],
                    ]
                ]],

                ['type' => 'text', 'content' => [
                    'cta_text' => 'All the things you need to do to succeed',
                    'cta_subtext' => 'This is where to take action',
                    'cta_button_text' => 'Call To Action',
                    'cta_button_style' => 'background: #62a2ec; border-color:white; border-style:solid'
                ]],

                ['type' => 'image_gallery', 'content' => [
                    'images' => [
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                        ['src' => 'images/istockphoto-1308949444-1024x1024.jpg', 'style' => 'grayscale'],
                    ]
                ]],

                ['type' => 'loader', 'content' => ['dots' => 9]],
            ];


            foreach ($featuresSections as $featureSection) {
                Content::create([
                    'section' => 'features',
                    'type' => $featureSection['type'],
                    'content' => $featureSection['content'],
                ]);
            }
        } {
            $servicesSections = [
                ['type' => 'card', 'content' => [
                    'icon' => 'bi-activity',
                    'title' => 'Activities',
                    'description' => 'List of activities',
                    'modal_id' => 'actModal',
                    'modal_title' => 'Activities Details',
                    'modal_content' => 'Detailed information about activities...'
                ]],
                ['type' => 'card', 'content' => [
                    'icon' => 'bi-diagram-3',
                    'title' => 'Organization Charts',
                    'description' => 'Org charts',
                    'modal_id' => 'orgModal',
                    'modal_title' => 'Organization Chart Details',
                    'modal_content' => 'Detailed information about organization charts...'
                ]],
                ['type' => 'card', 'content' => [
                    'icon' => 'bi-easel',
                    'title' => 'Easels',
                    'description' => 'List of easels',
                    'modal_id' => 'easelModal',
                    'modal_title' => 'Easel Details',
                    'modal_content' => 'Detailed information about easels...'
                ]],
                ['type' => 'card', 'content' => [
                    'icon' => 'bi-clipboard-data',
                    'title' => 'Data Organization',
                    'description' => 'Data charts',
                    'modal_id' => 'dataModal',
                    'modal_title' => 'Data Organization Details',
                    'modal_content' => 'Detailed information about data organization...'
                ]],
        
            ];

            foreach ($servicesSections as $servicesSection) {
                Content::create([
                    'section' => 'services',
                    'type' => $servicesSection['type'],
                    'content' => $servicesSection['content'],
                ]);
            }
        } {
            $pricingSections = [
                // Pricing Plans
                ['type' => 'pricing_plan', 'content' => json_encode([
                    'title' => 'Basic Plan',
                    'price' => '$9.9/month',
                    'description' => 'For the basic experience',
                    'features' => ['this', 'this thing', 'this other thing'],
                    'button_text' => 'Buy Now',
                    'button_color' => '#0c76f0',
                    'is_popular' => false
                ])],
                ['type' => 'pricing_plan', 'content' => json_encode([
                    'title' => 'Standard Plan',
                    'price' => '$19.9/month',
                    'description' => 'Perfect balance between price and what is needed',
                    'features' => ['this', 'this thing', 'this other thing'],
                    'button_text' => 'Buy Now',
                    'button_color' => 'white',
                    'is_popular' => true
                ])],
                ['type' => 'pricing_plan', 'content' => json_encode([
                    'title' => 'Premium Plan',
                    'price' => '$39.9/month',
                    'description' => 'For the best of the best, committing to the experience',
                    'features' => ['this', 'this thing', 'this other thing'],
                    'button_text' => 'Buy Now',
                    'button_color' => '#0c76f0',
                    'is_popular' => false
                ])],
            
                // FAQ Section
                ['type' => 'faq', 'content' => json_encode([
                    'title' => 'Have a question? Check out the FAQ',
                    'description' => 'List of asked questions',
                    'questions' => [
                        ['question' => 'WHO', 'answer' => 'YOU'],
                        ['question' => 'WHAT', 'answer' => 'An OPPORTUNITY YOU CAN’T MISS.'],
                        ['question' => 'WHERE', 'answer' => 'RIGHT HERE.'],
                        ['question' => 'HOW', 'answer' => 'Answer the call to action.'],
                    ]
                ])],
            
                // Call to Action
                ['type' => 'cta', 'content' => json_encode([
                    'message' => 'All the things you need to do to succeed',
                    'description' => 'This is where to take action',
                    'button_text' => 'Call To Action',
                    'button_color' => '#62a2ec',
                    'button_border' => 'white'
                ])],
            ];
            
            foreach ($pricingSections as $pricingSection) {
                Content::create([
                    'section' => 'pricing',
                    'type' => $pricingSection['type'],
                    'content' => $pricingSection['content'],
                ]);
            }
        } {
            $testimonialsSections = [
                [
                    'type' => 'header',
                    'content' => json_encode([
                        'title' => 'Testimonials',
                        'subtitle' => 'Don\'t just take our word, read what previous clients thought',
                        'background_color' => '#9ac0eb'
                    ])
                ],
    
                [
                    'type' => 'testimonial',
                    'content' => json_encode([
                        'quote' => 'This place is great, really helpful!',
                        'author' => 'Saul Goodman',
                        'role' => 'CEO & Founder',
                        'image' => 'images/photo-1575936123452-b67c3203c357.jpeg',
                        'rating' => 5
                    ])
                ],
                [
                    'type' => 'testimonial',
                    'content' => json_encode([
                        'quote' => 'Fantastic service and great support!',
                        'author' => 'Jane Doe',
                        'role' => 'Entrepreneur',
                        'image' => 'images/photo-1575936123452-b67c3203c357.jpeg',
                        'rating' => 5
                    ])
                ],
                [
                    'type' => 'testimonial',
                    'content' => json_encode([
                        'quote' => 'Highly recommended for anyone needing expert guidance.',
                        'author' => 'John Smith',
                        'role' => 'Business Owner',
                        'image' => 'images/photo-1575936123452-b67c3203c357.jpeg',
                        'rating' => 5
                    ])
                ],
                [
                    'type' => 'testimonial',
                    'content' => json_encode([
                        'quote' => 'Highly recommended for anyone needing expert guidance.',
                        'author' => 'Alan Smith',
                        'role' => 'Business',
                        'image' => 'images/photo-1575936123452-b67c3203c357.jpeg',
                        'rating' => 5
                    ])
                ],
    
                [
                    'type' => 'stats',
                    'content' => json_encode([
                        ['label' => 'Clients', 'value' => 232],
                        ['label' => 'Projects', 'value' => 521],
                        ['label' => 'Hours of Support', 'value' => 1453],
                        ['label' => 'Workers', 'value' => 32]
                    ])
                ]
            ];
    
            foreach ($testimonialsSections as $testimonialsSection) {
                Content::create([
                    'section' => 'testimonials',
                    'type' => $testimonialsSection['type'],
                    'content' => $testimonialsSection['content'],
                ]);
            }
        } {
            $contactSections = [
                ['type' => 'text', 'content' => ['title' => 'CONTACT US']],
                ['type' => 'text', 'content' => ['subtitle' => 'We would love to hear from you']],
                ['type' => 'contact_info', 'content' => [
                    ['label' => 'Phone', 'value' => '+123456-789'],
                    ['label' => 'Email', 'value' => 'info@example.com'],
                    ['label' => 'Address', 'value' => '123 Street, City, Country']
                ]],
            ];

            foreach ($contactSections as $contactSection) {
                Content::create([
                    'section' => 'contact',
                    'type' => $contactSection['type'],
                    'content' => $contactSection['content'],
                ]);
            }
        }
    }
}
