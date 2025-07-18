<header class="bg-white">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <a wire:navigate class="block text-teal-600" href="/">
            <span class="sr-only">Home</span>
            <img src="{{ asset('images/image.jpg') }}" alt="Logo" class="h-10 rounded-full object-cover w-auto" />
        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a wire:navigate class="text-gray-500 transition hover:text-gray-500/75" href="/about"> About </a>
                    </li>

                    <li>
                        <a wire:navigate class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('posts.index') }}"> Blog </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                @guest
                <div class="sm:flex sm:gap-4 items-center text-teal-600">
                    <a wire:navigate class="text-sm font-medium transition hover:text-teal-600/75 hover:underline sm:block"
                        href="{{ route('login') }}">
                        Login
                    </a>
                    /
                    <a wire:navigate class="text-sm font-medium transition hover:text-teal-600/75 hover:underline sm:block"
                        href="{{ route('register') }}">
                        Register
                    </a>
                </div>
                @endguest
                @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth
            </div>
        </div>
    </div>
</header>