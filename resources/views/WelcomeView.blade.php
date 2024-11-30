<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Document</title>
    <style>
        /* Black baseline background */
        html {
            height: 100%;
            background-color: black;
            }
        /* Background logic */
        div {
            margin: 0;
            padding: 0;
            background-image: url("{{ asset("pngtree-sci-fi-technology-grid-rays-background-picture-image_2207344.jpg") }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            }
        /* Black baseline background */
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #000000;
            z-index: 1;
            opacity: 0.13;
            }
        header {
            color: white;
            text-align: center;
            padding: 20px;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            position: absolute;
            z-index: 2;
            font-size: 50px;
            }
        /* Header hover logic */
        header:hover {
            color: #00bfff;
            transform: translateX(-50%) translateY(-5px);
            }

        /* Button logic */
        .toggle-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            z-index: 3;
            }
        .toggle-button:hover {
            background-color: rgba(0, 0, 0, 0.7);
            }

        /* Rediect to logistical page button styling */
        .logistic-redirect {
            padding: 20px 40px;
            background-color: #4caf50;
            color: white;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: transform 0.3s ease;
            z-index: 3;
            text-decoration: none;
            display: inline-block;
            outline: none;
            }
        /* Center button hovering */
        .logistic-redirect:hover .logistic-redirect:focus .logistic-redirect:active {
            transform: translate(-50%, -50%) translateY(-10px);
            text-decoration: none;
            color: white;
            outline: none;
            }
    </style>
</head>
<body>

<script>
    /* Dark mode javascript deployment function */
    let dark_mode_activation = 0
    function dark_mode() {
        if (dark_mode_activation === 0){
            dark_mode_activation = 1
            alert("Dark mode active")
        } else {
            dark_mode_activation = 0
            alert("Dark mode deactivated")
        }
    }
</script>

<div>
    <!-- Overlay integration point -->
    <div class="overlay"></div>
    <!-- Header integration -->
    <header>
        Finance blog
    </header>
    <!-- Nanobots cloaking controller -->
    <button>Nanobot cloaking</button>
    <!-- Integration of button -->
    <button class="toggle-button" onclick="dark_mode()">Dark mode activation</button>
    <!-- Redirect to logistical routing page -->
    <a href="{{ route('checkpoint') }}" class="logistic-redirect">
        Enter
    </a>
</div>

</body>
</html>
