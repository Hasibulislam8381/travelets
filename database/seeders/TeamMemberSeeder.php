<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Ahsan Habib',
                'role' => 'Lead Full Stack Developer',
                'department' => 'Engineering',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nusrat Jahan',
                'role' => 'UI/UX Designer',
                'department' => 'Design',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 2,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rakibul Islam',
                'role' => 'Laravel Developer',
                'department' => 'Engineering',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sultana Razia',
                'role' => 'Product Manager',
                'department' => 'Management',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 4,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asif Zubayer',
                'role' => 'DevOps Engineer',
                'department' => 'Infrastructure',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 5,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farhana Yasmin',
                'role' => 'QA Engineer',
                'department' => 'Quality Assurance',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 6,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mehedi Hasan',
                'role' => 'Frontend Developer',
                'department' => 'Engineering',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 7,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayesha Siddiqua',
                'role' => 'HR Manager',
                'department' => 'Human Resources',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 8,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tanvir Ahmed',
                'role' => 'Digital Marketer',
                'department' => 'Marketing',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 9,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Imran Khan',
                'role' => 'Support Engineer',
                'department' => 'Customer Support',
                'image' => '/team/GMtdGCwADgJl5mX41dIBlwJlyXEEf786pRdq70Hm.png',
                'order' => 10,
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('team_members')->insert($members);
    }
}
