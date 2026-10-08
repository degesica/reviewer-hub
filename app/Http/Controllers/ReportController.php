<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Get all products for the table
        $products = Product::orderBy('created_date', 'desc')->get();

        // Get data for charts
        $categoryData = Product::select(
            'category',
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('category')
            ->get();

        $priceRangeData = Product::select(
            DB::raw('CASE
                WHEN price < 50 THEN "Under $50"
                WHEN price BETWEEN 50 AND 200 THEN "$50 - $200"
                WHEN price BETWEEN 201 AND 500 THEN "$201 - $500"
                ELSE "Over $500"
            END as price_range'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('price_range')
            ->get();

        $monthlySales = Product::select(
            DB::raw("strftime('%m', created_date) as month"),
            DB::raw('SUM(price * quantity) as total_sales')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('reports', compact(
            'products',
            'categoryData',
            'priceRangeData',
            'monthlySales'
        ));
    }

    public function dataTable()
    {
        $products = Product::orderBy('created_date', 'desc')->get();

        return view('data-table', compact('products'));
    }
}
