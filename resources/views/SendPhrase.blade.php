@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'send']) !!}
                        <div class="form-group">
                            {{Form::label('athor', 'Autor')}}
                            {{Form::text('author', null, ['class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('phrase', 'Frase')}}
                            {{Form::text('phrase', null, ['class' => 'form-control'])}}
                        </div>
                        {{ Form::submit('Registar frase', ['class' => 'btn btn-success']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
