<?php

use Illuminate\Database\Seeder;
use App\Users\Entities\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'Jason',
            'email' => 'jekinneys@yahoo.com',
            'password' => 'aubreys1',
            'activated' => 1
        ]);
        $user->groups()->attach(1);
    }
}
