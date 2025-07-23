<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mushaf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            background-color: #f0f0f0;
        }

        .card-body,
        .product-content,
        h3,
        div {
            font-family: 'Amiri Quran', serif;
        }

        a {
            text-decoration: none;
        }

        .product-grid {
            background-color: #f7f3f3;
            border: 1px solid #0000000F;
            padding: 10px;
            text-align: center;
            transition: all 0.3s ease 0s;
            border-radius: 20px;
        }

        .product-grid .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 13px;
        }

        .product-grid .title a {
            color: #000;
            transition: all 0.3s ease 0s;
        }

        .product-grid .title a:hover {
            color: #f26b0e;
        }

        .product-grid .price {
            color: #6d9c19;
            font-size: 17px;
            font-weight: 700;
            margin: 0 0 10px;
        }

        .product-grid .product-links li {
            display: inline-block;
            margin: 0 3px;
        }

        .product-grid .product-links li a {
            color: #111;
            background: #fff;
            font-size: 15px;
            font-weight: 500;
            line-height: 35px;
            width: auto;
            padding: 0 13px;
            border-radius: 30px;
            display: inline-block;
            transition: all 0.5s ease-out;
        }

        .product-grid:hover .product-links li a:hover {
            color: #fff;
            background-color: rgb(177, 152, 118);
        }

        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        body.dark-mode .product-grid {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }

        body.dark-mode .product-grid .title a {
            color: #ffffff;
        }

        body.dark-mode .product-grid .product-links li a {
            background-color: #333;
            color: #fff;
        }

        body.dark-mode .product-grid .product-links li a:hover {
            background-color: #555;
        }

        body.dark-mode .main-heading {
            color: #ffffff;
            border-color: #555;
        }

        body.dark-mode #darkModeToggle {
            color: #ffffff !important;
            border-color: #ffffff !important;
        }

        body:not(.dark-mode) #darkModeToggle {
            color: #212529;
            border-color: #212529;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="dark-mode-toggle mb-4 text-end">
            <button id="darkModeToggle" class="btn btn-outline-dark">🌙 Dark Mode</button>
        </div>
        <h1 class="text-center mb-5">{{ $heading }}</h1>
        {{ $slot }}
    </div>

    <script>
        const toggleButton = document.getElementById('darkModeToggle');
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            toggleButton.textContent = document.body.classList.contains('dark-mode')
                ? '☀️ Light Mode'
                : '🌙 Dark Mode';
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
