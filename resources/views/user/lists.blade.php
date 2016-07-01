@foreach($lists AS $user)
    <p>{{$user->uid}}_{{$user->phone}}</p>
@endforeach


{!! Form::open(array('url' => 'foo/bar')) !!}
{!! Form::label('email', 'E-Mail Address')!!}{!!  Form::text('username')  !!}

<?php
    echo Form::label('email', 'E-Mail Address');
    echo Form::text('username');
    echo Form::checkbox('name', 'value', true);
    echo Form::date('name', \Carbon\Carbon::now());
    echo Form::file('image');
    echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
    echo Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S');
    echo Form::submit('Click Me!');
    echo link_to('foo/bar', $title = null, $attributes = array('title' => '123', 'target' => '_blank'), $secure = null);
?>

{!! Form::close() !!}



{!! Html::style('foo/bar') !!}
{!! Html::image('foo/bar', 'img text', ['style' => 'as', 'height' => '123px', 'width' => '12px']) !!}
{!! Html::link('foo/bar') !!}
