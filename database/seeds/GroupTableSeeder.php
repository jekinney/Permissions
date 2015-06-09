<?php

use Illuminate\Database\Seeder;
use App\Users\Entities\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'slug' => 'member',
            'name' => 'Member',
            'description' => 'An activated Member'
        ]);
        Group::create([
            'slug' => 'moderator',
            'name' => 'Moderator',
            'description' => 'A Moderator with some permissions'
        ]);
        Group::create([
            'slug' => 'site_admin',
            'name' => 'Site Admin',
            'description' => 'A Site Admin with more permissions'
        ]);
        Group::create([
            'slug' => 'admin',
            'name' => 'Admin',
            'description' => 'A full Admin with most Permissions'
        ]);
        Group::create([
            'slug' => 'owner',
            'name' => 'Owner',
            'description' => 'Site Owner will full permissions'
        ]);
    }
}
