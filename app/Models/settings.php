<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $table='setting';
    public $timestamps=false;
    public function scopeSelection($query){
        return $query->select( 'id','content', 'company_name','address','whatsapp','email','tw', 'linkedin','fb','phone','image');
    }
}
