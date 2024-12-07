<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function index()
    {
        $cart = Redis::hgetall('cart:' . auth()->id());
        $total = 0;

        foreach ($cart as $item => $quantity) {
            $price = Redis::hget('cart_prices:' . auth()->id(), $item);
            $total += $price * $quantity;
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $item = $request->input('item');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);

        Redis::hincrby('cart:' . auth()->id(), $item, $quantity);
        Redis::hset('cart_names:' . auth()->id(), $item, $name);
        Redis::hset('cart_prices:' . auth()->id(), $item, $price);

        return back()->with('success', 'Item added to cart!');
    }

    public function increase(Request $request, $item)
    {
        Redis::hincrby('cart:' . auth()->id(), $item, 1);
        return redirect()->route('cart.index');
    }

    public function decrease(Request $request, $item)
    {
        $quantity = Redis::hget('cart:' . auth()->id(), $item);
        if ($quantity > 1) {
            Redis::hincrby('cart:' . auth()->id(), $item, -1);
        } else {
            Redis::hdel('cart:' . auth()->id(), $item);
            Redis::hdel('cart_names:' . auth()->id(), $item);
            Redis::hdel('cart_prices:' . auth()->id(), $item);
        }
        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $item)
    {
        Redis::hdel('cart:' . auth()->id(), $item);
        Redis::hdel('cart_names:' . auth()->id(), $item);
        Redis::hdel('cart_prices:' . auth()->id(), $item);
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}