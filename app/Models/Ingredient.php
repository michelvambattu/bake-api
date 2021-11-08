<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ingredient extends Model 
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   
    public function test_models_can_be_instantiated()
    {
        $items = Ingredient::factory()->count(10)->create();
    
        // Use model in tests...
    }
}
