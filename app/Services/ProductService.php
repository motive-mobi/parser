<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

use App\Models\Product;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAllProducts()
    {
        return $this->product->paginate(10);
    }

    public function getProductByCode($code)
    {
        return $this->product->where('code', $code)->first();
    }

    public function updateProduct($code, $data)
    {
        $product = $this->getProductByCode($code);
        if ( $product )
        {
            return $product->update($data);
        }
        return null;
    }

    public function deleteProduct($code)
    {
        $product = $this->getProductByCode($code);
        if ( $product )
        {
            return $product->delete();
        }
        return null;
    }
}