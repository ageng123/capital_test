<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UserDetail::class;
    protected $primaryKey = 'user_detail_id';
    public function definition()
    {
        return [
            'no_ktp' => rand(3200000000, 32999999999),
            'no_hp' => rand(100000000000, 1999999999),
            'referral_code' => rand(111111111,9999999999)
        ];
    }
}
