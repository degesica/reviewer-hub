@extends('layouts.app')

@section('title', 'Products Data Table')

@section('content')

<link rel="stylesheet" href="{{ asset('css/data-table.css') }}">

<div class="data-table-page">

    <!-- PAGE HEADER -->
    <div class="data-table-header">

        <div>
            <p class="data-table-label">
                REVIEWERHUB INVENTORY
            </p>

            <h1>
                Products Data Table
            </h1>

            <p class="data-table-description">
                View and monitor all available learning resources
                and their current inventory information.
            </p>
        </div>

        <div class="table-summary">
            <span>TOTAL PRODUCTS</span>

            <strong>
                {{ $products->count() }}
            </strong>
        </div>

    </div>


    <!-- TABLE CARD -->
    <div class="data-table-card">

        <!-- TABLE HEADER -->
        <div class="data-table-card-header">

            <div>
                <p class="table-section-label">
                    RESOURCE INVENTORY
                </p>

                <h2>
                    All Products
                </h2>
            </div>

            <a href="{{ route('reports') }}" class="back-report-button">
                <span>←</span>
                Back to Reports
            </a>

        </div>


        <!-- TABLE -->
        <div class="table-wrapper">

            <table class="products-table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>CATEGORY</th>
                        <th>TOTAL VALUE</th>
                        <th>CREATED DATE</th>
                        <th>STATUS</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <!-- ID -->
                            <td>
                                <span class="product-id">
                                    #{{ $product->id }}
                                </span>
                            </td>


                            <!-- NAME -->
                            <td>
                                <div class="product-name">
                                    <div class="product-avatar">
                                        {{ strtoupper(substr($product->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <strong>
                                            {{ $product->name }}
                                        </strong>

                                        <small>
                                            Learning Resource
                                        </small>
                                    </div>
                                </div>
                            </td>


                            <!-- PRICE -->
                            <td>
                                <span class="price">
                                    ₱{{ number_format($product->price, 2) }}
                                </span>
                            </td>


                            <!-- QUANTITY -->
                            <td>
                                <span class="quantity">
                                    {{ $product->quantity }}
                                </span>
                            </td>


                            <!-- CATEGORY -->
                            <td>
                                <span class="category-badge">
                                    {{ $product->category }}
                                </span>
                            </td>


                            <!-- TOTAL VALUE -->
                            <td>
                                <strong class="total-value">
                                    ₱{{ number_format($product->price * $product->quantity, 2) }}
                                </strong>
                            </td>


                            <!-- CREATED DATE -->
                            <td>
                                <span class="created-date">
                                    {{ \Carbon\Carbon::parse($product->created_date)->format('M d, Y') }}
                                </span>
                            </td>


                            <!-- STATUS -->
                            <td>

                                @if($product->quantity == 0)

                                    <span class="status status-out">
                                        <span class="status-dot"></span>
                                        Out of Stock
                                    </span>

                                @elseif($product->quantity < 10)

                                    <span class="status status-low">
                                        <span class="status-dot"></span>
                                        Low Stock
                                    </span>

                                @else

                                    <span class="status status-in">
                                        <span class="status-dot"></span>
                                        In Stock
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8">

                                <div class="empty-table">

                                    <div class="empty-icon">
                                        —
                                    </div>

                                    <h3>
                                        No products available
                                    </h3>

                                    <p>
                                        There are currently no products
                                        in the inventory.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- TABLE FOOTER -->
        @if($products->count() > 0)

            <div class="data-table-footer">

                <p>
                    Showing
                    <strong>{{ $products->count() }}</strong>
                    {{ $products->count() === 1 ? 'product' : 'products' }}
                </p>

                <p>
                    Updated
                    <strong>{{ now()->format('M d, Y') }}</strong>
                </p>

            </div>

        @endif

    </div>

</div>

@endsection