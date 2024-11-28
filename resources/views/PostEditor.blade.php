<div>
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

    <!-- CRUD container -->
    <div class="crud-containment">
        <h2>Edit or create blog posts</h2>
        <!-- Add/edit form -->
        <form class="crud-form" id="blog-form" method="POST" action="{{ route("blog.storeOrUpdate") }}}">
            @csrf
            <input type="hidden" id="blog-id" name="id" value="">
            <!-- Title -->
            <label for="title">Post title</label>
            <input type="text" id="title" name="title" placeholder="Enter the title" required>
            <!-- Content -->
            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Write your blog post content here." required></textarea>
            <!-- Current UTC datetime auto-selection using laravel infrastructure -->
            <label for="Datetime of post"></label>
            <input type="datetime-local" name="date_and_time_of_upload"
                   value="{{ now()->setTimezone('UTC')->format('Y-m-d\TH:i') }}">
            <!-- Submit button -->
            <button type="submit">Save post</button>
        </form>
    </div>

    <!-- Header -->
    <header>Post editor mode</header>

    <!-- Forms usage to apply CRUD -->
    <!-- Columns: Post title, Date and time of upload, Content -->
    <!-- CRUD deployment -->
    <script>
        // Database access point
        const real_blogs = @json($posts_data);
        // Editing process of existing post
        const blog_list = document.getElementById("blog-items");

    </script>

</div>
