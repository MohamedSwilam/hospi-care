<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'              => 'Mohamed Swilam',
                'email'             => 'mohamed_swilam@hotmail.com',
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
            ]
        ];

        foreach ($users as $user){
            $record = User::where('email', $user['email'])->first();
            if (!$record) {
                $temp = User::create($user);
                $temp->assignRole('Super Admin');
            }
        }
    }
}
