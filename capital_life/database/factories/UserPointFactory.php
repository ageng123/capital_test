<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPoint>
 */
class UserPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UserPoint::class;
    public function definition()
    {
        $date = new \DateTime();
        $date->modify('+'.rand(0,30).'days');
        return [
            //
            'point' => rand(0, 9999999999),
            'expired' => $date->format('Y-m-d H:i:s')
        ];
    }
}
