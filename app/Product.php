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
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class , 'product_id');
    }



    protected $hidden = array('created_at', 'updated_at');
}
