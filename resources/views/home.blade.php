@extends('layouts.app')

@section('title', 'Home - ReviewerHub')

@section('content')

<section class="hero">
    <div class="container">

        <p class="eyebrow">COMMUNITY LEARNING PLATFORM</p>

        <h1>
            Learn. Share. Review.
        </h1>

        <p class="hero-text">
            ReviewerHub is an interactive community-based platform
            where students and teachers can find and share learning
            resources, reviewers, notes, and study materials.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('resources.index') }}" class="btn btn-primary">
                Browse Resources
            </a>

            <a href="{{ route('about') }}" class="btn btn-secondary">
                Learn More
            </a>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">

        <h2>What You Can Do</h2>

        <div class="cards">

            <div class="card">
                <h3>Find Resources</h3>
                <p>
                    Search for reviewers and learning materials
                    organized by academic information.
                </p>
            </div>

            <div class="card">
                <h3>Share Knowledge</h3>
                <p>
                    Contribute your own reviewers and educational
                    materials to the community.
                </p>
            </div>

            <div class="card">
                <h3>Learn Together</h3>
                <p>
                    Access resources shared by students and teachers
                    in one organized platform.
                </p>
            </div>

        </div>

    </div>
</section>

@endsection