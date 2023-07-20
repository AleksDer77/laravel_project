<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::query()->get();
    }

    public function store(Request $request)
    {
        $product = validator(
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


        if ($product->fails()) {
            return response([
                'status' => false,
                'errors' => $product->messages(),
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
}
