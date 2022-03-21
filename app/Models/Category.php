<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Category extends Authenticatable
{
    use HasFactory, Notifiable;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='category';
    protected $fillable = [
        'Title',
        'link',
        'parent_id'
        
    ];
    public function getParentKeyName()
    {
        return 'parent_id';
    }
    public function getLocalKeyName()
    {
        return 'id';
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
