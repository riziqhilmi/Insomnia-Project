<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Insomnic</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
  <div class="max-w-md w-full bg-gray-800 p-8 rounded-lg shadow-lg">
    <div class="text-center mb-6">
      <h1 class="text-4xl font-bold text-blue-500">Insomnic</h1>
      <p class="mt-2 text-lg text-gray-400">Solve Your Insom Problem</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          class="mt-2 p-3 w-full rounded-md bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your email" 
          required
        />
      </div>

      <!-- Password -->
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="mt-2 p-3 w-full rounded-md bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your password" 
          required
        />
      </div>

      <!-- Remember Me -->
      <div class="flex items-center mb-6">
        <input 
          type="checkbox" 
          id="remember" 
          name="remember" 
          class="h-4 w-4 text-blue-500 rounded border-gray-600 focus:ring-blue-500"
        />
        <label for="remember" class="ml-2 text-sm text-gray-300">Remember Me</label>
      </div>

      <!-- Submit Button -->
      <div>
        <button 
          type="submit" 
          class="w-full py-3 bg-blue-500 hover:bg-blue-600 rounded-md text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Login
        </button>
      </div>

      <!-- Forgot Password Link -->
      <div class="mt-4 text-center">
        <a href="{{ route('password.request') }}" class="text-sm text-gray-400 hover:text-blue-500">
          Forgot your password?
        </a>
      </div>
    </form>
  </div>
</body>
</html>
