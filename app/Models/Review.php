<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Review extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='reviews';
    protected $fillable = [
        'comment',
        'user_id',
    ];


    //############################  RELATIONS  ##################
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
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
