
{{--{{ $todos }}--}}

@foreach($todos as $todo)
    <p>{{ $todo->id .'.'. $todo->title }}<p>
@endforeach

<form action="/todo" method="POST">
    {{csrf_field()}}
<input type="text" placeholder="text" name="title">
<input type="submit">
</form>
