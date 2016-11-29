<form method="post" action="{{ url('send') }}">
    {{ csrf_field() }}
    <input type="text" name="phrase" placeholder="Sua Frase">
    <input type="text" name="Autor" placeholder="Autor">
    <input type="submit"></input>
</form>