<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get_products()
    {
        // Get All products
        return response()->json([
            "status" => "success",
            "data" => Product::all()
        ]);
    }
    public function add_product(Request $request)
    {
        $user_role = auth()->user()->user_role;
        // If user is a seller
        if ($user_role == 1) {
            $user_id = ["user_id" => auth()->user()->id];
            $request->merge($user_id);
            $product = Product::create($request->all());
            return response()->json([
                "status" => "success",
                "data" => $product
            ]);
        }
    }

    public function update_product(Request $request, $id)
    {
        $user_role = auth()->user()->user_role;
        // If user is a seller
        if ($user_role == 1) {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    "status" => "error",
                    "message" => "Product not found"
                ]);
            }
            $product->update($request->all());
            return response()->json([
                "status" => "success",
                "data" => $product
            ]);
        }
    }
    public function delete_product(Request $request, $id)
    {
        $user_role = auth()->user()->user_role;
        // If user is a seller
        if ($user_role == 1) {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    "status" => "error",
                    "message" => "Product not found"
                ]);
            }
            $product->delete();
            return response()->json([
                "status" => "success",
                "message" => "Product deleted"
            ]);
        }
    }
}
