<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovidReport extends Model
{
    protected $table = 'reports';
    protected $primarykey = 'id';
    protected $fillable = ['new_cases','active_cases','total_cases','deaths','recovered','sum_of_patients_in_hospitals'];

    use HasFactory;
}
