<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [

            /*
            |--------------------------------------------------------------------------
            | Women's Journey
            |--------------------------------------------------------------------------
            */
            [
                'title' => 'Women Leadership Camp',
                'category' => 'Womens Journey',
                'type' => 'womens_journey',
                'tour_type' => 'bangladesh',
                'price' => 3500,
                'location' => 'Dhaka',
                'badge' => 'Featured',
                'short_description' => 'Leadership development program for women.',
                'meta' => [
                    'duration' => '3 Days',
                    'group_size' => '20 Women',
                ]
            ],

            [
                'title' => 'Women Empowerment Workshop',
                'category' => 'Womens Journey',
                'type' => 'womens_journey',
                'tour_type' => 'bangladesh',
                'price' => 2200,
                'location' => 'Khulna',
                'badge' => 'Popular',
                'short_description' => 'Empowering women through practical sessions.',
            ],

            [
                'title' => 'Self Defense Training for Women',
                'category' => 'Womens Journey',
                'type' => 'womens_journey',
                'tour_type' => 'bangladesh',
                'price' => 1800,
                'location' => 'Rajshahi',
                'badge' => 'New',
                'short_description' => 'Basic self-defense training for women safety.',
            ],

            [
                'title' => 'Women Career Development Session',
                'category' => 'Womens Journey',
                'type' => 'womens_journey',
                'tour_type' => 'abroad',
                'price' => 2600,
                'location' => 'Sylhet',
                'badge' => 'Trend',
                'short_description' => 'Career planning and professional growth.',
            ],
            /*
            |--------------------------------------------------------------------------
            | Skill Training
            |--------------------------------------------------------------------------
            */
            [
                'title' => 'Web Development Training',
                'category' => 'Skill Training',
                'type' => 'skill_training',
                'price' => 8000,
                'location' => 'Dhaka',
                'badge' => 'Featured',
                'short_description' => 'Full stack web development training.',
                'meta' => [
                    'levels' => ['Beginner', 'Intermediate'],
                    'sessions' => ['Morning', 'Evening'],
                ]
            ],

            [
                'title' => 'Graphic Design Course',
                'category' => 'Skill Training',
                'type' => 'skill_training',
                'price' => 5000,
                'location' => 'Chattogram',
                'badge' => 'Popular',
                'short_description' => 'Professional graphic design training.',
            ],

            [
                'title' => 'Digital Marketing Bootcamp',
                'category' => 'Skill Training',
                'type' => 'skill_training',
                'price' => 6500,
                'location' => 'Khulna',
                'badge' => 'Trend',
                'short_description' => 'Learn SEO, Facebook marketing and ads.',
            ],

            [
                'title' => 'Freelancing Training Program',
                'category' => 'Skill Training',
                'type' => 'skill_training',
                'price' => 7200,
                'location' => 'Dhaka',
                'badge' => 'New',
                'short_description' => 'Complete freelancing guideline for beginners.',
            ],

            /*
            |--------------------------------------------------------------------------
            | Dormitory
            |--------------------------------------------------------------------------
            */
            [
                'title' => 'Safe Women Dormitory',
                'category' => 'Dormitory',
                'type' => 'dormitory',
                'price' => 3000,
                'location' => 'Dhaka',
                'badge' => 'Featured',
                'short_description' => 'Secure and affordable women dormitory.',
                'meta' => [
                    'features' => [
                        '24/7 Security',
                        'WiFi',
                        'Laundry Service'
                    ],
                    'room_types' => [
                        '2 Bed',
                        '4 Bed'
                    ]
                ]
            ],

            [
                'title' => 'Student Girls Hostel',
                'category' => 'Dormitory',
                'type' => 'dormitory',
                'price' => 2500,
                'location' => 'Rajshahi',
                'badge' => 'Popular',
                'short_description' => 'Affordable hostel for female students.',
            ],

            [
                'title' => 'Working Women Residence',
                'category' => 'Dormitory',
                'type' => 'dormitory',
                'price' => 4500,
                'location' => 'Sylhet',
                'badge' => 'Trend',
                'short_description' => 'Comfortable living for working women.',
            ],

            [
                'title' => 'Modern Shared Dormitory',
                'category' => 'Dormitory',
                'type' => 'dormitory',
                'price' => 3500,
                'location' => 'Khulna',
                'badge' => 'New',
                'short_description' => 'Modern facilities with shared rooms.',
            ],

            /*
|--------------------------------------------------------------------------
| Souvenirs
|--------------------------------------------------------------------------
*/
            [
                'title' => 'Handmade Nakshi Kantha',
                'category' => 'Souvenirs',
                'type' => 'souvenirs',
                'price' => 2500,
                'location' => 'Rajshahi',
                'badge' => 'Featured',
                'short_description' => 'Traditional handmade Nakshi Kantha.',
                'meta' => [
                    'material' => 'Cotton',
                    'origin' => 'Rajshahi',
                ]
            ],

            [
                'title' => 'Bamboo Handicraft Basket',
                'category' => 'Souvenirs',
                'type' => 'souvenirs',
                'price' => 1200,
                'location' => 'Sylhet',
                'badge' => 'Popular',
                'short_description' => 'Eco-friendly handmade bamboo basket.',
                'meta' => [
                    'material' => 'Bamboo',
                    'origin' => 'Sylhet',
                ]
            ],

            [
                'title' => 'Jute Handmade Bag',
                'category' => 'Souvenirs',
                'type' => 'souvenirs',
                'price' => 1800,
                'location' => 'Khulna',
                'badge' => 'Trend',
                'short_description' => 'Stylish handmade jute bag.',
                'meta' => [
                    'material' => 'Jute',
                    'origin' => 'Khulna',
                ]
            ],

            [
                'title' => 'Clay Pottery Set',
                'category' => 'Souvenirs',
                'type' => 'souvenirs',
                'price' => 2200,
                'location' => 'Bogura',
                'badge' => 'New',
                'short_description' => 'Traditional clay pottery handcrafted set.',
                'meta' => [
                    'material' => 'Clay',
                    'origin' => 'Bogura',
                ]
            ],
        ];

        foreach ($products as $item) {

            $category = Category::where('name', $item['category'])->first();

            if (!$category) {
                continue;
            }

            Product::updateOrCreate(
                [
                    'slug' => Str::slug($item['title'])
                ],
                [
                    'category_id' => $category->id,
                    'title' => $item['title'],
                    'slug' => Str::slug($item['title']),
                    'type' => $item['type'],
                    'badge' => $item['badge'] ?? null,
                    'tour_type' => $item['tour_type'] ?? null,
                    'location' => $item['location'] ?? null,
                    'short_description' => $item['short_description'] ?? null,
                    'description' => $item['short_description'] ?? null,
                    'price' => $item['price'],
                    'thumbnail' => 'products/thumbnails/qrMdfSftoWwK0GpltxXfifXAgr3fWEmyDOg7AIRy.png',
                    'gallery' => null,
                    'meta' => $item['meta'] ?? null,
                    'status' => 'active',
                ]
            );
        }
    }
}
