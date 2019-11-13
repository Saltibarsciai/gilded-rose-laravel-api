<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function products()
    {
        return response()->json(Product::cursor());
    }
    public function product($id)
    {
        return response()->json(Product::findOrFail($id));
    }
}
