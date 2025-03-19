<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller 
{
    public function checkout(Request $request) {
        $product = Product::findOrFail($request->product_id);
        return view('checkout', compact('product'));
    }

    public function process(Request $request) {
        return redirect()->route('catalog')->with('success', 'Order placed successfully!');
    }
}
