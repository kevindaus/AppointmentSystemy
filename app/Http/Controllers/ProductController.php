<?php

namespace App\Http\Controllers;

use App\Forms\CreateProductForm;
use App\Forms\StaffForm;
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
    public function create(FormBuilder $formBuilder)
    {
        $createProductForm = $formBuilder->create(CreateProductForm::class, [
            'method' => 'POST',
            'enctype' => "multipart/form-data",
            'url' => route('products.store')
        ]);

        return view('products.create')->with(compact('createProductForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => ' ',
            'type' => 'required',
            'picture' => 'required|file',
            'specification' => ' '
        ]);

        $uploadedFile = $validatedData['picture'];
        $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->move(storage_path("app/public"), $uploadedFile->getClientOriginalName());
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->type = $validatedData['type'];
        $product->specification = $validatedData['specification'];
        $product->picture = $fileName;
        $product->save();

        return redirect(url()->previous())->with(['status' => 'Product created']);
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
        $validatedData = $request->validate([
            "name" => "required",
            "description" => " ",
            "price" => " ",
            "type" => "required",
            "picture" => "file",
            "specification" => " ",
            "created_at" => " ",
            "updated_at" => " ",
        ]);
        if (isset($validatedData['picture'])) {
            $uploadedFile = $validatedData['picture'];
            $fileName = $uploadedFile->getClientOriginalName();
            $uploadedFile->move(storage_path("app/public"), $uploadedFile->getClientOriginalName());
            $product->picture = $fileName;
        }
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->type = $validatedData['type'];
        $product->specification = $validatedData['specification'];
        $product->price = $validatedData['price'];
        $product->save();

        return redirect(url()->previous())->with(['status' => 'Product information updated']);


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
