<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function products(): JsonResponse
    {
        return response()->json(Product::cursor());
    }
    public function product(int $id): JsonResponse
    {
        return response()->json(Product::findOrFail($id));
    }
}
