<?php

namespace App\Http\Controllers;

use App\Phrases;
use Illuminate\Http\Request;

class PhrasesController extends Controller
{
    public function GetPhrase(){
        $phrase = Phrases::inRandomOrder()->where('status', '1')->first()->toJson();

        return response($phrase);
    }

    public function SendPhrases(){
        return view('sendPhrase');
    }

    public function StorePhrases(Request $request){
        if(empty($request->author)){
            $request->author = 'Autor desconhecido';
        }

        Phrases::create($request->all());

        return back();
    }

    public function ListWaitAprovation(){
        $phrases = Phrases::where('status', 0)->get();

        return view('Phrases', compact('phrases'));
    }
}
