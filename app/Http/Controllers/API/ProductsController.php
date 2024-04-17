<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function import()
    {
        return $this->productService->import();
    }

    public function index()
    {
        return $this->productService->getAllProducts();
    }

    public function show($code)
    {
        return $this->productService->getProductByCode($code);
    }

    public function update(Request $request, $code)
    {
        return $this->productService->updateProduct($code, $request->all());
    }

    public function destroy($code)
    {
        return $this->productService->deleteProduct($code);
    }
}
