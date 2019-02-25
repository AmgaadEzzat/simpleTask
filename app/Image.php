<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_name'
    ];



    public function product(){
        return $this->belongsTo(Product::class );
    }

    protected $hidden = array('created_at', 'updated_at');

}
