<?php

namespace App\Http\Controllers;

use App\Phrases;
use Illuminate\Http\Request;

class PhrasesController extends Controller
{
    public function GetPhrase(){
        $phrase = Phrases::inRandomOrder()->first()->toJson();

        return response($phrase);
    }
}
