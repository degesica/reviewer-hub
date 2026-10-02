<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Learning Resources - ReviewerHub</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/resources.css') }}">

</head>

<body>

    @include('layouts.navigation')

    <main class="resources-page">

        <!-- HEADER -->
        <section class="resources-hero">

            <div class="resources-container">

                <p class="resources-label">
                    REVIEWERHUB RESOURCES
                </p>

                <h1>
                    Learning Resources
                </h1>

                <p>
                    Explore reviewers, notes, study guides, and
                    other learning materials shared by the community.
                </p>

                <a
                    href="{{ route('resources.create') }}"
                    class="resources-add-button"
                >
                    + Share a Resource
                </a>

            </div>

        </section>


        <!-- RESOURCES -->
        <section class="resources-content">

            <div class="resources-container">

                @if (session('success'))

                    <div class="resource-success">
                        {{ session('success') }}
                    </div>

                @endif


                @if ($resources->count())

                    <div class="resources-grid">

                        @foreach ($resources as $resource)

                            <article class="resource-card">

                                <div class="resource-card-top">

                                    <span class="resource-program">
                                        {{ $resource->academic_program }}
                                    </span>

                                    <span class="resource-year">
                                        {{ $resource->year_level }}
                                    </span>

                                </div>


                                <h2>
                                    {{ $resource->title }}
                                </h2>


                                <p class="resource-description">
                                    {{ $resource->description }}
                                </p>


                                <div class="resource-details">

                                    <div>
                                        <span>Subject</span>
                                        <strong>
                                            {{ $resource->subject }}
                                        </strong>
                                    </div>

                                    <div>
                                        <span>Topic</span>
                                        <strong>
                                            {{ $resource->topic }}
                                        </strong>
                                    </div>

                                </div>


                                <div class="resource-footer">

                                    <span>
                                        Shared by
                                        {{ $resource->uploaded_by }}
                                    </span>

                                    <a
                                        href="{{ route('resources.show', $resource) }}"
                                    >
                                        View →
                                    </a>

                                </div>

                            </article>

                        @endforeach

                    </div>

                @else

                    <div class="resources-empty">

                        <div class="empty-icon">
                            📚
                        </div>

                        <h2>
                            No learning resources yet.
                        </h2>

                        <p>
                            Be the first to share a learning resource
                            with the ReviewerHub community.
                        </p>

                        <a
                            href="{{ route('resources.create') }}"
                            class="resources-add-button"
                        >
                            + Share a Resource
                        </a>

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>

</html>