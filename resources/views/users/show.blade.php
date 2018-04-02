@extends ('layouts.master')

@section ('content')

    <div class="col-sm-8 blog-main">
        <h2>Profile</h2>
        <h4>Hi, {{ $user->name }}</h4>
        <img src="{{ url($user->avatar) }}" width="200"><br>
        <a href="{{ action('UsersController@edit', $user->id) }}"><button class="btn">Edit</button></a>
    </div>

@endsection