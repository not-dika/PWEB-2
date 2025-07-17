<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Theme;
use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart;

class HomepageController extends Controller
{
    private $themeFolder;

    public function __construct()
    {
        $theme = Theme::where('status', 'active')->first();
        if ($theme) {
            $this->themeFolder = 'theme.' . $theme->folder;
        } else {
            $this->themeFolder = 'theme.default';
        }
    }

    public function index()
    {
        $categories = Categories::latest()->take(6)->get();
        $products   = Product::paginate(8);

        return view($this->themeFolder . '.homepage', [
            'categories' => $categories,
            'products'   => $products,
            'title'      => 'Homepage',
        ]);
    }

    public function products(Request $request)
    {
        $title = "Products";

        $query = Product::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(20);

        return view($this->themeFolder . '.products', [
            'title'    => $title,
            'products' => $products,
        ]);
    }

    public function product($slug)
    {
        $product = Product::whereSlug($slug)->first();

        if (! $product) {
            return abort(404);
        }

        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view($this->themeFolder . '.product', [
            'slug'            => $slug,
            'product'         => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function categories()
    {
        $categories = Categories::latest()->paginate(20);

        return view($this->themeFolder . '.categories', [
            'title'      => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function category($slug)
    {
        $category = Categories::whereSlug($slug)->first();

        if ($category) {
            $products = Product::where('product_category_id', $category->id)->paginate(20);

            return view($this->themeFolder . '.category_by_slug', [
                'slug'     => $slug,
                'category' => $category,
                'products' => $products,
            ]);
        } else {
            return abort(404);
        }
    }

    public function cart()
    {
        if (! auth()->guard('customer')->check()) {
            return redirect()->route('customer.login');
        }
        $cart = Cart::query()
            ->with(
                [
                    'items',
                    'items.itemable',
                ]
            )
            ->where('user_id', auth()->guard('customer')->user()->id)
            ->first();

        return view($this->themeFolder . '.cart', [
            'title' => 'Cart',
            'cart'  => $cart,
        ]);

    }

    public function checkout()
    {
        $user = auth()->guard('customer')->user();
        $cart = \Binafy\LaravelCart\Models\Cart::firstOrCreate(['user_id' => $user->id]);

        $items = $cart->items;

        // Manually calculate subtotal
        $subtotal = $items->reduce(function ($carry, $item) {
            return $carry + ($item->itemable->price * $item->quantity);
        }, 0);

        $shipping = ($subtotal >= 1000000) ? 0 : 25000;

        $total = $subtotal + $shipping;

        return view($this->themeFolder . '.checkout', [
            'title'    => 'Checkout',
            'items'    => $items,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total'    => $total,
        ]);
    }
}
