<x-guest-layout>

    <div class="auth-page">

        <div class="auth-wrapper">

            <!-- Left Side -->
            <div class="auth-brand">

                <a href="{{ route('home') }}"
                   style="text-decoration: none;">

                    <div class="auth-logo">
                        RH
                    </div>

                </a>

                <p class="eyebrow">
                    COMMUNITY LEARNING PLATFORM
                </p>

                <h1>
                    Welcome Back.
                </h1>

                <p>
                    Sign in to ReviewerHub and continue exploring
                    learning resources shared by the community.
                </p>


                <div class="auth-features">

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Access organized learning resources</span>
                    </div>

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Share reviewers and study materials</span>
                    </div>

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Learn together with the community</span>
                    </div>

                </div>

            </div>


            <!-- Right Side -->
            <div class="auth-form-section">

                <div class="auth-form-header">

                    <h2>
                        Sign In
                    </h2>

                    <p>
                        Enter your account information to continue.
                    </p>

                </div>


                <!-- Session Status -->
                <x-auth-session-status
                    class="auth-status"
                    :status="session('status')"
                />


                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="auth-form"
                >

                    @csrf


                    <!-- Email -->
                    <div class="auth-field">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email"
                        >

                        @if ($errors->get('email'))

                            @foreach ($errors->get('email') as $message)

                                <p class="auth-error">
                                    {{ $message }}
                                </p>

                            @endforeach

                        @endif

                    </div>


                    <!-- Password -->
                    <div class="auth-field">

                        <label for="password">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >

                        @if ($errors->get('password'))

                            @foreach ($errors->get('password') as $message)

                                <p class="auth-error">
                                    {{ $message }}
                                </p>

                            @endforeach

                        @endif

                    </div>


                    <!-- Options -->
                    <div class="auth-options">

                        <label class="auth-remember">

                            <input
                                type="checkbox"
                                name="remember"
                            >

                            <span>
                                Remember me
                            </span>

                        </label>


                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="auth-link"
                            >
                                Forgot password?
                            </a>

                        @endif

                    </div>


                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="auth-button"
                    >
                        Sign In
                    </button>

                </form>


                <!-- Register -->
                <div class="auth-bottom">

                    Don't have an account?

                    <a href="{{ route('register') }}">
                        Create an account
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>