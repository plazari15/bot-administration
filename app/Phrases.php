<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phrases extends Model
{
    use SoftDeletes;

    protected $fillable = ['phrase', 'author', 'user_id', 'visualizado', 'sendNow', 'sponsor', 'category_id'];

    public function getAuthorAttribute($value){
        if($value == ''){
            $value = 'Autor desconhecido';
        }

        return $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
