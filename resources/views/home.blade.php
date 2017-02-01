@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Bem vindo ao sistema Administrador de Robôs!
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Api Token</div>

                <div class="panel-body">
                    Este é seu token, você deve usar ele sempre que quiser se comunicar com nossa api!
                    @if(!empty(Auth::user()->api_token))
                        <code>{{ Auth::user()->api_token }}</code>
                        @else
                    <p>Seu token pode levar até 2 minutos para ser gerado!</p>
                        @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
