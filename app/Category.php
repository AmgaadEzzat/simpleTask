<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public $table = "categories";
    public function products(){
        return $this->hasMany(Product::class);
    }

    protected $hidden = array('created_at', 'updated_at');
}
