@if(Auth::check())
    <!-- Settings Dropdown LOGIN-->
    <div class="login_dropdown">
        <x-dropdown align="right" width="30">
            <x-slot name="trigger">
                <button class="button_dropdown">
                <div>{{ Auth::user()->name }}</div>
                    <div class="mt-2">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>
            <x-slot name="content">
                <a href="{{ route('profile.edit') }}">
                    <div class="button_dropdown">
                        {{ __('auth.profile') }}
                    </div>
                </a>
                <div class="button_dropdown">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="{{ __('auth.log out') }}" />                                          
                    </form>                                            
                </div>
            </x-slot>
        </x-dropdown>
    </div>
@else
    <!-- Settings Dropdown NO LOGIN-->
    <div class="login_dropdown">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="button_dropdown">
                    <div>{{ __('auth.no_login') }}</div>
                     <div class="mt-2">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                </x-slot>
                <x-slot name="content">
                    <a href="{{ route('register') }}">
                        <div class="button_dropdown">
                            {{ __('auth.register') }}
                        </div>
                    </a>
                    <a href="{{ route('login') }}">
                        <div class="button_dropdown">
                            {{ __('auth.login') }}
                        </div>
                    </a>
            </x-slot>
        </x-dropdown>
    </div>
@endif