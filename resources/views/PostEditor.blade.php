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
    </style>
    <!-- Header -->
    <header>Post editor mode</header>
    <!-- Create post -->
    <div>
        <h2>Create post</h2>
        <form id="create-post-form">
            <!-- Title of post -->
            <label for="create-title">Title:</label>
            <input type="text" id="create-title" name="title" required>
            <!-- Content -->
            <label for="create-content">Content:</label>
            <textarea id="create-content" name="content" required></textarea>
            <!-- Datetime auto setting to UTC time -->
            <label for="create-date">Date:</label>
            <input type="datetime-local" name="date_and_time_of_upload"
                   value="{{ now()->setTimezone('UTC')->format('Y-m-d\TH:i') }}">
            <!-- Button -->
            <button type="button" id="create-button">Create post</button>
        </form>
    </div>

    <!-- Update post -->
    <div>
        <h2>Update post</h2>
        <form id="update-post-form">
            <label for="update-post-id">Select post:</label>
            <select id="update-post-id">
                <!-- Dynamically populated -->
            </select>
            <!-- Title modifications -->
            <label for="update-title">Title:</label>
            <!-- Update the content -->
            <label for="update-content">Content:</label>
            <textarea id="update-content" name="content"></textarea>
            <!-- Update dates -->
            <label for="update-date">Date:</label>
            <input type="datetime-local" name="date_and_time_of_upload"
                   value="{{ now()->setTimezone('UTC')->format('Y-m-d\TH:i') }}">
            <!-- Button -->
            <button type="button" id="update-button">Update post</button>
        </form>
    </div>

    <!-- Forms usage to apply CRUD -->
    <!-- Columns: Post title, Date and time of upload, Content -->
    <!-- CRUD deployment -->
    <script>
        const real_blogs = @json($posts_data);
        // Columns: Post title, Date and time of upload, Content

        // --- Populate the update from dropdown ---
        const update_Post_Select = document.getElementById("update-post-id")
        real_blogs.forEach(post => {
            const option = document.createElement('option');
            option.value = post.id;
            option.textContent = post.post_title;
            update_Post_Select.appendChild(option);
            });
        // --- Update the form fields ---
        update_Post_Select.addEventListener("change", function (){
            const select_post_id = this.value;
            const selected_posts = real_blogs.find(real_blogs => real_blogs.id == select_post_id);
            // -> Populate with selected data <-

            });

    </script>

</div>
