<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           RolesAndPermissionsSeeder::class,
           StatusSeeder::class,
           TagSeeder::class,
           TopicSeeder::class,
        ]);
    }
}
