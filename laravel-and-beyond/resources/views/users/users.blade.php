<ul>
    @foreach ($users as $user)
        <li><a href="{{ route("showUser", ["id" => $user->id]) }}">{{ $user->name }}</a></li>
    @endforeach
</ul>