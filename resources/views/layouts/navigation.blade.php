<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    @if (Auth::check())
    <div>
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('posts.index') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">

                    <!-- New Post Button -->
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <span>{{ __('New Post') }}</span>
                    </a>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            {{ __('Log out') }}
                        </button>
                    </form>

                    <!-- User Avatar -->
                    <a href="{{ route('home') }}" class="inline-flex items-center">
                        <img class="h-9 w-9 rounded-full" src="{{ asset(Auth::user()->avatar) }}" alt="User Avatar">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="d-flex justify-content-end align-items-center">
        <p class="mr-3 mb-0">Please log in to view your name</p>
        <a href="{{ route('users.login') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">Login</a>
    </div>
    @endif
</nav>