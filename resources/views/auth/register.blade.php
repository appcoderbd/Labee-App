<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Labee</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-gray-50 dark:bg-gray-900">
    <div class="flex items-center min-h-screen p-6">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{ asset('assets/img/registation.jpg') }}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{ asset('assets/img/registation.jpg') }}"
              alt="Office"
            />
          </div>

          <!-- Login Form -->
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Register
              </h1>

              <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email -->
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Name</span>
                  <input
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required autofocus
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                    dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Name"
                  />
                  @error('name')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                  @enderror
                </label>

                <!-- Email -->
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Email</span>
                  <input
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required autofocus
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                    dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Enter your email"
                  />
                  @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                  @enderror
                </label>

                <!-- Password -->
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Password</span>
                  <input
                    name="password"
                    type="password"
                    required
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                    dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***********"
                  />
                  @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                  @enderror
                </label>

                <!-- Confirm Password -->
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Confirm password</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                            focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                            dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="password"
                        name="password_confirmation"
                        placeholder="***********"
                        required
                    />
                </label>

                <!-- Remember Me -->
                <label class="inline-flex items-center mt-3">
                  <input type="checkbox" name="privacy"
                         class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    I agree to the <a href="#" class="underline">privacy policy</a>
                  </span>
                </label>

                <!-- Submit -->
                <button
                  type="submit"
                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                  text-center text-white transition-colors duration-150 bg-purple-600
                  border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                  focus:outline-none focus:shadow-outline-purple"
                >
                  Log in
                </button>

                <!-- Divider -->
                <div class="my-6 flex items-center justify-center">
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                    <span class="text-xs text-center text-gray-500 uppercase mx-2">or</span>
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                </div>

                <div class="mt-8">
                    <a href="{{route('social.redirect', 'github')}}">
                        <button type="button"
                            class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                                text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg
                                dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500
                                active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                        >
                            <svg
                            class="w-4 h-4 mr-2"
                            aria-hidden="true"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            >
                            <path
                                d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"
                            />
                            </svg>
                            Continue with Github
                        </button>
                    </a>

                    <a href="{{route('social.redirect', 'google')}}">
                    <button type="button"
                        class="flex items-center justify-center w-full px-4 py-2 mt-4 text-sm font-medium leading-5
                                text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg
                                dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500
                                active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                        >
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" viewBox="0 0 533.5 544.3">
                            <path fill="#4285F4" d="M533.5 278.4c0-17.4-1.6-34.1-4.6-50.4H272v95.4h146.9c-6.4 34.7-25.6 64.1-54.4 83.9l88 68.2c51.5-47.5 80.9-117.6 80.9-197.1z"/>
                            <path fill="#34A853" d="M272 544.3c73.6 0 135.4-24.4 180.5-66.3l-88-68.2c-24.4 16.4-55.6 26.1-92.5 26.1-71 0-131.1-47.9-152.6-112.1l-91.3 70.2c43.9 87.2 134.6 150.3 243.9 150.3z"/>
                            <path fill="#FBBC05" d="M119.4 323.8c-10.4-30.7-10.4-63.5 0-94.2l-91.3-70.2c-39.6 78.9-39.6 170 0 248.9l91.3-70.2z"/>
                            <path fill="#EA4335" d="M272 107.7c39.9 0 75.8 13.8 104.1 40.9l78-78C407.4 24.3 345.6 0 272 0 162.7 0 72 63.1 28.1 150.3l91.3 70.2c21.5-64.2 81.6-112.1 152.6-112.1z"/>
                        </svg>
                        Continue with Google
                    </button>
                    </a>

                </div>



              </form>

              <!-- Links -->

              <p class="mt-4 underline">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="{{ route('login') }}"
                >
                  Already have an account? Login
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
