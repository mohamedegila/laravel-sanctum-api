<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repository\ProductRepository;


class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allProducts = $this->productRepository->all();
        $allProducts = $this->productRepository->formatAll($allProducts);


        return response()->json(['message' => 'success','data'=>$allProducts]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        $product = $this->productRepository->format($product);
        return response()->json(['message' => 'success','data'=>$product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\v1\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        $product = $this->productRepository->format($product);
        return response()->json(['message' => 'success','data'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\v1\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\v1\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\v1\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->destroy($id);
        return response()->json(['message' => 'success','data'=>$product]);
    }
}
