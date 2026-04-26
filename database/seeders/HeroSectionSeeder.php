<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'badge_text'          => 'Women Exploring Bangladesh & Beyond',
                'title'               => 'Explore Fearlessly.',
                'subtitle'            => 'Thrive Together.',
                'description'         => 'A comprehensive women\'s platform redefining safety, growth, and opportunity in Bangladesh — from travel to training and secure living. By women, for women.',
                'primary_btn_text'    => 'Explore Services',
                'primary_btn_url'     => '#offer',
                'secondary_btn_text'  => 'Book Now',
                'secondary_btn_url'   => '#book',
                'banner_image'        => 'hero/8SYepx7pFDWhVXLQZvDRpZYoy8Xbi880bJ3HkEdJ.png',
                'stat_1_value'        => '4,800+',
                'stat_1_label'        => 'Women Served',
                'stat_2_value'        => '42+',
                'stat_2_label'        => 'Destinations',
                'stat_3_value'        => '14+',
                'stat_3_label'        => 'Skill Programs',
                'status'              => 'active',
            ]
        );
    }
}
