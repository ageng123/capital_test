<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;
use App\Models\{User};

class MaxWithdraw implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $current_point = 0;
        $point_withdraw = 0;
        if(Auth::check()){
            $user = Auth::user()->load(['user_detail', 'user_point']);
            $current_point = (int)$user->user_point->point;
            $point_withdraw = (int)$value;
        }
        if($current_point < $point_withdraw && $point_withdraw == 0){
            return false;
        }
        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Point yang di withdraw melebihi batas !';
    }
}
