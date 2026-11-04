<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        // Жадная загрузка связи category — прямой аналог join/прокси в Doctrine,
        // но здесь это делается явно методом with() (борьба с N+1)
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $products,
        ]);
    }
}