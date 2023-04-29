<style>
    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
        border-radius: 0.25rem;
        border: 1px solid #ccc;
    }

    button {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: #fff;
        border-radius: 0.25rem;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
    }

    img {
        max-width: 100%;
        max-height: 100px;
        min-width: 60px;
    }
    
    .image-container {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: -1rem;
        max-height: 320px;
        overflow: auto;
    }

    .image-container > div {
        flex: 1 0 10rem; 
        margin-right: 1rem;
        margin-bottom: 1rem;
    }

    .image-container > div:last-child {
        margin-right: 0;
    }

    @media (max-width: 640px) { 
        .image-container > div {
            flex-basis: calc(50% - 0.5rem);
        }
    }
</style>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />

    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />

    <x-input-label for="password" :value="__('Password')" />
    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />

    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

    <x-input-label for="profile_image" :value="__('Profile Image')" />

    <div class="image-container">
        @foreach ($images as $image)
        <div class="relative mr-4 mb-4">
            <label for="avatar_{{ $loop->index }}" class="block cursor-pointer">
                <img src="{{ asset($image) }}" alt="{{ $image }}" class="block h-20 w-auto object-contain rounded-full border-2 border-gray-400 hover:border-blue-500 transition duration-300" />
                <input type="radio" id="avatar_{{ $loop->index }}" name="avatar" value="{{ $image }}" class="hidden" {{ $loop->first ? 'checked' : '' }} />
            </label>
        </div>
        @endforeach
    </div>

    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
        {{ __('Already registered?') }}
    </a>

    <x-primary-button class="ml-4">
        {{ __('Register') }}
    </x-primary-button>
</form>