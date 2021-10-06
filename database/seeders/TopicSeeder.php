<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $topics = [
            [
              'name' => '',
              'slug' => '',
              'description' => '',
              'created_at' => now()
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'description' => '',
                'created_at' => now()
            ],
            [
                'name' => 'Operations',
                'slug' => 'ops',
                'description' => '',
                'created_at' => now()
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
                'description' => '',
                'created_at' => now()
            ],
            [
                'name' => 'Welfare',
                'slug' => 'welfare',
                'description' => '',
                'created_at' => now()
            ],
            [
                'name' => 'Humanitarian and Disaster Relief ',
                'slug' => 'HADR',
                'description' => '',
                'created_at' => now()
            ],
            [
                'name' => 'Stories and Experiences',
                'slug' => 'stories_and_experiences',
                'description' => '',
                'created_at' => now()
            ],
        ];

        Topic::insert($topics);
    }
}
