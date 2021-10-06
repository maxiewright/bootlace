<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Draft',
                'slug' => 'draft',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name' => 'Pending',
                'slug' => 'pending',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name' => 'Published',
                'slug' => 'published',
                'description' => null,
                'created_at' => now()
            ],
            [
                'name' => 'Future',
                'slug' => 'future',
                'description' => null,
                'created_at' => now()
            ],
        ];

        Status::insert($statuses);
    }
}
