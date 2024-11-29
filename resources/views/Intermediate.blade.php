<div>
    <header>Login required</header>
    <body>
        <!-- Authentication components -->
        @auth
            Welcome, {{ Auth::user()->name }}
        @else
            <a href="{{ route("login") }}">Login</a>
            <a href="{{ route("register") }}">Register</a>
        @endauth
    </body>

</div>
