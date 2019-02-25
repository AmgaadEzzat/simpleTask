<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_name'
    ];

    protected $appends = ['product_id'];

    public function product(){
        return $this->belongsTo(Product::class ,'product_id');
    }

    protected $hidden = array('created_at', 'updated_at');

}
