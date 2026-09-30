<?php

namespace App\Http\Controllers;

use App\DTO\ProductData;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
    ) {}

    public function index(): JsonResponse
    {
        $products = $this->productService->getAll();

        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $data = ProductData::fromArray($request->validated());

        $product = $this->productService->create($data);

        return response()->json($product, 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $data = ProductData::fromArray($request->validated());

        $product = $this->productService->update($product, $data);

        return response()->json($product);
    }

    public function destroy(Product $product): Response
    {
        $this->productService->delete($product);

        return response()->noContent();
    }
}
