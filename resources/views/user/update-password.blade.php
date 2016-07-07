@if (count($errors) > 0)
    <ul>
        @foreach( $errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

{!! Form::open() !!}

{!! Form::label('new password') !!}
{!! Form::password('newpassword') !!}
{!! Form::submit('submit') !!}
{!! Form::close() !!}