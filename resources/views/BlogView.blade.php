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
        /* Javascript styling section */
        .blog-post {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .blog-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
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
    function content_turnicator(content_injection, length_limit) {
        // Checks the length of the content
        if (content_injection.length > length_limit) {
            // If the length is longer it adds a turniquate
            return {
                turincated: content_injection.substring(0,length_limit) + "...",
                full: content_injection
                };
        } else {
            // If not it has a pass through effect
            return {
                turincated: content_injection,
                full: content_injection
                };
            }
        }
    // Simulation mode activation
    const sim_mode = 1
    // Simulated bank data
    const bank_db_data = [
        { bank_name: "Global Trust Bank",
            headquarters: "New York, USA",
            number_of_branches: 601,
            countries_with_branches: 7 },
        { bank_name: "Pinnacle Finance Group",
            headquarters: "London, UK",
            number_of_branches: 701,
            countries_with_branches: 9 },
        { bank_name: "Unity Banking Corporation",
            headquarters: "Sydney, Australia",
            number_of_branches: 665,
            countries_with_branches: 4 }
        ];
    // --- Bank container ---
    const bank_container = document.getElementById("bank-container");
    // -> Deployment of bank data visual <-
    if (bank_db_data.length > 0) {
        // Deployment loop
        bank_db_data.forEach(bank => {
            // Horizontal bar
            const bank_viewing_bar = document.createElement("div");
            bank_viewing_bar.className = "bank-bar";
            bank_viewing_bar.style.border = "1px solid #ccc";
            bank_viewing_bar.style.padding = "10px";
            bank_viewing_bar.style.marginBottom = "15px";
            bank_viewing_bar.style.backgroundColor = "#eef";
            bank_viewing_bar.style.display = "flex";
            bank_viewing_bar.style.alignItems = "center";
            bank_viewing_bar.style.cursor = "pointer";
            // -> Display bank name <-
            const bank_name = document.createElement("span");
            bank_name.textContent = bank.bank_name;
            bank_name.style.flex = "1";
            // -> Expandable extra details <-
            const toggle_button = document.createElement("button");
            toggle_button.textContent = "Details";
            toggle_button.style.cursor = "pointer";
            toggle_button.style.marginLeft = "px";
            // -> Details container <-
            const bank_details = document.createElement("div");
            bank_details.style.display = "none";
            bank_details.style.marginTop = "10px";
            bank_details.style.borderTop = "1px solid #ddd";
            bank_details.style.paddingTop = "10px";
            // Internal detailing HTML
            bank_details.innerHTML = `
            <p><strong>Headquarters:</strong> ${bank.headquarters}</p>
            <p><strong>Number of Branches:</strong> ${bank.number_of_branches}</p>
            <p><strong>Countries with Branches:</strong> ${bank.countries_with_branches}</p>
            `;
            // Button toggle to show or hide details
            toggle_button.addEventListener("click", () =>{
                if (bank_details.style.display === "none") {
                    bank_details.style.display = "block";
                    toggle_button.textContent = "Collapse";
                } else {
                    bank_details.style.display = "none";
                    toggle_button.textContent = "Details";
                    }
                })
            // Append elements
            bank_viewing_bar.appendChild(bank_name);
            bank_viewing_bar.appendChild(toggle_button);
            bank_container.appendChild(bank_viewing_bar);
            bank_container.appendChild(bank_details);
        });
    } else {
        const failsafe_message = document.createElement("p");
        failsafe_message.textContent = "No banks available at this time.";
        bank_container.appendChild(failsafe_message)
        }
    //------------------------------------------------------------------------
    // Simulated blog data.
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
                //Blog post components elements: Sequence => Post, title, content
                //Post
                const blog_post = document.createElement("div");
                blog_post.className = "blog-post";
                blog_post.style.border = "1px soliid #ddd";
                blog_post.style.padding = "15px";
                blog_post.style.marginBottom = "20px";
                blog_post.style.borderRadius = "5px";
                blog_post.style.backgroundColor = "#f9f9f9";
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
