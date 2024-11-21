<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/univicosa-hori.svg') }}" alt="Logo" class="block h-10 max-h-10" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if(Auth::check())
                @if(Auth::user()->role === 'admin')
                <ul class="ms-6 hidden space-x-2 sm:flex sm:items-center">
                    <li>
                        <a href="{{ route('inicio') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('inicio') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Início') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('simposios.index') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('simposios.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Simpósios') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('trabalhos.all') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('trabalhos.all') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Trabalhos') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('avaliadores.index') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('avaliadores.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Avaliadores') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cursos') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('cursos') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Resultados') }}
                        </a>
                    </li>
                </ul>
                @elseif(Auth::user()->role === 'avaliador')
                <ul class="ms-6 hidden space-x-2 sm:flex sm:items-center">
                    <li>
                        <a href="{{ route('inicio') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('inicio') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Início') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('trabalho.index') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('trabalho.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Trabalhos') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cursos') }}" class="text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('cursos') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            {{ __('Resultados') }}
                        </a>
                    </li>
                </ul>
                @endif
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">



                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if(auth()->check())

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @else
                        <x-dropdown-link :href="route('login')">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @if(auth()->check())
        @if(Auth::user()->role === 'admin')
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                {{ __('Início') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('simposios.index')" :active="request()->routeIs('simposios.index')">
                {{ __('Simposios') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('trabalho.index')" :active="request()->routeIs('trabalho.index')">
                {{ __('Trabalhos') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('avaliadores.index')" :active="request()->routeIs('avaliadores.index')">
                {{ __('Avaliadores') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('cursos')" :active="request()->routeIs('cursos')">
                {{ __('Resultados') }}
            </x-responsive-nav-link>
        </div>
        @elseif(Auth::user()->role === 'avaliador')
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                {{ __('Início') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('trabalho.index')" :active="request()->routeIs('trabalho.index')">
                {{ __('Avaliar') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('cursos')" :active="request()->routeIs('cursos')">
                {{ __('Resultados') }}
            </x-responsive-nav-link>
        </div>
        @endif
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">


            <div class="mt-3 space-y-1">

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>