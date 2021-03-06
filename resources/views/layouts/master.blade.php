<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.0/examples/album/ -->
<html lang="en">
<head>
    <title>tv</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
</head>

  <body>

    <header>
       @include ('layouts.nav')
    </header>
    <div class="container">

    @if ($flash = session("message"))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
    @endif

    <hr>

    <main role="main">
        <div class="row">
            @include('layouts.sidebar')
      		@yield('content')
        </div>
    </main>
    </div>

    @include ('layouts.footer')

    </body>
</html>