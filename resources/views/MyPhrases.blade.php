@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}, essas são todas as frases que você enviou.</div>

                <div class="panel-body">
                    <div v-if="MyPhrases.length === 0">
                        [[ MyPhrases.length ]]
                        <p>Você ainda não enviou nenhuma frase. Clique <a href="{{ url('send') }}">Aqui</a> e nos envie sua frase =D</p>
                    </div>

                    <table class="table" v-if="MyPhrases.length > 0">
                        <tr>
                            <td>ID</td>
                            <td>Autor</td>
                            <td>Enviada por</td>
                            <td>Frase</td>
                            <td>Visualizações</td>
                            {{--<td>Ações</td>--}}
                        </tr>

                            <tr v-for="phrase in MyPhrases">
                                <td>[[ phrase.id ]]</td>
                                <td>[[ phrase.author ]]</td>
                                <td>[[ phrase.user.name ]]</td>
                                <td>[[ phrase.phrase ]]</td>
                                <td>[[ phrase.visualizado ]]</td>
                                {{--<td><span v-on:click="excluir([[ phrase.id ]])" style="cursor: pointer;"><i class="fa fa-trash" aria-hidden="true"></i></span></td>--}}
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection