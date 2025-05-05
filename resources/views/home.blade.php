<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INSOMNIC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <div class="stars">
      <span
        style="
          top: 10%;
          left: 20%;
          width: 5px;
          height: 5px;
          animation-duration: 4s;
        "
      ></span>
      <span
        style="
          top: 30%;
          left: 80%;
          width: 6px;
          height: 6px;
          animation-duration: 5s;
        "
      ></span>
      <span
        style="
          top: 50%;
          left: 40%;
          width: 5px;
          height: 5px;
          animation-duration: 3s;
        "
      ></span>
      <span
        style="
          top: 70%;
          left: 60%;
          width: 7px;
          height: 7px;
          animation-duration: 6s;
        "
      ></span>
      <span
        style="
          top: 20%;
          left: 70%;
          width: 5px;
          height: 5px;
          animation-duration: 5s;
        "
      ></span>
      <span
        style="
          top: 65%;
          left: 25%;
          width: 4px;
          height: 4px;
          animation-duration: 4.5s;
        "
      ></span>
      <span
        style="
          top: 80%;
          left: 50%;
          width: 6px;
          height: 6px;
          animation-duration: 3.5s;
        "
      ></span>
      <span
        style="
          top: 90%;
          left: 90%;
          width: 5px;
          height: 5px;
          animation-duration: 5.5s;
        "
      ></span>
      <span
        style="
          top: 15%;
          left: 10%;
          width: 5px;
          height: 5px;
          animation-duration: 6.5s;
        "
      ></span>
      <span
        style="
          top: 45%;
          left: 75%;
          width: 5px;
          height: 5px;
          animation-duration: 4.2s;
        "
      ></span>
      <span
        style="
          top: 33%;
          left: 15%;
          width: 6px;
          height: 6px;
          animation-duration: 4.8s;
        "
      ></span>
      <span
        style="
          top: 10%;
          left: 90%;
          width: 4px;
          height: 4px;
          animation-duration: 3.2s;
        "
      ></span>
      <span
        style="
          top: 25%;
          left: 35%;
          width: 6px;
          height: 6px;
          animation-duration: 5.8s;
        "
      ></span>
      <span
        style="
          top: 60%;
          left: 65%;
          width: 5px;
          height: 5px;
          animation-duration: 6.1s;
        "
      ></span>
      <span
        style="
          top: 75%;
          left: 10%;
          width: 5px;
          height: 5px;
          animation-duration: 5.9s;
        "
      ></span>
      <span
        style="
          top: 55%;
          left: 90%;
          width: 6px;
          height: 6px;
          animation-duration: 3.8s;
        "
      ></span>
      <span
        style="
          top: 35%;
          left: 60%;
          width: 5px;
          height: 5px;
          animation-duration: 4.4s;
        "
      ></span>
      <span
        style="
          top: 40%;
          left: 45%;
          width: 5px;
          height: 5px;
          animation-duration: 5.4s;
        "
      ></span>
      <span
        style="
          top: 85%;
          left: 80%;
          width: 6px;
          height: 6px;
          animation-duration: 3.3s;
        "
      ></span>
      <span
        style="
          top: 95%;
          left: 30%;
          width: 4px;
          height: 4px;
          animation-duration: 6s;
        "
      ></span>
    </div>

    <div class="shooting-stars">
      <div class="shooting-star-wrapper">
        <div class="shooting-star"></div>
      </div>
    </div>

    <div class="planet"></div>

    <header>
      <div class="logo">🪐 INSOMNIC</div>

      <!-- Nav hanya untuk menu utama -->
      <nav>
        <ul>
          <li><a class="active" href="#">Home</a></li>
          <li><a href="#">Edukasi</a></li>
          <li><a href="#">Statistik</a></li>
          <li><a href="#">Our Team</a></li>
        </ul>
      </nav>

      <!-- Login di luar nav -->
      <a href="#" class="login-btn">Login</a>
    </header>

    <main class="hero">
      <h1>SOLVE YOUR INSOM PROBLEM</h1>
      <a href="#" class="cta-btn">GET START</a>
    </main>

    <section class="edukasi">
      <div class="content">
        <h2>Apa Itu Insomnia?</h2>
        <p>
          Insomnia adalah gangguan tidur yang membuat seseorang sulit untuk
          tidur atau tetap tertidur, meskipun memiliki kesempatan dan kondisi
          yang mendukung untuk tidur. Hal ini dapat menyebabkan kelelahan,
          gangguan konsentrasi, dan menurunkan kualitas hidup.
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
          Bisa disebabkan oleh stres, gangguan psikologis, gaya hidup yang tidak
          sehat, penggunaan gadget sebelum tidur, dan pola tidur tidak teratur.
        </p>
        <img
          src="https://www.svgrepo.com/show/420930/planet.svg"
          alt="planet icon"
          width="80"
          style="margin-bottom: 20px"
        />
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
