<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\{User, UserDetail};
class CheckUsername implements Rule
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
        $checkInEmail = User::where('email', $value)->first();
        $checkInPhone = UserDetail::where('no_hp', (int)$value)->first();
        if(empty($checkInEmail) && empty($checkInPhone)){
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
        return ':attribute Already Used !.';
    }
}
