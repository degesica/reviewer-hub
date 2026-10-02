<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile - ReviewerHub</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>

<body>

    @include('layouts.navigation')

    <main class="profile-page">

        <!-- PROFILE HERO -->
        <section class="profile-hero">

            <div class="profile-container">

                <p class="profile-label">
                    REVIEWERHUB PROFILE
                </p>

                <h1>
                    My Profile
                </h1>

                <p>
                    Manage your account information and
                    ReviewerHub profile settings.
                </p>

            </div>

        </section>


        <!-- PROFILE CONTENT -->
        <section class="profile-content">

            <div class="profile-container">

                <div class="profile-grid">

                    <!-- ACCOUNT OVERVIEW -->
                    <div class="profile-overview">

                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <h2>
                            {{ Auth::user()->name }}
                        </h2>

                        <p>
                            {{ Auth::user()->email }}
                        </p>

                        <div class="profile-status">
                            Active Account
                        </div>

                    </div>


                    <!-- ACCOUNT INFORMATION -->
                    <div class="profile-card">

                        <div class="profile-card-header">

                            <p class="section-label">
                                ACCOUNT INFORMATION
                            </p>

                            <h2>
                                Profile Details
                            </h2>

                        </div>


                        @if (session('status') === 'profile-updated')

                            <div class="profile-success">
                                Profile information updated successfully.
                            </div>

                        @endif


                        <form
                            method="post"
                            action="{{ route('profile.update') }}"
                            class="profile-form"
                        >

                            @csrf
                            @method('patch')


                            <!-- NAME -->
                            <div class="profile-form-group">

                                <label for="name">
                                    Name
                                </label>

                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', Auth::user()->name) }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                >

                                @if ($errors->get('name'))

                                    <span class="profile-error">
                                        {{ $errors->first('name') }}
                                    </span>

                                @endif

                            </div>


                            <!-- EMAIL -->
                            <div class="profile-form-group">

                                <label for="email">
                                    Email
                                </label>

                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    required
                                    autocomplete="username"
                                >

                                @if ($errors->get('email'))

                                    <span class="profile-error">
                                        {{ $errors->first('email') }}
                                    </span>

                                @endif

                            </div>


                            <div class="profile-form-actions">

                                <button
                                    type="submit"
                                    class="profile-save-button"
                                >
                                    Save Changes
                                </button>

                            </div>

                        </form>

                    </div>


                    <!-- PASSWORD -->
                    <div class="profile-card">

                        <div class="profile-card-header">

                            <p class="section-label">
                                SECURITY
                            </p>

                            <h2>
                                Update Password
                            </h2>

                            <p>
                                Use a strong password to help protect
                                your ReviewerHub account.
                            </p>

                        </div>


                        <form
                            method="post"
                            action="{{ route('password.update') }}"
                            class="profile-form"
                        >

                            @csrf
                            @method('put')


                            <div class="profile-form-group">

                                <label for="current_password">
                                    Current Password
                                </label>

                                <input
                                    id="current_password"
                                    name="current_password"
                                    type="password"
                                    autocomplete="current-password"
                                >

                            </div>


                            <div class="profile-form-group">

                                <label for="password">
                                    New Password
                                </label>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="new-password"
                                >

                            </div>


                            <div class="profile-form-group">

                                <label for="password_confirmation">
                                    Confirm New Password
                                </label>

                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    autocomplete="new-password"
                                >

                            </div>


                            <div class="profile-form-actions">

                                <button
                                    type="submit"
                                    class="profile-save-button"
                                >
                                    Update Password
                                </button>

                            </div>

                        </form>

                    </div>


                    <!-- DELETE ACCOUNT -->
                    <div class="profile-card profile-danger-card">

                        <div class="profile-card-header">

                            <p class="section-label">
                                ACCOUNT
                            </p>

                            <h2>
                                Delete Account
                            </h2>

                            <p>
                                Permanently delete your ReviewerHub
                                account and its associated data.
                            </p>

                        </div>


                        <form
                            method="post"
                            action="{{ route('profile.destroy') }}"
                            onsubmit="return confirm('Are you sure you want to delete your account?');"
                        >

                            @csrf
                            @method('delete')

                            <button
                                type="submit"
                                class="profile-delete-button"
                            >
                                Delete Account
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </section>

    </main>

</body>

</html>