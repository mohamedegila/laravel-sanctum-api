<?php
namespace  App\Repository;

use App\Models\Product;
use App\Repository\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }


    public function formatAll($products){
       return  $products->map(function ($product) {
        $this->format($product);
        });
    }


    public function format($product){
        return [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'description'=>$product->description,
            'price' => $product->price,
            'created_at'=> $product->created_at->format('Y-m-d')
        ];
     }
}
