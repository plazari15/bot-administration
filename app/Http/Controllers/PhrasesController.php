<?php

namespace App\Http\Controllers;

use App\Phrases;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhrasesController extends Controller
{
    public function GetPhrase(){
        $phrase = Phrases::inRandomOrder()->where('status', '1')->first()->toJson();

        return response()->jsonp($phrase);
    }

    public function GetAllPhrase(){
        $phrase = Phrases::where('status', 0)->get();

        return response($phrase);
    }

    public function SendPhrases(){
        return view('SendPhrase');
    }

    public function StorePhrases(Request $request){
        if(empty($request->author)){
            $request->author = 'Autor desconhecido';
        }

        //dd($request->all());
        $user = User::find(Auth::user()->id);
        $user->phrases()->create($request->all());

        return back();
    }

    public function ListWaitAprovation(){
        $phrases = Phrases::where('status', 0)->get();

        return view('Phrases', compact('phrases'));
    }

    public function DeletePhrase($id){
        Phrases::destroy($id);
    }
}
