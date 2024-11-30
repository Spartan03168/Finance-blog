<div>
    <header>Login page</header>
    <body>
    <!-- Authentication components -->
    @auth
        Welcome, {{ Auth::user()->name }}
    @else
        <!-- Login form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <!-- Button to submit -->
            <button type="submit">Login</button>
        </form>

        <a href="{{ route("register") }}">Register</a>
    @endauth
    <a href="{{ route("blog.index") }}">View blog</a>
    </body>
</div>
