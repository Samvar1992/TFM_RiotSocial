<nav>
    <div>
        <div class= "px-100">
            <div class= "text-xl">
                @auth
                    <!-- Sección para usuarios logados -->
                    <x-nav-link href="{{route('dashboard')}}" :avtive="request()->routeIs('dashboard')">
                        {{__('Dashboard')}}
                    </x-nav>

                @else
                    <!-- Sección para usuarios no logados -->
                    <x-nav-link href="{{route('login')}}" :avtive="request()->routeIs('login')">
                        {{__('Log in')}}
                    </x-nav>

                    <x-nav-link href="{{route('register')}}" :avtive="request()->routeIs('register')">
                        {{__('Register')}}
                    </x-nav>

                @endauth

            </div>
        </div>
    </div>
</nav>