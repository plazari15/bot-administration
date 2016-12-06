@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}, essas são todas as frases que você enviou.</div>

            <table-administration-my-phrases></table-administration-my-phrases>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        var nome = 'Pedro';
    </script>