<?php

namespace Tests\Feature;

use App\DTO\ProductData;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_creates_product(): void
    {
        $data = ProductData::fromArray([
            'name' => 'Телефон',
            'description' => 'Новый телефон',
            'price' => 599900,
        ]);

        $service = app(ProductService::class);

        $product = $service->create($data);

        $this->assertInstanceOf(Product::class, $product);

        $this->assertDatabaseHas('products', [
            'name' => 'Телефон',
            'description' => 'Новый телефон',
            'price' => 599900,
        ]);
    }

    public function test_service_returns_all_products(): void
    {

        $service = app(ProductService::class);

        $service->create(ProductData::fromArray([
            'name' => 'Телефон',
            'description' => 'Описание телефона',
            'price' => 599900,
        ]),
        );

        $service->create(
            ProductData::fromArray([
                'name' => 'Ноутбук',
                'description' => 'Описание ноутбука',
                'price' => 12000000,
            ]),
        );

        $products = $service->getAll();

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products->first());
    }

    public function test_service_updates_product(): void
    {
        // Arrange
        $service = app(ProductService::class);

        $product = $service->create(
            ProductData::fromArray([
                'name' => 'Телефон',
                'description' => 'Старое описание',
                'price' => 599900,
            ]),
        );

        $newData = ProductData::fromArray([
            'name' => 'Ноутбук',
            'description' => 'Новое описание',
            'price' => 12000000,
        ]);

        // Act
        $updatedProduct = $service->update($product, $newData);

        // Assert
        $this->assertSame($product->id, $updatedProduct->id);
        $this->assertSame('Ноутбук', $updatedProduct->name);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Ноутбук',
            'description' => 'Новое описание',
            'price' => 12000000,
        ]);

        $this->assertDatabaseCount('products', 1);
    }
}
