<?php

namespace Database\Seeders;
use Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'address'=>'ram marg',
        'mobilenumber'=>'9828809472',
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'), // password
       ]);
       $user->assignRole('admin');
    }
}
