<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, UserDetail, UserPoint};

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return User::factory()->count(10)->create()->each(function($user){
            $user->user_detail()->save(UserDetail::factory()->make());
            $user->user_point()->save(UserPoint::factory()->make());

        });
    }
}
