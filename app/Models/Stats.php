<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Stats extends Authenticatable
{
    use HasFactory, Notifiable;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='stats';
    protected $fillable = [
        'title',
        'details',
        'sign',

    ];


    /**
     * 
     * 
     * 
     *          
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//
//    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
