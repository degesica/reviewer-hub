<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ReviewerHub - Learning Resources</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #172033;
        }

        .navbar {
            background: #002147;
            padding: 18px 0;
        }

        .nav-container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #f4b400;
        }

        .nav-button {
            background: #f4b400;
            color: #002147 !important;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: 600;
        }

        .hero {
            background: linear-gradient(
                135deg,
                #002147 0%,
                #073b6f 100%
            );
            color: white;
            padding: 100px 20px;
        }

        .hero-container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 60px;
            align-items: center;
        }

        .eyebrow {
            color: #f4b400;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 22px;
        }

        .hero p {
            color: #dbe5f0;
            font-size: 18px;
            line-height: 1.7;
            max-width: 650px;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-primary {
            background: #f4b400;
            color: #002147;
        }

        .btn-primary:hover {
            background: #ffc933;
        }

        .btn-secondary {
            border: 1px solid #ffffff;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background: #ffffff;
            color: #002147;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            padding: 35px;
        }

        .hero-card h2 {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .resource-item {
            background: rgba(255, 255, 255, 0.08);
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .resource-item strong {
            display: block;
            margin-bottom: 5px;
        }

        .resource-item span {
            color: #cbd7e5;
            font-size: 14px;
        }

        .section {
            padding: 80px 20px;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-heading h2 {
            font-size: 34px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: #667085;
            font-size: 16px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .card-number {
            display: inline-flex;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            background: #002147;
            color: #ffffff;
            border-radius: 50%;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 21px;
            margin-bottom: 12px;
        }

        .card p {
            color: #667085;
            line-height: 1.7;
        }

        .cta {
            background: #eef3f8;
            padding: 70px 20px;
            text-align: center;
        }

        .cta h2 {
            font-size: 34px;
            margin-bottom: 15px;
        }

        .cta p {
            color: #667085;
            margin-bottom: 25px;
        }

        .footer {
            background: #00152e;
            color: #cbd5e1;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        @media (max-width: 800px) {
            .nav-links {
                gap: 12px;
            }

            .hero-container {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 40px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 550px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 70px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <header class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                ReviewerHub
            </a>

            <nav class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>

                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('resources.index') }}">Resources</a>
                    <a href="{{ route('profile.edit') }}">Profile</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="nav-button"
                            style="border: none; cursor: pointer;"
                        >
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="nav-button">
                        Register
                    </a>
                @endauth
            </nav>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">

            <div>
                <div class="eyebrow">
                    COMMUNITY LEARNING PLATFORM
                </div>

                <h1>
                    Learn. Share. Review.
                </h1>

                <p>
                    ReviewerHub is an interactive community-based learning
                    platform where students and teachers can find, share,
                    and access reviewers, notes, study guides, and other
                    educational resources.
                </p>

                <div class="hero-buttons">
                    @auth
                        <a href="{{ route('resources.index') }}"
                           class="btn btn-primary">
                            Browse Resources
                        </a>

                        <a href="{{ route('resources.create') }}"
                           class="btn btn-secondary">
                            Share a Resource
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="btn btn-primary">
                            Get Started
                        </a>

                        <a href="{{ route('about') }}"
                           class="btn btn-secondary">
                            Learn More
                        </a>
                    @endauth
                </div>
            </div>


            <!-- Resource Preview -->
            <div class="hero-card">

                <h2>Explore Learning Materials</h2>

                <div class="resource-item">
                    <strong>Information Technology</strong>
                    <span>Programming • Database • Networking</span>
                </div>

                <div class="resource-item">
                    <strong>Engineering</strong>
                    <span>Reviewers • Notes • Study Guides</span>
                </div>

                <div class="resource-item">
                    <strong>Business & Accountancy</strong>
                    <span>Subjects • Topics • Learning Resources</span>
                </div>

            </div>

        </div>
    </section>


    <!-- Features -->
    <section class="section">

        <div class="container">

            <div class="section-heading">
                <h2>What You Can Do</h2>
                <p>
                    Access and contribute to learning resources
                    through one organized platform.
                </p>
            </div>


            <div class="cards">

                <div class="card">
                    <div class="card-number">01</div>

                    <h3>Find Resources</h3>

                    <p>
                        Browse reviewers, notes, and study materials
                        organized by academic program, subject, topic,
                        and year level.
                    </p>
                </div>


                <div class="card">
                    <div class="card-number">02</div>

                    <h3>Share Knowledge</h3>

                    <p>
                        Upload and share your own learning materials
                        to help other students and members of the
                        learning community.
                    </p>
                </div>


                <div class="card">
                    <div class="card-number">03</div>

                    <h3>Learn Together</h3>

                    <p>
                        Discover educational resources contributed
                        by students and teachers in one centralized
                        learning platform.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- Call To Action -->
    <section class="cta">

        <div class="container">

            <h2>Ready to Start Learning?</h2>

            <p>
                Join ReviewerHub and explore community-based
                learning resources.
            </p>

            @auth
                <a href="{{ route('resources.index') }}"
                   class="btn btn-primary">
                    Explore Resources
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="btn btn-primary">
                    Create an Account
                </a>
            @endauth

        </div>

    </section>


    <!-- Footer -->
    <footer class="footer">
        <p>
            ReviewerHub — Community-Based Learning Resources
        </p>
    </footer>

</body>
</html>