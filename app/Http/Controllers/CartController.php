<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart;
use \Binafy\LaravelCart\Models\CartItem;

class CartController extends Controller
{
    private $cart;

    public function __construct()
    {
        $this->cart = Cart::query()->firstOrCreate(['user_id' => auth()->guard('customer')->user()->id]);
    }

    public function add(Request $request)
    {
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Invalid input data.')
                ->withErrors($validator)
                ->withInput();
        }

        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Check if the product is available
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Insufficient stock for this product.');
        }

        $cartItem = new CartItem([
            'itemable_id'   => $product->id,
            'itemable_type' => $product::class,
            'quantity'      => $request->quantity,
        ]);

        $this->cart->items()->save($cartItem);

        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    public function remove($id)
    {

        $item = CartItem::where('id', $id)
            ->where('cart_id', $this->cart->id)
            ->firstOrFail();

        $item->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function update($id, Request $request)
    {

        $item = CartItem::where('id', $id)
            ->where('cart_id', $this->cart->id)
            ->firstOrFail();

        if ($request->action === 'increase') {
            $item->quantity += 1;
        } elseif ($request->action === 'decrease' && $item->quantity > 1) {
            $item->quantity -= 1;
        }

        $item->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }
}
