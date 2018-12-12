<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $fillable = [
        'user_id',
        'name',
        'description',
        'information',
        'price',
        'size',
        
    ];
    // protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
