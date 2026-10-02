<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Dashboard - ReviewerHub
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

    <!-- NAVIGATION -->
    @include('layouts.navigation')


    <!-- DASHBOARD -->
    <main class="dashboard-page">

        <!-- HERO -->
        <section class="dashboard-hero">

            <div class="dashboard-container">

                <div class="dashboard-hero-content">

                    <p class="dashboard-label">
                        REVIEWERHUB DASHBOARD
                    </p>

                    <h1>
                        Welcome back,
                        <span>{{ Auth::user()->name }}</span>
                    </h1>

                    <p class="dashboard-intro">
                        Continue your learning journey by exploring,
                        sharing, and organizing educational resources
                        with the ReviewerHub community.
                    </p>

                    <div class="dashboard-actions">

                        <a
                            href="{{ route('resources.index') }}"
                            class="dashboard-btn dashboard-btn-primary"
                        >
                            Browse Resources
                        </a>

                        <a
                            href="{{ route('resources.create') }}"
                            class="dashboard-btn dashboard-btn-secondary"
                        >
                            Share a Resource
                        </a>

                    </div>

                </div>


                <div class="dashboard-hero-card">

                    <div class="dashboard-logo">
                        RH
                    </div>

                    <h2>
                        ReviewerHub
                    </h2>

                    <p>
                        Learn. Share. Review.
                    </p>

                </div>

            </div>

        </section>


        <!-- QUICK ACCESS -->
        <section class="dashboard-content">

            <div class="dashboard-container">

                <div class="dashboard-section-header">

                    <div>

                        <p class="section-label">
                            QUICK ACCESS
                        </p>

                        <h2>
                            What would you like to do?
                        </h2>

                    </div>

                    <p>
                        Access the main features of ReviewerHub.
                    </p>

                </div>


                <div class="dashboard-grid">


                    <!-- LEARNING RESOURCES -->
                    <div class="dashboard-card">

                        <div class="dashboard-card-icon">
                            📚
                        </div>

                        <h3>
                            Learning Resources
                        </h3>

                        <p>
                            Browse reviewers, notes, study guides,
                            and other learning materials shared by
                            the ReviewerHub community.
                        </p>

                        <a
                            href="{{ route('resources.index') }}"
                            class="dashboard-card-link"
                        >
                            View Resources
                            <span>→</span>
                        </a>

                    </div>


                    <!-- SHARE KNOWLEDGE -->
                    <div class="dashboard-card">

                        <div class="dashboard-card-icon">
                            +
                        </div>

                        <h3>
                            Share Knowledge
                        </h3>

                        <p>
                            Upload and share your own reviewers
                            and learning materials to help other
                            students and learners.
                        </p>

                        <a
                            href="{{ route('resources.create') }}"
                            class="dashboard-card-link"
                        >
                            Add Resource
                            <span>→</span>
                        </a>

                    </div>


                    <!-- PROFILE -->
                    <div class="dashboard-card">

                        <div class="dashboard-card-icon">
                            👤
                        </div>

                        <h3>
                            My Profile
                        </h3>

                        <p>
                            Manage your account information,
                            password, and ReviewerHub profile.
                        </p>

                        <a
                            href="{{ route('profile.edit') }}"
                            class="dashboard-card-link"
                        >
                            Manage Profile
                            <span>→</span>
                        </a>

                    </div>

                </div>


                <!-- ABOUT REVIEWERHUB -->
                <div class="dashboard-about">

                    <div class="dashboard-about-content">

                        <p class="section-label">
                            ABOUT REVIEWERHUB
                        </p>

                        <h2>
                            Learn and share in one place.
                        </h2>

                        <p>
                            ReviewerHub is a community-based learning
                            platform where students and teachers can
                            find, share, and access educational resources
                            in one organized place.
                        </p>

                    </div>


                    <div class="dashboard-about-items">


                        <div class="about-item">

                            <div class="about-number">
                                01
                            </div>

                            <div>

                                <strong>
                                    Find Resources
                                </strong>

                                <p>
                                    Discover useful learning materials.
                                </p>

                            </div>

                        </div>


                        <div class="about-item">

                            <div class="about-number">
                                02
                            </div>

                            <div>

                                <strong>
                                    Share Knowledge
                                </strong>

                                <p>
                                    Contribute your own reviewers.
                                </p>

                            </div>

                        </div>


                        <div class="about-item">

                            <div class="about-number">
                                03
                            </div>

                            <div>

                                <strong>
                                    Learn Together
                                </strong>

                                <p>
                                    Support community-based learning.
                                </p>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </section>

    </main>

</body>

</html>