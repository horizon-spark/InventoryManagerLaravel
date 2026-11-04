<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        // Active Record: статический вызов на модели, без EntityManager/репозитория
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $categories,
        ]);
    }
}