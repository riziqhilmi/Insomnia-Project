<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - Insomnic</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Outfit', sans-serif;
    }

    body {
      background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
      height: 100vh;
      overflow: hidden;
      position: relative;
      color: white;
    }

    .moon-cloud {
      position: absolute;
      background: rgba(255, 255, 255, 0.04);
      border-radius: 50%;
      filter: blur(12px);
      z-index: 2;
      animation: floatCloud 40s ease-in-out infinite;
    }

    .moon-cloud1 {
      top: 80px;
      right: 80px;
      width: 160px;
      height: 60px;
      animation-delay: 0s;
    }

    .moon-cloud2 {
      top: 120px;
      right: 130px;
      width: 120px;
      height: 50px;
      animation-delay: 8s;
    }

    @keyframes floatCloud {
      0%, 100% {
        transform: translateX(0px);
      }
      50% {
        transform: translateX(20px);
      }
    }

    .stars {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .star {
      position: absolute;
      background: white;
      border-radius: 50%;
      opacity: 0.8;
      animation: twinkle 2s infinite alternate;
    }

    @keyframes twinkle {
      0% { opacity: 0.2; transform: scale(0.8); }
      100% { opacity: 1; transform: scale(1.3); }
    }

    .moon {
      position: absolute;
      top: 60px;
      right: 100px;
      width: 100px;
      height: 100px;
      background: #f5f3ce;
      border-radius: 50%;
      box-shadow: 0 0 40px #fffacd;
      z-index: 1;
    }

    .cloud {
      position: absolute;
      top: 90px;
      right: -300px;
      width: 300px;
      height: 80px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 100px;
      filter: blur(12px);
      box-shadow:
        60px 0 rgba(255, 255, 255, 0.05),
        120px 0 rgba(255, 255, 255, 0.05),
        180px 0 rgba(255, 255, 255, 0.05);
      animation: moveCloud 60s linear infinite;
      z-index: 1;
    }

    @keyframes moveCloud {
      0% { right: -300px; }
      100% { right: 120%; }
    }

    .login-container {
      position: relative;
      z-index: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: rgba(10, 10, 25, 0.85);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(138, 180, 255, 0.2);
      width: 100%;
      max-width: 480px;
    }

    .login-box h1 {
      margin-bottom: 10px;
      font-size: 32px;
      font-weight: 600;
      color: #4a67ff;
      text-align: center;
    }

    .login-box p {
      text-align: center;
      color: #aaa;
      margin-bottom: 30px;
    }

    .login-box label {
      font-size: 14px;
      color: #ccc;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin: 8px 0 20px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid #4c5f8a;
      border-radius: 8px;
      color: white;
      outline: none;
    }

    .login-box input::placeholder {
      color: #bbb;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background: #4a67ff;
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s;
    }

    .login-box button:hover {
      background: #374fc3;
      transform: scale(1.02);
    }

    .login-box .options {
      margin-top: 16px;
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      color: #ccc;
    }

    .login-box .options a {
      color: #ccc;
      text-decoration: none;
    }

    .login-box .options a:hover {
      color: #4a67ff;
    }
  </style>
</head>
<body>

<div class="moon"></div>
<div class="moon-cloud moon-cloud1"></div>
<div class="moon-cloud moon-cloud2"></div>
<div class="stars" id="stars"></div>
<div class="cloud"></div>

<div class="login-container">
  <div class="login-box">
    <h1>Insomnic</h1>
    <p>Solve Your Insom Problem</p>
    
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Enter your email" 
        required 
      />

      <label for="password">Password</label>
      <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Enter your password" 
        required 
      />

      <button type="submit">Login</button>

      <div class="options">
        <a href="{{ route('password.request') }}">Forgot your password?</a>
        <a href="{{ route('register') }}">Don't have an account? Register</a>
      </div>
    </form>
  </div>
</div>

<script>
  const starContainer = document.getElementById('stars');
  for (let i = 0; i < 120; i++) {
    const star = document.createElement('div');
    star.classList.add('star');
    star.style.top = `${Math.random() * 100}%`;
    star.style.left = `${Math.random() * 100}%`;
    const size = Math.random() * 2 + 1;
    star.style.width = `${size}px`;
    star.style.height = `${size}px`;
    star.style.animationDuration = `${Math.random() * 3 + 2}s`;
    starContainer.appendChild(star);
  }
</script>

</body>
</html>
