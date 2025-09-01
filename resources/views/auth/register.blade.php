<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-1 me-1 w-full justify-center text-center ">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

        <div class="flex flex-col mt-10 gap-3">
            <a href="{{route('social.redirect', 'github')}}"
               class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-800 bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-black focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-900 shadow-sm transition-colors">
                <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true" role="img">
                    <path fill="currentColor" fill-rule="evenodd" d="M12 .5C5.648.5.5 5.648.5 12c0 5.088 3.292 9.387 7.865 10.905.575.114.785-.246.785-.552 0-.273-.01-1.15-.016-2.087-3.2.695-3.874-1.357-3.874-1.357-.523-1.328-1.278-1.682-1.278-1.682-1.045-.715.079-.701.079-.701 1.155.081 1.764 1.187 1.764 1.187 1.028 1.762 2.697 1.253 3.354.958.104-.745.402-1.253.732-1.54-2.554-.291-5.238-1.277-5.238-5.685 0-1.255.45-2.282 1.187-3.087-.12-.29-.515-1.463.112-3.05 0 0 .967-.31 3.17 1.18a11.07 11.07 0 0 1 2.886-.388c.98.005 1.967.132 2.888.388 2.2-1.49 3.165-1.18 3.165-1.18.629 1.587.234 2.76.115 3.05.74.805 1.185 1.832 1.185 3.087 0 4.42-2.69 5.389-5.255 5.674.414.355.782 1.053.782 2.125 0 1.534-.014 2.77-.014 3.146 0 .308.207.672.79.55C20.213 21.383 23.5 17.085 23.5 12c0-6.352-5.148-11.5-11.5-11.5Z" clip-rule="evenodd"/>
                </svg>
                <span>Continue with GitHub</span>
            </a>

            <a href="{{route('social.redirect', 'google')}}"
               class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-800 bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-black focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-900 shadow-sm transition-colors">
                <svg class="h-5 w-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.63 1.22 9.1 3.6l6.8-6.8C35.82 2.58 30.32 0 24 0 14.62 0 6.48 5.38 2.56 13.22l7.9 6.14C12.3 13.02 17.62 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.44 24.5c0-1.58-.14-3.1-.39-4.5H24v9h12.7c-.55 2.9-2.23 5.36-4.7 7.02l7.27 5.64C43.86 37.04 46.44 31.28 46.44 24.5z"/>
                    <path fill="#FBBC05" d="M10.46 28.64c-.48-1.4-.76-2.9-.76-4.64s.28-3.24.76-4.64l-7.9-6.14C.92 16.9 0 20.3 0 24s.92 7.1 2.56 10.78l7.9-6.14z"/>
                    <path fill="#34A853" d="M24 48c6.32 0 11.62-2.08 15.5-5.64l-7.27-5.64c-2.02 1.38-4.6 2.2-8.23 2.2-6.38 0-11.7-3.52-14.54-8.64l-7.9 6.14C6.48 42.62 14.62 48 24 48z"/>
                </svg>
                <span>Continue with Google</span>
            </a>
        </div>
    </form>
</x-guest-layout>
