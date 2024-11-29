<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post editor mode</title>
</head>
    <!-- Styling section -->
    <style>
        /* Background logic */
        div {
            margin: 0;
            padding: 0;
            background-image: url("{{ asset("black-geometric-shape-background-design-free-vector.jpg") }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            }
        /* Header styling */
        header {
            text-align: center;
            color: white;
            padding: 20px;
            font-size: 2rem;
            background-color: rgb(0,0,0,0.7);
            }
        .crud-containment {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            margin: 20px auto;
            max-width: 80%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
        .crud-form {
            margin-bottom: 20px;
            }
        .crud-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            }
        .crud-form input, .crud-form textarea, .crud-form button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            }
        .crud-form button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            }
        .crud-form button:hover {
            background-color: #0056b3;
            }
    </style>

    <body>
    <form action="{{ route('blog.storeOrUpdate') }}" method="POST">
        @csrf
        @if(isset($blog_post))
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ $blog_post->id ?? '' }}">
        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" value="{{ $blog_post->title ?? '' }}" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $blog_post->content ?? '' }}</textarea>
        <br>
        <label for="date">Date and Time:</label>
        <input type="datetime-local" id="date" name="date"
               value="{{ isset($blog_post->date) ? $blog_post->date->format('Y-m-d\TH:i') : '' }}" required>
        <br>
        <button type="submit">Update Post</button>
    </form>

    </body>
</html>

