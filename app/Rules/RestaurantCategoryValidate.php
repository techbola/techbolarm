<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class RestaurantCategoryValidate implements Rule
{
    private $restaurantId;
    /**
     * Create a new rule instance.
     *
     * @param $restaurantId
     */
    public function __construct($restaurantId)
    {
        $this->restaurantId = $restaurantId;
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

        if (Category::where('name', $value)->where('restaurant_id', $this->restaurantId)->first()){
            return true;
        }

        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This category for this restaurant does not exist.';
    }
}
