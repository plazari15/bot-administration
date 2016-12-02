@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Frases aguardando aprovação</div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Autor</td>
                            <td>Frase</td>
                            <td>Ações</td>
                        </tr>

                            <tr v-for="phrase in phrases" v-on:excluir="phrases.splice(index, 1)">
                                <td>[[ phrase.id ]]</td>
                                <td>[[ phrase.author ]]</td>
                                <td>[[ phrase.phrase ]]</td>
                                <td><span v-on:click="excluir([[ phrase.id ]])" style="cursor: pointer;">Excluir</span> | Aprovar</td>
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
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Autor</td>
                            <td>Frase</td>
                            <td>Ações</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Reprovar</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection