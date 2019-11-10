<?php

namespace App\Http\Controllers;

use App\Forms\UpdateProductForm;
use App\Forms\UpdateStaffForm;
use App\Product;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::all();
        return view('products.index')->with(compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productDetails = $product->toArray();
        unset($productDetails['id']);
        unset($productDetails['picture']);

        return view('products.show')->with(compact('product', 'productDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, FormBuilder $formBuilder)
    {
        $updateProductForm = $formBuilder->create(UpdateProductForm::class, [
            'method' => 'POST',
            'model' => $product,
            'url' => route('products.update', ['product' => $product])
        ]);

        return view('products.edit')->with(compact('product', 'updateProductForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "id"=> "",
            "name"=> "required",
            "description"=> "",
            "type"=> "required",
            "picture"=> "",
            "specification"=> "",
            "created_at"=> "",
            "updated_at"=> "",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->forceDelete();
        return redirect(url()->previous());
    }
}
