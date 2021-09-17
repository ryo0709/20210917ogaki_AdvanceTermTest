<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'postcode', 'email', 'gender', 'address', 'building_name', 'opinion'];

    public static $rules = array(
        'fullname' => 'required',
        'postcode' => 'required|char(8)',
        'email' => 'required|email',
        'gender' => 'tinyint',
        'address' => 'required',
        'building_name' => 'varchar',
        'opinion' => 'required',
    );
}
