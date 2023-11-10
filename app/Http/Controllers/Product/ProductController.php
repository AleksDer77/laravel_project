<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::query()->get();
    }

    public function store(Request $request)
    {
        $validated = validator(
            [
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $request->image,
                'calories'    => $request->calories,
                'cost'        => $request->cost,
            ],
            [
                'name'        => ['required', 'string'],
                'description' => ['required', 'string'],
                'image'       => ['nullable', 'string'],
                'calories'    => ['required', 'integer'],
                'cost'        => ['required', 'integer'],
            ]
        );



        if ($validated->fails()) {
            return response([
                'status' => false,
                'errors' => $validated->messages(),
            ])->setStatusCode(422);
        }

        $product = Product::query()->create([
            'name'        => $request['name'],
            'description' => $request['description'],
            'img'         => $request['image'],
            'calories'    => $request['calories'],
            'cost'        => $request['cost'],
        ]);

        return response([
            "status" => true,
                        "product" => $product
        ])->setStatusCode(201, 'Product added');
    }

    public function show($id)
    {
        $product = Product::query()->get()->where('id', $id);
        dd($product->toArray());
    }

    public function update(Request $request, int $id)
    {
        $product = Product::query()->find($id);

        $product->created_at = $request->created_at;
        $product->cost = $request->cost;
        $product->name = $request->name;
        $product->description  = $request->description;
        $product->calories = $request->calories;
        $product->save();

    }
}
