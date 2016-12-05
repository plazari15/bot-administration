<?php

namespace App\Http\Controllers;

use App\Events\approvePhrases;
use App\Events\NewPhraseEvent;
use App\Events\NovaFraseVisualizada;
use App\Http\Requests\SendPhrase;
use App\Phrases;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhrasesController extends Controller
{
    public function GetPhrase(){
        $phrase = Phrases::inRandomOrder()->where('status', '1')->first();
        $count = Phrases::find($phrase->id);
        $conta = $count->visualizado + 1;
        $count-> visualizado = $conta;
        $count->save();

        broadcast( new NovaFraseVisualizada());
        return response()->json($phrase);
    }

    public function GetAllPhrase(){
        $phrase = Phrases::where('status', 0)->with(['user'])->get();

        return response($phrase);
    }

    public function GetAllPhraseApproved(){
        $phrase = Phrases::where('status', 1)->with(['user'])->get();

        return response($phrase);
    }

    public function SendPhrases(){
        return view('SendPhrase');
    }

    public function StorePhrases(SendPhrase $request){

       $phrase = Phrases::create($request->all());

        broadcast(new NewPhraseEvent($phrase));
        return back();
    }

    public function ListWaitAprovation(){
        $phrases = Phrases::where('status', 0)->with(['user'])->get();

        return view('Phrases', compact('phrases'));
    }

    public function DeletePhrase($id){
        Phrases::destroy($id);
    }

    public function AprovePhrase($id){
        $phrase = Phrases::find($id);

        $phrase->status = 1;

        broadcast(new approvePhrases());
        $phrase->save();
    }

    public function DisapprovePhrase($id){
        $phrase = Phrases::find($id);

        $phrase->status = 0;

        broadcast(new approvePhrases());
        $phrase->save();
    }
}
