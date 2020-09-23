<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id ?? 0;
        $name = $request->name ?? '';
        $products = Product::select('id', 'name', 'sku', 'price');

        if (!empty($request->id)) {
            $products = $products->where('id', $id);
        }

        if (!empty($request->name)) {
            $products = $products->orWhere('name', 'like', "%{$request->name}%");
        }

        $products = $products->get();

        return response()->json($products, 200);
    }
}
