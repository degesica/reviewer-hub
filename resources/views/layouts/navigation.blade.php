<nav class="reviewer-nav">

    <div class="reviewer-nav-container">

        <!-- LOGO -->
        <a href="{{ route('home') }}" class="reviewer-logo">
            ReviewerHub
        </a>


        <!-- NAVIGATION -->
        <div class="reviewer-nav-links">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('about') }}">
                About
            </a>

            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('resources.index') }}">
                Resources
            </a>

            <a href="{{ route('profile.edit') }}">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="nav-button">
                    Logout
                </button>
            </form>

        </div>

    </div>

</nav>