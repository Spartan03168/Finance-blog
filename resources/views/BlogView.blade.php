<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Blog</title>
    <style>
        /* Baseline styling */
        body {
            font-family: Arial, 'Times New Roman', Times, serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        /* Blog styling */
        .blog-post {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .blog-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .blog-content {
            color: #555;
        }
        .blog-meta {
            font-size: 0.9em;
            color: #777;
        }

        /* Status button styling */
        .status-button {
            position: absolute;
            top: 10px;
            right: 109px;
            background-color: #007;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .status-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<button class="status-button" id="status-button">Not logged in</button>
<h1>Financial Blog</h1>
<div id="blog-container"></div>
<!-- Javascript deployment system -->
<script>
    // Length turnicator
    function content_turnicator(content_injection, lengt_limit) {
        // Checks the length of the content
        if (content_injection.length > lengt_limit) {
            // If the length is longer it adds a turniquate
            return {
                turncated: content_injection.substring(0,lengt_limit) + "...",
                full: content_injection
                };
        } else {
            // If not it has a pasthrough effect
            return {
                turncated: content_injection,
                full: content_injection
                };
            }
        }

    // Simulated data. Prep for full overwrite. with the new database format.
    const blogs = [
        {title: 'First Blog Post',
            date: '2023-11-21',
            content: 'This is the content of the first blog post.'},
        {title: 'Second Blog Post',
            date: '2023-11-22',
            content: 'This is the content of the second blog post.'},
        {title: 'Third Blog Post',
            date: '2023-11-23',
            content: 'This is the content of the third blog post.'}
        ];
    // Posts render system
    const blog_containment = document.getElementById("blog-container");
    if (blogs.length > 0) {
        blogs.forEach(
            blog => {
                //Blog post componets elements: Seqience => Post, title, content
                //Post
                const blog_post = document.createElement("div");
                blog_post.className = "blog-post";
                // Title
                const blog_title = document.createElement("div");
                blog_title.className = 'blog-title';
                blog_title.textContent = blog.title;
                // Content
                // --> Turnicated content <--
                const {turncated, full} = content_turnicator(blog.content, 100);
                // --------------------------
                const blog_content = document.createElement("div")
                blog_content.className = "blog-content";
                blog_content.textContent =  turncated;
                // Button component
                const toggle_button = document.createElement("button");
                toggle_button.textContent = "Read more";
                toggle_button.style.cursor = "pointer";
                toggle_button.style.marginTop = "10px";
                toggle_button.addEventListener("click", () => {
                    if (blog_content.textContent === turncated){
                        blog_content.textContent = full;
                        toggle_button.textContent = "Read less";
                    } else{
                        blog_content.textContent = turncated;
                        toggle_button.textContent = "Read more";
                    }
                });

                // Meta data
                const blog_meta = document.createElement("div");
                blog_meta.className = "blog-meta";
                blog_meta.textContent = `Posted on: ${blog.date}`;

                // Append elements to post container. Sequence => Title, content, metadata
                blog_post.appendChild(blog_title);
                blog_post.appendChild(blog_content);
                if (blog.content.length > 100) blog_post.appendChild(toggle_button);
                blog_post.appendChild(blog_meta);
                // Append to container
                blog_containment.appendChild(blog_post);
            });
    } else {
        const noPostMessage = document.createElement("p");
        noPostMessage.textContent = "No blog posts availible at this time.";
        blog_containment.appendChild(noPostMessage);
    }
</script>

</body>
</html>
