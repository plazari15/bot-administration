<?php

namespace App\Http\Controllers\Api;

use App\Phrases as PhrasesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Phrases extends Controller
{
    public function GetPhrase(Request $request){
        if($request->has('category')){
            $phrase = PhrasesModel::inRandomOrder()->where('category_id', $request->category)->first();
            if(!empty($phrase->phrase)){
                $phrase->visualizado = $phrase->visualizado + 1;
                $phrase->save();
                return response()->json(['message' => $phrase->phrase, 'author' => ($phrase->author ?? 'Autor desconhecido') ], 200);
            }
            return response()->json(['message' => 'Nada encontrado', 'author' => null ], 404);
        }

        if($request->has('sponsor')){
            $phrase = PhrasesModel::where('sponsor', 1)->where('visualizado', 0)->first();
            if(!empty($phrase->phrase)){
                $phrase->visualizado = $phrase->visualizado + 1;
                $phrase->save();
                return response()->json(['message' => $phrase->phrase, 'author' => ($phrase->author ?? 'Autor desconhecido') ], 200);
            }
            return response()->json(['message' => 'Nada encontrado', 'author' => null ], 404);
        }

        if($request->has('sendNow')){
            $phrase = PhrasesModel::where('sendNow', 1)->where('visualizado', 0)->first();
            if(!empty($phrase->phrase)){
                $phrase->visualizado = $phrase->visualizado + 1;
                $phrase->save();
                return response()->json(['message' => $phrase->phrase, 'author' => ($phrase->author ?? 'Autor desconhecido') ], 200);
            }
            return response()->json(['message' => 'Nada encontrado', 'author' => null ], 404);
        }

        return response()->json(['message' => 'Nenhuma categoria foi encontrada com os parâmetros passados', 'author' => null], 404);
    }
}
