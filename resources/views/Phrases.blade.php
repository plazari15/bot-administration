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

                        @foreach($phrases as $phrase)
                            <tr>
                                <td>{{ $phrase->id }}</td>
                                <td>{{ $phrase->author }}</td>
                                <td>{{ $phrase->phrase }}</td>
                                <td><span v-on:click="excluir({{$phrase->id}})">Excluir</span> | Aprovar</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                {{--<!-- let people make clients -->--}}
                {{--<passport-clients></passport-clients>--}}

                {{--<!-- list of clients people have authorized to access our account -->--}}
                {{--<passport-authorized-clients></passport-authorized-clients>--}}

                {{--<!-- make it simple to generate a token right in the UI to play with -->--}}
                {{--<passport-personal-access-tokens></passport-personal-access-tokens>--}}

            </div>
        </div>
    </div>
</div>
@endsection
