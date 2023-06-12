<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guides extends Model
{
    protected $table = 'guides';
    protected $primarykey = 'id';
    protected $fillable = ['user_name','user_id','user_email','topic','description','link'];

    use HasFactory;
}
