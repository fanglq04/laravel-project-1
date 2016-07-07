@if(count($errors) > 0)
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
@endif


{!! Form::open() !!}

{!! Form::label('title') !!} {!! Form::text('title') !!}
{!! Form::label('author') !!} {!! Form::text('author') !!}
{!! Form::submit('submit') !!}
{!! Form::close() !!}