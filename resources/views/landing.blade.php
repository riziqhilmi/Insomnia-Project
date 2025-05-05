<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INSOMNIC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Menambahkan beberapa gaya default agar lebih mudah diubah */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #0a1e34;
            color: #fff;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            color: #f3a847;
        }

        .login-btn {
            background-color: #f3a847;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url('path_to_background_image.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .hero h1 {
            font-size: 3rem;
            margin: 20px 0;
        }

        .cta-btn {
            background-color: #f3a847;
            color: black;
            padding: 10px 25px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cta-btn:hover {
            background-color: #d88c2a;
        }

        .edukasi {
            padding: 60px 20px;
            background-color: #2c3e50;
            text-align: center;
        }

        .edukasi h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .edukasi p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .edukasi ul {
            list-style: none;
            padding: 0;
        }

        .edukasi ul li {
            margin: 10px 0;
        }

        /* Floating astronauts */
        .astronaut-wrapper {
            position: absolute;
            width: 80px;
            height: 80px;
        }

        .astronaut-wrapper img {
            width: 100%;
            height: 100%;
            animation: moveAstronaut 6s linear infinite;
        }

        @keyframes moveAstronaut {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(10px, 10px);
            }

            100% {
                transform: translate(0, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Background stars -->
    <div class="stars">
        <span style="top: 10%; left: 20%; width: 5px; height: 5px; animation-duration: 4s;"></span>
        <span style="top: 30%; left: 80%; width: 6px; height: 6px; animation-duration: 5s;"></span>
        <span style="top: 50%; left: 40%; width: 5px; height: 5px; animation-duration: 3s;"></span>
        <span style="top: 70%; left: 60%; width: 7px; height: 7px; animation-duration: 6s;"></span>
        <!-- More stars here -->
    </div>

    <!-- Shooting stars -->
    <div class="shooting-stars">
        <div class="shooting-star-wrapper">
            <div class="shooting-star"></div>
        </div>
    </div>

    <!-- Planet -->
    <div class="planet"></div>

    <!-- Header & Navbar -->
    <header>
        <div class="logo">🪐 INSOMNIC</div>
        <nav>
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#">Edukasi</a></li>
                <li><a href="#">Statistik</a></li>
                <li><a href="#">Our Team</a></li>
            </ul>
        </nav>
        <a href="{{ route('login') }}" class="login-btn">Login</a>
    </header>

    <!-- Hero Section -->
    <main class="hero">
        <h1>SOLVE YOUR INSOM PROBLEM</h1>
        <a href="{{ route('login') }}" class="cta-btn">GET START</a>
    </main>

    <!-- Edukasi Section -->
    <section class="edukasi">
        <div class="content">
            <h2>Apa Itu Insomnia?</h2>
            <p>
                Insomnia adalah gangguan tidur yang membuat seseorang sulit untuk tidur atau tetap tertidur, meskipun memiliki kesempatan dan kondisi yang mendukung untuk tidur. Hal ini dapat menyebabkan kelelahan, gangguan konsentrasi, dan menurunkan kualitas hidup.
            </p>

            <h3>Gejala Umum:</h3>
            <ul>
                <li>Sulit tidur di malam hari</li>
                <li>Sering terbangun di malam hari</li>
                <li>Bangun terlalu pagi</li>
                <li>Merasa lelah di siang hari</li>
            </ul>

            <h3>Penyebab:</h3>
            <p>
                Bisa disebabkan oleh stres, gangguan psikologis, gaya hidup yang tidak sehat, penggunaan gadget sebelum tidur, dan pola tidur tidak teratur.
            </p>
            <img src="https://www.svgrepo.com/show/420930/planet.svg" alt="planet icon" width="80" style="margin-bottom: 20px" />
        </div>
    </section>

    <!-- Floating Astronauts -->
    <div class="astronaut-wrapper bubble-delay-0" style="top: 20%; left: 10%">
        <img src="{{ asset('img/astronot.png') }}" class="astronaut" />
        <div class="speech-bubble auto-bubble">
            Tidur, untuk menyambut hari esok!
        </div>
    </div>

    <div class="astronaut-wrapper bubble-delay-1" style="top: 50%; left: 80%">
        <img src="{{ asset('img/astronot.png') }}" class="astronaut" />
        <div class="speech-bubble auto-bubble">Tunggu apa lagi? ayo tidur!</div>
    </div>

    <div class="astronaut-wrapper bubble-delay-2" style="top: 70%; left: 30%">
        <img src="{{ asset('img/astronot.png') }}" class="astronaut" />
        <div class="speech-bubble auto-bubble">sungguh?</div>
    </div>

    <!-- Moon -->
    <img src="{{ asset('img/moon.png') }}" class="moon" />
</body>

</html>
