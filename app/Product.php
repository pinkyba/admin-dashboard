<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // With product factory (faker)
    //protected $guarded = [];


    protected $fillable = ['name', 'sku', 'description', 'price', 'quantity', 'sales'];
}
