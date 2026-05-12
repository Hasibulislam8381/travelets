<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Womens Journey',
                'slug' => Str::slug('Womens Journey'),
                'type' => 'womens_journey',
                'description' => 'Women empowerment and journey related activities.',
            ],
            [
                'name' => 'Skill Training',
                'slug' => Str::slug('Skill Training'),
                'type' => 'skill_training',
                'description' => 'Skill development and training programs.',
            ],
            [
                'name' => 'Dormitory',
                'slug' => Str::slug('Dormitory'),
                'type' => 'dormitory',
                'description' => 'Dormitory and accommodation services.',
            ],
            [
                'name' => 'Souvenirs',
                'slug' => Str::slug('Souvenirs'),
                'type' => 'souvenirs',
                'description' => 'Choose Your Product',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
