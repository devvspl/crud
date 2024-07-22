<h1>Users Page </h1>

@foreach($users as $user => $u)
<h3>{{ $loop->iteration }} Name: {{ $u['name'] }}</h3>
<h3>Email: {{ $u['email'] }}</h3>
<h3>Created: {{ $u['created_at'] }}</h3>
<a href="{{ route('view.user', $user) }}">Show</a>
<hr>
@endforeach
