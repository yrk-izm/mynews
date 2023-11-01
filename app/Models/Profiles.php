<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
protected $guarded = array('id');

    public static $rules = array(
        '名前(name)' => 'required',
        '性別(gender)'=> 'required',
        '趣味(hobby)'=> 'required',
        '自己紹介(introduction)'=> 'required',
    );
}