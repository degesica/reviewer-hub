@extends('layouts.app')

@section('title', 'Reports & Analytics')

@section('content')

<link rel="stylesheet" href="{{ asset('css/reports.css') }}">

<div class="reports-page">

    <!-- HEADER -->
    <div class="reports-header">

        <div>
            <p class="reports-label">
                REVIEWERHUB ANALYTICS
            </p>

            <h1>
                Reports & Analytics
            </h1>

            <p class="reports-description">
                View an overview of your products, inventory,
                categories, and monthly sales activity.
            </p>
        </div>

        <div class="reports-date">
            <span>REPORT GENERATED</span>

            <strong>
                {{ now()->format('F d, Y') }}
            </strong>
        </div>

    </div>


    <!-- SUMMARY CARDS -->
    <div class="report-cards">

        <div class="report-card">

            <div class="card-top">
                <span class="card-label">
                    TOTAL PRODUCTS
                </span>

                <div class="card-icon">
                    #
                </div>
            </div>

            <div class="card-value">
                {{ $products->count() }}
            </div>

            <p class="card-description">
                Total products available
            </p>

        </div>


        <div class="report-card">

            <div class="card-top">
                <span class="card-label">
                    TOTAL VALUE
                </span>

                <div class="card-icon">
                    ₱
                </div>
            </div>

            <div class="card-value">
                ₱{{ number_format(
                    $products->sum(function ($product) {
                        return $product->price * $product->quantity;
                    }),
                    2
                ) }}
            </div>

            <p class="card-description">
                Combined inventory value
            </p>

        </div>


        <div class="report-card">

            <div class="card-top">
                <span class="card-label">
                    TOTAL QUANTITY
                </span>

                <div class="card-icon">
                    +
                </div>
            </div>

            <div class="card-value">
                {{ $products->sum('quantity') }}
            </div>

            <p class="card-description">
                Total items in inventory
            </p>

        </div>


        <div class="report-card">

            <div class="card-top">
                <span class="card-label">
                    CATEGORIES
                </span>

                <div class="card-icon">
                    ≡
                </div>
            </div>

            <div class="card-value">
                {{ $categoryData->count() }}
            </div>

            <p class="card-description">
                Different categories
            </p>

        </div>

    </div>


    <!-- PIE + BAR -->
    <div class="reports-grid">

        <!-- PIE CHART -->
        <div class="report-panel">

            <div class="panel-header">

                <div>
                    <p class="panel-label">
                        RESOURCE DISTRIBUTION
                    </p>

                    <h2>
                        Products by Category
                    </h2>
                </div>

            </div>

            <div class="chart-container">
                <canvas id="categoryChart"></canvas>
            </div>

        </div>


        <!-- BAR CHART -->
        <div class="report-panel">

            <div class="panel-header">

                <div>
                    <p class="panel-label">
                        PRICE ANALYSIS
                    </p>

                    <h2>
                        Price Range Distribution
                    </h2>
                </div>

            </div>

            <div class="chart-container">
                <canvas id="priceRangeChart"></canvas>
            </div>

        </div>

    </div>


    <!-- LINE CHART -->
    <div class="report-panel monthly-panel">

        <div class="panel-header">

            <div>
                <p class="panel-label">
                    MONTHLY ACTIVITY
                </p>

                <h2>
                    Monthly Sales
                </h2>
            </div>

        </div>

        <div class="monthly-chart">
            <canvas id="monthlySalesChart"></canvas>
        </div>

    </div>


    <!-- PRODUCTS -->
    <div class="report-panel products-panel">

        <div class="panel-header products-header">

            <div>
                <p class="panel-label">
                    RESOURCE INVENTORY
                </p>

                <h2>
                    Products Overview
                </h2>
            </div>

            <a
                href="{{ route('data-table') }}"
                class="view-table-button"
            >
                View Full Table
                <span>→</span>
            </a>

        </div>


        <div class="products-list">

            @forelse($products as $product)

                <div class="product-row">

                    <div class="product-info">

                        <div class="product-number">
                            {{ $loop->iteration }}
                        </div>

                        <div>

                            <h3>
                                {{ $product->name }}
                            </h3>

                            <p>
                                {{ $product->category }}
                            </p>

                        </div>

                    </div>


                    <div class="product-details">

                        <div>
                            <span>PRICE</span>

                            <strong>
                                ₱{{ number_format($product->price, 2) }}
                            </strong>
                        </div>

                        <div>
                            <span>QUANTITY</span>

                            <strong>
                                {{ $product->quantity }}
                            </strong>
                        </div>

                        <div>
                            <span>TOTAL</span>

                            <strong>
                                ₱{{ number_format(
                                    $product->price * $product->quantity,
                                    2
                                ) }}
                            </strong>
                        </div>

                    </div>

                </div>

            @empty

                <div class="empty-products">
                    No products available.
                </div>

            @endforelse

        </div>

    </div>

</div>


<!-- CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // =====================================================
    // DATA FROM LARAVEL
    // =====================================================

    const categoryLabels = @json(
        $categoryData->pluck('category')->values()
    );

    const categoryValues = @json(
        $categoryData->pluck('count')->values()
    );


    const priceRangeLabels = @json(
        $priceRangeData->pluck('price_range')->values()
    );

    const priceRangeValues = @json(
        $priceRangeData->pluck('count')->values()
    );


    const monthlyLabels = @json(
        $monthlySales->pluck('month')->values()
    );

    const monthlyValues = @json(
        $monthlySales->pluck('total_sales')->values()
    );


    // =====================================================
    // PIE CHART
    // =====================================================

    new Chart(
        document.getElementById('categoryChart'),
        {
            type: 'pie',

            data: {
                labels: categoryLabels,

                datasets: [{
                    data: categoryValues,

                    backgroundColor: [
                        '#002147',
                        '#D4AF37',
                        '#1E3A5F',
                        '#6B7280',
                        '#C9A227',
                        '#334155'
                    ],

                    borderColor: '#ffffff',

                    borderWidth: 2
                }]
            },

            options: {
                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        position: 'bottom',

                        labels: {
                            padding: 18,
                            usePointStyle: true,

                            font: {
                                size: 11
                            }
                        }
                    }
                }
            }
        }
    );


    // =====================================================
    // BAR CHART
    // =====================================================

    new Chart(
        document.getElementById('priceRangeChart'),
        {
            type: 'bar',

            data: {
                labels: priceRangeLabels,

                datasets: [{
                    label: 'Products',

                    data: priceRangeValues,

                    backgroundColor: '#002147',

                    borderRadius: 6,

                    borderSkipped: false
                }]
            },

            options: {
                responsive: true,

                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    y: {
                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: '#E5E7EB'
                        }
                    },

                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        }
    );


    // =====================================================
    // LINE CHART
    // =====================================================

    new Chart(
        document.getElementById('monthlySalesChart'),
        {
            type: 'line',

            data: {
                labels: monthlyLabels,

                datasets: [{
                    label: 'Total Sales',

                    data: monthlyValues,

                    borderColor: '#002147',

                    backgroundColor:
                        'rgba(0, 33, 71, 0.08)',

                    borderWidth: 2,

                    fill: true,

                    tension: 0.35,

                    pointBackgroundColor: '#D4AF37',

                    pointBorderColor: '#002147',

                    pointRadius: 5,

                    pointHoverRadius: 7
                }]
            },

            options: {
                responsive: true,

                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    y: {
                        beginAtZero: true,

                        grid: {
                            color: '#E5E7EB'
                        }
                    },

                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        }
    );

</script>

@endsection