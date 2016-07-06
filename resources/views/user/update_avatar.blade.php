{!! Form::open(array('url' => 'users/profile/update/avatar/set', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}}
{!! Form::label('AVATAR') !!}
{!! Form::file('avatar') !!}
{!! Form::submit('submit') !!}
{!! Form::close() !!}