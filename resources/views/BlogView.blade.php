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
            margin: 20px;}
        h1 {color: #333;}
        /* Javascript styling section */
        .blog-post {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;}
        .blog-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;}
        .blog-content {color: #555;}
        .blog-meta {
            font-size: 0.9em;
            color: #777;}
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
            cursor: pointer;}
        .status-button:hover {background-color: #0056b3;}
    </style>
</head>
<body>
<!-- New post -->
<button onclick="window.location.href='{{ route('blog.create') }}';" style="padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
    Add new post
</button>

<!-- Logout button -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="status-button" id="status-button">
        Logout
    </button>
</form>

<h1>Financial Blog</h1>
<div id="bank-container"></div>
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
    // Real DB data
    const real_bank_db_data = @json($bank_data);
    const real_blogs = @json($posts_data);
    // Simulated data
    let bank_db_data = [
        { bank_name: "Global Trust Bank", headquarters: "New York, USA", number_of_branches: 601, countries_with_branches: 7 },
        { bank_name: "Pinnacle Finance Group", headquarters: "London, UK", number_of_branches: 701, countries_with_branches: 9 },
        { bank_name: "Unity Banking Corporation", headquarters: "Sydney, Australia", number_of_branches: 665, countries_with_branches: 4 }];
    let blogs = [
        { title: "First Blog Post", date: "2023-11-21", content: "This is the content of the first blog post." },
        { title: "Second Blog Post", date: "2023-11-22", content: "This is the content of the second blog post." },
        { title: "Third Blog Post", date: "2023-11-23", content: "This is the content of the third blog post." }];
    // Simulation mode activation
    const sim_mode = 0
    // Real data injection system
    if (sim_mode === 0) {
        bank_db_data = real_bank_db_data
        blogs = real_blogs
        }
    // --- Bank container ---
    const bank_container = document.getElementById("bank-container");
    // -> Deployment of bank data visual <-
    if (bank_db_data.length > 0) {
        // Deployment loop
        bank_db_data.forEach(bank => {
            const bankInfo = `
                    <div class="bank-bar">
                        <span>${bank.bank_name}</span>
                        <button onclick="toggleDetails(this)" style="margin-left: auto;">Details</button>
                        <div class="bank-details" style="display: none; margin-top: 10px;">
                            <p><strong>Headquarters:</strong> ${bank.headquarters}</p>
                            <p><strong>Number of Branches:</strong> ${bank.number_of_branches}</p>
                            <p><strong>Countries with Branches:</strong> ${bank.countries_with_branches}</p>
                        </div>
                    </div>
                `;
            bank_container.innerHTML += bankInfo;
            });
    } else {
        const failsafe_message = document.createElement("p");
        failsafe_message.textContent = "No banks available at this time.";
        bank_container.appendChild(failsafe_message)
        }
    //------------------------------------------------------------------------
    // Simulated blog data.

    // Posts render system
    const blog_containment = document.getElementById("blog-container");
    if (blogs.length > 0) {
        blogs.forEach(blog => {
            const blogInfo = `
                    <div class="blog-post">
                        <h2 class="blog-title">${blog.title}</h2>
                        <p class="blog-meta">Posted on: ${blog.date}</p>
                        <p class="blog-content">${blog.content}</p>
                    </div>
                `;
            blog_containment.innerHTML += blogInfo;
            // Edit button
            const edit_button = document.createElement("button");
            edit_button.textContent = "Edit";
            edit_button.className = "edit-button";
            edit_button.style.marginTop = "10px";
            edit_button.style.cursor = "pointer";
            // Add listener
            edit_button.addEventListener("click", () => {
                const edit_url = "/blogs/${blog.id}/edit";
                window.location.href = edit_url;
                });
            // You forgot to append the button here!
            blog_containment.appendChild(edit_button);
        });
    } else {
        const noPostMessage = document.createElement("p");
        noPostMessage.textContent = "No blog posts available at this time.";
        blog_containment.appendChild(noPostMessage);
        }
</script>

</body>
</html>
