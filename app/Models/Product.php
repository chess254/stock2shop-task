<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    protected $hidden = [
        'id'
    ];

    // public function jobs(){
    //     return $this->hasMany(Vacancy::class);
    // }

    protected $casts = [
        'attributes' => 'object'
    ];

}
