<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if (session('login_type') == 'admin')
    <h2 class="text-2xl text-white text-center">Administrador</h2>
    @elseif (session('login_type') == 'avaliador')
    <h2 class="text-2xl text-white text-center">Avaliador</h2>
    @else
    <h2 class="text-2xl text-white text-center">Login</h2>
    @endif


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="flex justify-start">
                <div class="flex">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembrar de mim') }}</span>
                </div>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Esqueceu sua senha?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>