<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>About - ReviewerHub</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

</head>

<body>

    @include('layouts.navigation')


    <main class="about-page">

        <!-- HERO -->
        <section class="about-hero">

            <div class="about-container">

                <p class="about-label">
                    ABOUT REVIEWERHUB
                </p>

                <h1>
                    Learn. Share. Review.
                </h1>

                <p>
                    A community-based learning platform where
                    students and teachers can discover, share,
                    and access educational resources in one place.
                </p>

            </div>

        </section>


        <!-- CONTENT -->
        <section class="about-content">

            <div class="about-container">

                <div class="about-grid">

                    <!-- LEFT -->
                    <div class="about-main">

                        <p class="section-label">
                            OUR PLATFORM
                        </p>

                        <h2>
                            Making learning resources easier to access.
                        </h2>

                        <p>
                            ReviewerHub is designed to provide students
                            and teachers with an organized space for
                            sharing and accessing learning materials.
                        </p>

                        <p>
                            Instead of searching through different
                            websites, group chats, and social media
                            platforms, users can find reviewers,
                            notes, study guides, and other educational
                            resources in one centralized platform.
                        </p>

                    </div>


                    <!-- RIGHT -->
                    <div class="about-features">

                        <div class="about-feature">

                            <div class="feature-number">
                                01
                            </div>

                            <div>

                                <h3>
                                    Organized Resources
                                </h3>

                                <p>
                                    Find learning materials by
                                    program, subject, topic, and
                                    year level.
                                </p>

                            </div>

                        </div>


                        <div class="about-feature">

                            <div class="feature-number">
                                02
                            </div>

                            <div>

                                <h3>
                                    Community Sharing
                                </h3>

                                <p>
                                    Students and teachers can share
                                    useful learning materials with
                                    other users.
                                </p>

                            </div>

                        </div>


                        <div class="about-feature">

                            <div class="feature-number">
                                03
                            </div>

                            <div>

                                <h3>
                                    Accessible Learning
                                </h3>

                                <p>
                                    Provide a centralized place for
                                    users to access educational
                                    resources.
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