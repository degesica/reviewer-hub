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
                    JOIN REVIEWERHUB
                </p>

                <h1>
                    Start Learning Together.
                </h1>

                <p>
                    Create your ReviewerHub account and become
                    part of a community where students and teachers
                    can share useful learning resources.
                </p>


                <div class="auth-features">

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Discover educational materials</span>
                    </div>

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Share your own reviewers</span>
                    </div>

                    <div class="auth-feature">
                        <span class="auth-feature-icon">✓</span>
                        <span>Build a learning community</span>
                    </div>

                </div>

            </div>


            <!-- Right Side -->
            <div class="auth-form-section">

                <div class="auth-form-header">

                    <h2>
                        Create Account
                    </h2>

                    <p>
                        Fill in your information to get started.
                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="auth-form"
                >

                    @csrf


                    <!-- Name -->
                    <div class="auth-field">

                        <label for="name">
                            Full Name
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        >

                        @if ($errors->get('name'))

                            @foreach ($errors->get('name') as $message)

                                <p class="auth-error">
                                    {{ $message }}
                                </p>

                            @endforeach

                        @endif

                    </div>


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
                            autocomplete="new-password"
                            placeholder="Create a password"
                        >

                        @if ($errors->get('password'))

                            @foreach ($errors->get('password') as $message)

                                <p class="auth-error">
                                    {{ $message }}
                                </p>

                            @endforeach

                        @endif

                    </div>


                    <!-- Confirm Password -->
                    <div class="auth-field">

                        <label for="password_confirmation">
                            Confirm Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        >

                        @if ($errors->get('password_confirmation'))

                            @foreach ($errors->get('password_confirmation') as $message)

                                <p class="auth-error">
                                    {{ $message }}
                                </p>

                            @endforeach

                        @endif

                    </div>


                    <!-- Register Button -->
                    <button
                        type="submit"
                        class="auth-button"
                    >
                        Create Account
                    </button>

                </form>


                <!-- Login -->
                <div class="auth-bottom">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign in
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>