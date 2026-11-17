{{--
    Site header and navigation (Pair 1).
    INTERFACE I2: each pair edits ONLY its own links below, marked PAIR 2 / 3 / 4.
    The route names are frozen, so keep them.
--}}
<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="brand" aria-label="Mireli Real Estate home">
            <span class="brand-name">Mireli</span>
            <span class="brand-tag">Real Estate</span>
        </a>

        <button class="nav-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="site-nav" data-nav aria-label="Main">
            @guest
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'is-active' : '' }}">Log in</a>
            <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'is-active' : '' }}">Register</a>
            @endguest

            @auth
            @if (auth()->user()->isClient())
            <a href="{{ route('client.dashboard') }}" class="{{ request()->routeIs('client.dashboard') ? 'is-active' : '' }}">Dashboard</a>
            {{-- PAIR 2 --}}
            <a href="{{ route('properties.index') }}" class="{{ request()->routeIs('properties.*') ? 'is-active' : '' }}">Properties</a>
            {{-- PAIR 3 --}}
            <a href="{{ route('viewings.index') }}" class="{{ request()->routeIs('viewings.*') ? 'is-active' : '' }}">My viewings</a>
            <a href="{{ route('customizations.index') }}" class="{{ request()->routeIs('customizations.*') ? 'is-active' : '' }}">Customization</a>
            {{-- PAIR 4 --}}
            <a href="{{ route('payments.index') }}" class="{{ request()->routeIs('payments.*') ? 'is-active' : '' }}">My payments</a>
            @endif

            @if (auth()->user()->isManagement())
            <a href="{{ route('management.dashboard') }}" class="{{ request()->routeIs('management.dashboard') ? 'is-active' : '' }}">Dashboard</a>
            {{-- PAIR 2 --}}
            <a href="{{ route('management.properties.index') }}" class="{{ request()->routeIs('management.properties.*') ? 'is-active' : '' }}">Properties</a>
            {{-- PAIR 3 --}}
            <a href="{{ route('management.viewings.index') }}" class="{{ request()->routeIs('management.viewings.*') ? 'is-active' : '' }}">Viewings</a>
            {{-- PAIR 4 --}}
            <a href="{{ route('management.payments.index') }}" class="{{ request()->routeIs('management.payments.*') ? 'is-active' : '' }}">Payments</a>
            <a href="{{ route('management.interest-rates.index') }}" class="{{ request()->routeIs('management.interest-rates.*') ? 'is-active' : '' }}">Interest rates</a>
            @endif

            @if (auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Dashboard</a>
            {{-- PAIR 1 --}}
            <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'is-active' : '' }}">Reports</a>
            @endif

            <span class="nav-user">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-button">Log out</button>
            </form>
            @endauth
        </nav>
    </div>
</header>