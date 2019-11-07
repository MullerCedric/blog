<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cédric',
            'email' => 'cedric.muller@student.hepl.be',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Dominique',
            'email' => 'dominique.vilain@hepl.be',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Myriam',
            'email' => 'myriam.dupont@hepl.be',
            'password' => Hash::make('password')
        ]);
    }
}
