@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Frases aguardando aprovação</div>

                <div class="panel-body">
                    <div v-if="phrases.length === 0">
                        <p>Nenhuma frase aguarda sua aprovação.</p>
                    </div>

                    <table class="table" v-if="phrases.length > 0">
                        <tr>
                            <td>ID</td>
                            <td>Autor</td>
                            <td>Enviada por</td>
                            <td>Frase</td>
                            <td>Visualizações</td>
                            <td>Ações</td>
                        </tr>

                            <tr v-for="phrase in phrases" v-on:excluir="phrases.splice(index, 1)">
                                <td>[[ phrase.id ]]</td>
                                <td>[[ phrase.author ]]</td>
                                <td>[[ phrase.user.name ]]</td>
                                <td>[[ phrase.phrase ]]</td>
                                <td>[[ phrase.visualizado ]]</td>
                                <td><span style="cursor: pointer" v-on:click="aprovar([[ phrase.id ]])"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span> | <span v-on:click="excluir([[ phrase.id ]])" style="cursor: pointer;"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Frases aprovadas</div>

                <div class="panel-body">
                    <div v-if="phrasesAproved.length === 0">
                        <p>Nenhuma frase aprovada</p>
                    </div>
                    <table class="table" v-if="phrasesAproved.length > 0">
                        <tr>
                            <td>ID</td>
                            <td>Autor</td>
                            <td>Enviada por</td>
                            <td>Frase</td>
                            <td>visualizações</td>
                            <td>Ações</td>
                        </tr>

                        <tr v-for="phrase in phrasesAproved">
                            <td>[[ phrase.id ]]</td>
                            <td>[[ phrase.author ]]</td>
                            <td>[[ phrase.user.name ]]</td>
                            <td>[[ phrase.phrase ]] </td>
                            <td>[[ phrase.visualizado ]] </td>
                            <td><span v-on:click="disapprove([[ phrase.id ]])" style="cursor: pointer;"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span> | <span v-on:click="excluir([[ phrase.id ]])" style="cursor: pointer;"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

