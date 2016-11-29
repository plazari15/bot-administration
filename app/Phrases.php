<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phrases extends Model
{
    use SoftDeletes;

    $fillable = ['phrase', 'Autor'];
}
