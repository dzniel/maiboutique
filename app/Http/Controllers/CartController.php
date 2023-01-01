<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * View user's cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return view('pages.cart', [
                'cart_items' => null,
                'total_price' => 0,
                'total_quantity' => 0
            ]);
        }

        $cart_items = Cart::where('user_id', $user->id)->get();

        $total_price = collect($cart_items)->reduce(function ($carry, $cart_item) {
            return $carry + $cart_item->product->price * $cart_item->quantity;
        });

        $total_quantity = collect($cart_items)->reduce(function ($carry, $cart_item) {
            return $carry + $cart_item->quantity;
        });

        $cart_items = Cart::paginate(8);

        return view('pages.cart', [
            'cart_items' => $cart_items,
            'total_price' => $total_price,
            'total_quantity' => $total_quantity
        ]);
    }

    /**
     * Store a specified product into user's cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $user_id = Auth::user()->id;
        $product = Product::find($product_id);

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:'.$product->stock]
        ]);

        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cart)
        {
            Cart::where('user_id', $user_id)->where('product_id', $cart->product_id)->update([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => $cart->quantity + $request->quantity
            ]);
        }
        else
        {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
        }

        Product::where('id', $product->id)->update([
            'stock' => $product->stock - $request->quantity
        ]);

        return redirect(route('cart'));
    }

    /**
     * View the edit cart page.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $product = Product::find($cart->product_id);

        return view('pages.edit.cart', [
            'product' => $product,
            'cart' => $cart
        ]);
    }

    /**
     * Update user's cart as requested.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $product = Product::find($cart->product_id);

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:'.$product->stock + $cart->quantity]
        ]);

        Cart::where('id', $cart->id)->update(['quantity' => $request->quantity]);

        Product::where('id', $product->id)->update([
            'stock' => $product->stock + $cart->quantity - $request->quantity
        ]);

        return redirect(route('cart'));
    }

    /**
     * Remove a product from user's cart.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Product::where('id', $cart->product_id)->update([
            'stock' => $cart->product->stock + $cart->quantity
        ]);

        Cart::where('id', $cart->id)->delete();

        return redirect(route('cart'));
    }

    /**
     * Checkout the user's cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $user = Auth::user();
        $cart_items = Cart::where('user_id', $user->id)->get();

        if ($cart_items)
        {
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'date' => date('Y-m-d H:i:s')
            ]);

            foreach ($cart_items as $item)
            {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity
                ]);
            }

            Cart::where('user_id', $user->id)->delete();
        }

        return redirect(route('history'));
    }
}
