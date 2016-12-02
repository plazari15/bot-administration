<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phrases extends Model
{
    use SoftDeletes;

    protected $fillable = ['phrase', 'author'];

    public function getAuthorAttribute($value){
        if($value == ''){
            $value = 'Autor desconhecido';
        }

        return $value;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
