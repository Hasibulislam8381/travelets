<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            /*
            |--------------------------------------------------------------------------
            | Women's Journey
            |--------------------------------------------------------------------------
            */
            [
                'title'             => 'Sundarban Mangrove Safari',
                'category'          => 'Womens Journey',
                'tour_type'         => 'bangladesh',
                'price'             => 4500,
                'location'          => 'Khulna, Bangladesh',
                'badge'             => 'Featured',
                'short_description' => 'Explore the world\'s largest mangrove forest in a safe, guided, women-only environment.',
                'description'       => 'A comprehensive journey through the Sundarbans with expert local guides. Experience the rich biodiversity, Royal Bengal Tigers, and the serene beauty of the mangrove ecosystem. This journey liberates adventurous bound connections, and personal growth designed not only to build confidence but to equip explorers for months of gazing Bangladesh\'s forests, wetlands, wildlife and communities.',
                'meta'              => [
                    'duration'   => '3 Days / 2 Nights',
                    'group_size' => 'Max 12 Women',
                    'includes'   => [
                        'Transport Included',
                        'All Meals Included',
                        'Expert Local Guide',
                        'Hotel Accommodation',
                        'Boat Safari',
                        'Entry Fees',
                    ],
                    'excludes'   => [
                        'Personal expenses',
                        'Optional tours',
                        'Tips and gratuities',
                        'Travel insurance',
                    ],
                    'itinerary'  => [
                        'Fly to Jessore, travel to Mongla, check-in at hotel, evening river walk and local market visit.',
                        'Early morning boat safari into the Sundarbans, wildlife spotting including deer and crocodiles, afternoon forest trek.',
                        'Visit Katka beach and watch sunrise, explore Jamtola beach, return journey to Dhaka.',
                    ],
                ],
            ],

            [
                'title'             => 'Cox\'s Bazar Beach Retreat',
                'category'          => 'Womens Journey',
                'tour_type'         => 'bangladesh',
                'price'             => 5200,
                'location'          => 'Cox\'s Bazar, Bangladesh',
                'badge'             => 'Popular',
                'short_description' => 'Relax at the world\'s longest natural sea beach with a safe women-only group.',
                'description'       => 'A rejuvenating beach retreat at Cox\'s Bazar designed exclusively for women. Enjoy sunrise walks, fresh local seafood, cultural exploration, and the calming sound of the Bay of Bengal. A perfect escape to recharge and connect with like-minded women.',
                'meta'              => [
                    'duration'   => '3 Days / 2 Nights',
                    'group_size' => 'Max 15 Women',
                    'includes'   => [
                        'Hotel Stay (Sea View)',
                        'Breakfast & Dinner',
                        'AC Transport',
                        'Local Guide',
                        'Beach Activities',
                    ],
                    'excludes'   => [
                        'Flights from Dhaka',
                        'Personal shopping',
                        'Optional water sports',
                        'Lunch',
                    ],
                    'itinerary'  => [
                        'Depart Dhaka by bus, arrive Cox\'s Bazar, check-in at sea-view hotel, evening beach walk and sunset viewing.',
                        'Full day beach exploration, Himchhari waterfall visit, Inani beach, local seafood dinner.',
                        'Morning beach yoga session, local market visit for souvenirs, return journey to Dhaka.',
                    ],
                ],
            ],

            [
                'title'             => 'Sajek Valley Hill Trek',
                'category'          => 'Womens Journey',
                'tour_type'         => 'adventure',
                'price'             => 3800,
                'location'          => 'Rangamati, Bangladesh',
                'badge'             => 'Adventure',
                'short_description' => 'Trek through the stunning Sajek Valley and experience indigenous culture.',
                'description'       => 'A breathtaking journey to the cloud kingdom of Bangladesh. Trek through lush green hills, watch clouds roll beneath your feet, and immerse yourself in the vibrant culture of indigenous communities. A truly transformative experience for the adventurous woman.',
                'meta'              => [
                    'duration'   => '2 Days / 1 Night',
                    'group_size' => 'Max 10 Women',
                    'includes'   => [
                        'Accommodation at Sajek',
                        'All Meals',
                        'Experienced Guide',
                        'Transport from Khagrachhari',
                        'Cultural Program',
                    ],
                    'excludes'   => [
                        'Personal trekking gear',
                        'Travel insurance',
                        'Tips for local guides',
                        'Transport to Khagrachhari',
                    ],
                    'itinerary'  => [
                        'Early morning departure from Dhaka, arrive Khagrachhari, jeep ride to Sajek, check-in at resort, sunset at Ruilui Para.',
                        'Wake up for magical sunrise at Konglak Para, cultural program with indigenous community, return journey to Dhaka.',
                    ],
                ],
            ],

            [
                'title'             => 'Nepal Himalaya Expedition',
                'category'          => 'Womens Journey',
                'tour_type'         => 'abroad',
                'price'             => 35000,
                'location'          => 'Kathmandu, Nepal',
                'badge'             => 'Featured',
                'short_description' => 'Experience the majestic Himalayas with a guided women-only international tour.',
                'description'       => 'A spiritual and adventurous journey to the land of the Himalayas. Visit ancient temples, trek through Himalayan foothills, taste authentic Nepali cuisine, and experience the warm hospitality of the Nepali people. A life-changing journey for the bold and curious woman.',
                'meta'              => [
                    'duration'   => '7 Days / 6 Nights',
                    'group_size' => 'Max 10 Women',
                    'includes'   => [
                        'Return Flights',
                        'Hotel Stay (4-star)',
                        'All Meals',
                        'Expert Guide',
                        'Visa Assistance',
                        'Airport Transfers',
                        'All Entry Fees',
                    ],
                    'excludes'   => [
                        'Travel insurance',
                        'Personal shopping',
                        'Tips and gratuities',
                        'Optional activities',
                    ],
                    'itinerary'  => [
                        'Fly to Kathmandu, check-in at hotel, visit Pashupatinath Temple and Boudhanath Stupa.',
                        'Nagarkot sunrise tour, explore Bhaktapur Durbar Square and Patan.',
                        'Drive to Pokhara (200km), Phewa Lake boat ride, Devi\'s Fall visit.',
                        'Sarangkot sunrise trek, Annapurna viewpoint, Tibetan refugee market.',
                        'Chitwan National Park — jungle safari and elephant bathing.',
                        'Lumbini day tour — birthplace of Lord Buddha.',
                        'Return to Kathmandu, shopping at Thamel, fly back to Dhaka.',
                    ],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Skill Training
            |--------------------------------------------------------------------------
            */
            [
                'title'             => 'Cycle Training for Women',
                'category'          => 'Skill Training',
                'price'             => 4500,
                'location'          => 'Dhaka, Bangladesh',
                'badge'             => 'Popular',
                'short_description' => 'Build real-world confidence with practical cycling skills designed for women.',
                'description'       => 'Our cycling program is designed to help women feel safer, stronger, and more independent on the road. From basic balance to road navigation, our certified female instructors guide you every step of the way — no matter your starting point.',
                'meta'              => [
                    'satisfied_count' => 120,
                    'sessions'        => ['8am', '10am', '3pm', '5pm'],
                    'levels'          => ['Beginner', 'Intermediate', 'Advanced'],
                ],
            ],

            [
                'title'             => 'Car Driving Course',
                'category'          => 'Skill Training',
                'price'             => 6000,
                'location'          => 'Dhaka, Bangladesh',
                'badge'             => 'Featured',
                'short_description' => 'Learn professional car driving with certified female instructors in a safe environment.',
                'description'       => 'A comprehensive car driving course designed specifically for women. From understanding basic controls to advanced road safety techniques, our program builds your confidence behind the wheel. All sessions conducted in women-friendly, supportive environments.',
                'meta'              => [
                    'satisfied_count' => 85,
                    'sessions'        => ['9am', '11am', '2pm', '4pm'],
                    'levels'          => ['Beginner', 'Intermediate'],
                ],
            ],

            [
                'title'             => 'Women\'s Swimming Program',
                'category'          => 'Skill Training',
                'price'             => 3500,
                'location'          => 'Dhaka, Bangladesh',
                'badge'             => 'New',
                'short_description' => 'Learn swimming in a safe, women-only pool environment with certified coaches.',
                'description'       => 'Our swimming program covers basic water safety, freestyle, breaststroke, and endurance swimming. Taught by certified female coaches in a fully private, women-only pool. Whether you\'re a complete beginner or looking to improve, we have a class for you.',
                'meta'              => [
                    'satisfied_count' => 200,
                    'sessions'        => ['7am', '10am', '4pm', '6pm'],
                    'levels'          => ['Beginner', 'Intermediate', 'Advanced'],
                ],
            ],

            [
                'title'             => 'Self Defence Masterclass',
                'category'          => 'Skill Training',
                'price'             => 3000,
                'location'          => 'Dhaka, Bangladesh',
                'badge'             => 'Trend',
                'short_description' => 'Empower yourself with essential self-defence techniques for everyday situations.',
                'description'       => 'A practical self-defence course covering situational awareness, basic strikes, wrist releases, and escape techniques. Designed for all fitness levels. No prior experience needed. Our female instructors create a safe, empowering space for every participant.',
                'meta'              => [
                    'satisfied_count' => 150,
                    'sessions'        => ['8am', '11am', '5pm'],
                    'levels'          => ['Beginner', 'Intermediate', 'Advanced'],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Dormitory
            |--------------------------------------------------------------------------
            */
            [
                'title'             => 'Dhaka Women\'s Dormitory',
                'category'          => 'Dormitory',
                'price'             => 2500,
                'location'          => 'Dhanmondi, Dhaka',
                'badge'             => 'Featured',
                'short_description' => 'Safe, secure and affordable dormitory for women in the heart of Dhaka.',
                'description'       => 'A fully equipped women-only dormitory located in the safe residential area of Dhanmondi, Dhaka. With 24/7 security, CCTV monitoring, and all modern amenities, our dormitory is ideal for students, working women, and those new to the city.',
                'meta'              => [
                    'features'    => [
                        '24/7 Security — Women-only secure access with CCTV monitoring',
                        'High-Speed WiFi — Unlimited internet throughout the building',
                        'Meals Included — Breakfast and dinner served daily',
                        'Laundry Service — Weekly laundry service available',
                        'Common Room — Fully equipped lounge, TV and study area',
                        'Prayer Room — Dedicated prayer space for all residents',
                    ],
                    'price_plans' => [
                        '৳2,500 — Shared (4-bed)',
                        '৳3,500 — Shared (2-bed)',
                        '৳5,500 — Private (1-bed)',
                    ],
                    'room_types'  => ['1 bed', '2 bed', '4 bed'],
                ],
            ],

            [
                'title'             => 'Uttara Women\'s Residence',
                'category'          => 'Dormitory',
                'price'             => 3000,
                'location'          => 'Uttara, Dhaka',
                'badge'             => 'Popular',
                'short_description' => 'Modern women\'s residence near Uttara with all essential amenities.',
                'description'       => 'A comfortable and secure residence for women in Uttara, Dhaka. Close to major hospitals, universities and transport hubs. Perfect for working women and students who need a safe, convenient place to call home.',
                'meta'              => [
                    'features'    => [
                        '24/7 Security — Gated community with security personnel',
                        'Generator Backup — Uninterrupted electricity at all times',
                        'Rooftop Garden — Relaxing green space for residents',
                        'CCTV Surveillance — Complete building monitoring',
                        'Medical Support — On-call medical assistance available',
                        'Community Events — Monthly events for residents',
                    ],
                    'price_plans' => [
                        '৳3,000 — Shared (4-bed)',
                        '৳4,000 — Shared (2-bed)',
                        '৳6,000 — Private (1-bed)',
                    ],
                    'room_types'  => ['1 bed', '2 bed', '4 bed'],
                ],
            ],

            [
                'title'             => 'Mirpur Student Hostel',
                'category'          => 'Dormitory',
                'price'             => 2000,
                'location'          => 'Mirpur, Dhaka',
                'badge'             => 'New',
                'short_description' => 'Budget-friendly hostel for female students near major universities.',
                'description'       => 'An affordable and safe hostel designed specifically for female university students in Mirpur, Dhaka. Located close to major universities and public transport. Provides a supportive community environment to help students focus on their studies.',
                'meta'              => [
                    'features'    => [
                        'Study Room — Quiet dedicated study space',
                        '24/7 Security — Female security personnel on duty',
                        'Library Access — Shared library with academic resources',
                        'Affordable Meals — Subsidized meal plans available',
                        'WiFi — High-speed internet for studies',
                        'Indoor Games — Recreation room for leisure',
                    ],
                    'price_plans' => [
                        '৳2,000 — Shared (4-bed)',
                        '৳2,800 — Shared (2-bed)',
                        '৳4,500 — Private (1-bed)',
                    ],
                    'room_types'  => ['1 bed', '2 bed', '4 bed'],
                ],
            ],

            [
                'title'             => 'Banani Executive Women\'s Suite',
                'category'          => 'Dormitory',
                'price'             => 6000,
                'location'          => 'Banani, Dhaka',
                'badge'             => 'Trend',
                'short_description' => 'Premium women\'s residence with executive amenities in Banani.',
                'description'       => 'A premium women-only residence in the upscale Banani area of Dhaka. Designed for professional working women who want comfort, security, and a luxury lifestyle without compromise. Each room is furnished to the highest standard.',
                'meta'              => [
                    'features'    => [
                        'Smart Security — Biometric entry and 24/7 surveillance',
                        'Fully Furnished — Premium furniture and fittings',
                        'Gym Access — In-house fitness center for residents',
                        'Concierge Service — Dedicated support for residents',
                        'Rooftop Lounge — Exclusive rooftop for relaxation',
                        'Housekeeping — Daily room cleaning service',
                    ],
                    'price_plans' => [
                        '৳6,000 — Standard Room',
                        '৳8,000 — Deluxe Room',
                        '৳12,000 — Executive Suite',
                    ],
                    'room_types'  => ['Standard', 'Deluxe', 'Executive Suite'],
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Souvenirs
            |--------------------------------------------------------------------------
            */
            [
                'title'             => 'Nakshi Kantha Scarf',
                'category'          => 'Souvenirs',
                'price'             => 4500,
                'location'          => 'Rajshahi, Bangladesh',
                'badge'             => 'New',
                'short_description' => 'Hand-embroidered traditional Nakshi Kantha stitch on fine muslin. One-of-a-kind pattern.',
                'description'       => 'Each scarf is individually handcrafted by skilled artisan women from Rajshahi using century-old Nakshi Kantha embroidery techniques. No two pieces are alike. Made from the finest Bangladeshi muslin, this scarf is a wearable piece of heritage.',
                'meta'              => [
                    'material' => 'Fine Muslin',
                    'origin'   => 'Rajshahi, Bangladesh',
                ],
            ],

            [
                'title'             => 'Nakshi Kantha Tote Bag',
                'category'          => 'Souvenirs',
                'price'             => 3500,
                'location'          => 'Sylhet, Bangladesh',
                'badge'             => 'Trend',
                'short_description' => 'Sustainable bamboo fabric tote bag with traditional Nakshi Kantha embroidery.',
                'description'       => 'A beautiful and sustainable tote bag crafted from Sylhet bamboo fabric, hand-embroidered with traditional Nakshi Kantha patterns. Eco-friendly, stylish, and meaningful — the perfect accessory that carries a story.',
                'meta'              => [
                    'material' => 'Bamboo Fabric',
                    'origin'   => 'Sylhet, Bangladesh',
                ],
            ],

            [
                'title'             => 'Painted Clay Vase',
                'category'          => 'Souvenirs',
                'price'             => 2500,
                'location'          => 'Rajshahi, Bangladesh',
                'badge'             => 'New',
                'short_description' => 'Hand-painted traditional clay vase with intricate floral motifs.',
                'description'       => 'Crafted by local women potters using traditional techniques passed down through generations. Each vase is hand-painted with natural dyes and features unique floral and geometric motifs inspired by Bangladeshi folk art.',
                'meta'              => [
                    'material' => 'Natural Clay',
                    'origin'   => 'Rajshahi, Bangladesh',
                ],
            ],

            [
                'title'             => 'Jute Handmade Bag',
                'category'          => 'Souvenirs',
                'price'             => 1800,
                'location'          => 'Khulna, Bangladesh',
                'badge'             => 'Popular',
                'short_description' => 'Eco-friendly handmade jute bag crafted by women artisans from Khulna.',
                'description'       => 'Made from 100% natural jute by women artisans in Khulna, this bag is both stylish and sustainable. The traditional weaving pattern reflects the rich textile heritage of Bangladesh. Perfect as a shopping bag, beach bag, or everyday carry.',
                'meta'              => [
                    'material' => 'Natural Jute',
                    'origin'   => 'Khulna, Bangladesh',
                ],
            ],
        ];

        foreach ($products as $item) {

            $category = Category::where('name', $item['category'])->first();

            if (!$category) {
                continue;
            }

            Product::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'category_id'       => $category->id,
                    'title'             => $item['title'],
                    'slug'              => Str::slug($item['title']),
                    'tour_type'         => $item['tour_type'] ?? null,
                    'badge'             => $item['badge'] ?? null,
                    'location'          => $item['location'] ?? null,
                    'short_description' => $item['short_description'] ?? null,
                    'description'       => $item['description'] ?? $item['short_description'] ?? null,
                    'price'             => $item['price'],
                    'thumbnail'         => 'products/thumbnails/DZG1xlFvDWOwhTTjsz4f7WdQyRFrXLq5r9xXAOMw.jpg',
                    'gallery'           => null,
                    'meta'              => $item['meta'] ?? null,
                    'status'            => 'active',
                ]
            );
        }
    }
}
