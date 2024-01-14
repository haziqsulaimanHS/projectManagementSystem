<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin: userLevel =0, lecturer: userLevel=3, student: userLevel=5
        $users = [
            [
                'name'=>'Manager',
                'email'=>'manager@uniten.edu.my',
                'password'=> bcrypt('manager'),
                'user_level' => 0,
            ],
            [
                'name'=>'Lead Developer',
                'email'=>'leaddeveloper@uniten.edu.my',
                'password'=> bcrypt('leaddeveloper'),
                'user_level' => 3,
            ],
            [
                'name'=>'Developer',
                'email'=>'developer@uniten.edu.my',
                'password'=> bcrypt('developer'),
                'user_level' => 5,
            ],
        ];
        // foreach item in the $users array (above), create user
        foreach ($users as $key => $user){
            User::create($user);
        }
    }
}
