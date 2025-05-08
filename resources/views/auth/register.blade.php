<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Insomnic</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
  <div class="max-w-md w-full bg-gray-800 p-8 rounded-lg shadow-lg">
    <div class="text-center mb-6">
      <h1 class="text-4xl font-bold text-blue-500">Insomnic</h1>
      <p class="mt-2 text-lg text-gray-400">Join and Solve Your Insom Problem</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="mt-2 p-3 w-full rounded-md bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Your full name" 
          required
        />
      </div>

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
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="mt-2 p-3 w-full rounded-md bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Create a password" 
          required
        />
      </div>

      <!-- Confirm Password -->
      <div class="mb-6">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
        <input 
          type="password" 
          id="password_confirmation" 
          name="password_confirmation" 
          class="mt-2 p-3 w-full rounded-md bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Confirm your password" 
          required
        />
      </div>

      <!-- Submit Button -->
      <div>
        <button 
          type="submit" 
          class="w-full py-3 bg-blue-500 hover:bg-blue-600 rounded-md text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          Register
        </button>
      </div>

      <!-- Login Link -->
      <div class="mt-4 text-sm text-gray-400 text-center">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
      </div>
    </form>
  </div>
</body>
</html>
