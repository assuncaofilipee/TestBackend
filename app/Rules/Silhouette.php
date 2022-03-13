<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Silhouette implements Rule
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
    public function passes($attribute, $values)
    {
        if(strpos($values, " ") !== false) {
            $values = explode(" ", $values);

            foreach ($values as $value) {
                if (preg_match ("/[^0-9]/", $value)) {
                    return false;
                }
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Formato de silhueta inválido.';
    }
}
