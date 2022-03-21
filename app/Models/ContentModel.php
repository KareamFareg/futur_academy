<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    use HasFactory;
    protected $table='content';
    public $timestamps=true;
    protected $fillable = [
        'name',
        'title',
        'titleDetails',
        'contentBody',
        'image',
    ];



}
