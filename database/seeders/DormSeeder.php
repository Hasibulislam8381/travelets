<?php

namespace Database\Seeders;

use App\Models\Dorm;
use Illuminate\Database\Seeder;

class DormSeeder extends Seeder
{
    public function run(): void
    {
        Dorm::updateOrCreate(
            ['id' => 1],
            [
                // json_encode তুলে দিয়ে সরাসরি অ্যারে (Array) পাস করা হয়েছে
                'meta' => [
                    'features' => [
                        [
                            'icon'        => 'security',
                            'title'       => '24/7 Security',
                            'description' => 'Women-only secure access with CCTV monitoring',
                        ],
                        [
                            'icon'        => 'lock',
                            'title'       => 'Private Lockers',
                            'description' => 'Personal lockable storage for every resident',
                        ],
                        [
                            'icon'        => 'wifi',
                            'title'       => 'High-Speed WiFi',
                            'description' => 'Uninterrupted internet access across all floors',
                        ],
                        [
                            'icon'        => 'person',
                            'title'       => 'Community Support',
                            'description' => 'Dedicated female staff available around the clock',
                        ],
                        [
                            'icon'        => 'bed',
                            'title'       => 'Comfortable Rooms',
                            'description' => 'Clean, furnished rooms with quality bedding',
                        ],
                        [
                            'icon'        => 'chart',
                            'title'       => 'Skill Programs',
                            'description' => 'Regular workshops for career and personal growth',
                        ],
                    ],
                    'pricing' => [
                        [
                            'amount' => '2,500',
                            'label'  => '/ month — Shared (4-bed)',
                        ],
                        [
                            'amount' => '3,500',
                            'label'  => '/ month — Shared (2-bed)',
                        ],
                        [
                            'amount' => '5,500',
                            'label'  => '/ month — Private (1-bed)',
                        ],
                    ],
                    'room_types' => [
                        '1 bed',
                        '2 bed shared',
                        '4 bed shared',
                    ],
                ],
            ]
        );
    }
}
