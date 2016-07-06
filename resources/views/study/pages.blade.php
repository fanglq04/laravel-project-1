<ul>
@foreach($users as $val)
    <li>{{ $val['name'] }}</li>
@endforeach
</ul>


{!! $users->links() !!}