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
                    <code>{{ Auth::user()->api_token }}</code>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
