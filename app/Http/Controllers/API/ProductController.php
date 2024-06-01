<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   // API methods
   public function apiIndex()
   {
       $products = Product::all();
       return response()->json($products);
   }

   public function apiShow($id)
   {
       $product = Product::findOrFail($id);
       return response()->json($product);
   }

   public function apiStore(Request $request)
   {
       $product = Product::create($request->all());
       return response()->json($product, 201);
   }

   public function apiUpdate(Request $request, $id)
   {
       $product = Product::findOrFail($id);
       $product->update($request->all());
       return response()->json($product);
   }

   public function apiDestroy($id)
   {
       $product = Product::findOrFail($id);
       $product->delete();
       return response()->json(null, 204);
   }
   public function apiSearch(Request $request)
   {
    $query = $request->input('query');

    $products = Product::where('title', 'like', "%$query%")->get();

    return response()->json($products);
    }

}
