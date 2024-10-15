<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primarykey = 'id';
    protected $fillable = [ 'name', 'age', 'gender', 'address', 'mobile', 'year_level', 'course', 'section',];
}   