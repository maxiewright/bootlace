<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            //Reset cached roles and Permissions
            app() [PermissionRegistrar::class]->forgetCachedPermissions();

            //Permissions

            // Users
            Permission::create(['name' => 'add users']);
            Permission::create(['name' => 'edit users']);
            Permission::create(['name' => 'delete users']);
            Permission::create(['name' => 'edit profile']);

            //articles
            Permission::create(['name' => 'edit articles']);
            Permission::create(['name' => 'write articles']);
            Permission::create(['name' => 'publish articles']);
            Permission::create(['name' => 'edit published articles']);
            Permission::create(['name' => 'deleted published articles']);

            //Comments
            Permission::create(['name' => 'view comments']);
            Permission::create(['name' => 'edit comments']);
            Permission::create(['name' => 'deleted comments']);
            Permission::create(['name' => 'Approve comments']);

            // Media
            Permission::create(['name' => 'upload media']);
            Permission::create(['name' => 'edit media']);
            Permission::create(['name' => 'delete media']);

            //Tags
            Permission::create(['name' => 'add tags']);
            Permission::create(['name' => 'edit tags']);
            Permission::create(['name' => 'delete tags']);

            //Categories
            Permission::create(['name' => 'add categories']);
            Permission::create(['name' => 'edit categories']);
            Permission::create(['name' => 'delete categories']);

            /** ********************** Roles *************************/

            //Admin
            Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

            // Editor
            Role::create(['name' => 'editor'])->givePermissionTo([
                //articles
                'edit articles', 'write articles', 'publish articles', 'edit published articles', 'deleted published articles',
                //Comments
                'view comments', 'edit comments', 'deleted comments', 'Approve comments',
                // Media
                'upload media', 'edit media', 'delete media',
                //Tags
                'add tags', 'edit tags', 'delete tags',
                //Categories
                'add categories', 'edit categories', 'delete categories',
            ]);

            // Author
            Role::create(['name' => 'author'])->givePermissionTo([
                //Posts
                'write articles', 'edit articles',
                //Comments
                'view comments',
                // Media
                'upload media', 'edit media', 'delete media',
            ]);

            // Contributor
            Role::create(['name' => 'contributor'])->givePermissionTo([
                //Posts
                'write articles', 'edit articles',
                //Comments
                'view comments',
                // Media
                'upload media', 'edit media',
            ]);

            // Subscriber
            Role::create(['name' => 'subscriber'])->givePermissionTo([
                'edit profile'
            ]);

        });
    }
}
