@extends ('layouts.master')

@section ('content')

    <div class="container">
        <h4>Change the data</h4>
        <form method="POST" action="{{ action('UserController@update', $user->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            @include ('layouts.errors')

        </form>
    </div>
@endsection