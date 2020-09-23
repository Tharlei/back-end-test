<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Mail\CreatedProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all('id', 'name', 'price', 'sku');

        foreach ($products as $product) {
            $product->price = floatval($product->price);
            $product->price = "R$ " . number_format($product->price, 2, ',', '.');
        }

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = Product::create($request->all());

        Mail::to('ti@focusconcursos.com')->send(new CreatedProduct($product));

        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (empty($product))
            return response()->json('', 404);

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (empty($product))
            return response()->json('', 404);

        $product->fill($request->all());
        $product->update();

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (empty($product))
            return response()->json('', 404);

        $product->delete();

        return response()->json('', 200);
    }
}
