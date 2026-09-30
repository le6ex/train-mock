<?php

namespace App\Services;

use App\DTO\ProductData;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

final class ProductService
{
    public function getAll(): Collection
    {
        return Product::query()->get();
    }

    public function create(ProductData $data): Product
    {
        return Product::create([

            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price->kopecks(),

        ]);
    }

    public function update(Product $product, ProductData $data): Product
    {
        $product->update([

            'name' => $data->name,
            'description' => $data->description,
            'price' => $data->price->kopecks(),

        ]);

        return $product;
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
