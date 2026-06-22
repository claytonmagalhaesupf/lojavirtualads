<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    /**
     * Display a listing of products for public view, with optional type filter.
     */
    public function index(Request $request)
    {
        $types = Type::all();

        $query = Product::query();

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->latest()->get();

        return view('welcome', [
            'products' => $products,
            'types' => $types,
            'selectedType' => $request->type_id,
        ]);
    }
}
