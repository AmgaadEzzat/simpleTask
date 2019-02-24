<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_price'
    ];


    public $table="products";
    public function category(){
        return $this->belongsTo(app\Category);
    }
}
