<?php

use Illuminate\Database\Seeder;
use App\Users\Entities\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'slug' => 'edit_pages',
            'name' => 'Edit Pages',
            'description' => 'Allowed to edit page content'
        ]);
        Permission::create([
            'slug' => 'comments',
            'name' => 'Comments',
            'description' => 'Can hide and un-hide Comments'
        ]);
        Permission::create([
            'slug' => 'backend',
            'name' => 'Backend',
            'description' => 'Allowed Access to the Backend'
        ]);
        Permission::create([
            'slug' => 'edit_users',
            'name' => 'Edit Users',
            'description' => 'Can edit users like ban, un-ban etc'
        ]);
    }
}
