<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\ProductQuantity;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = [];

        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();

        $data['carts'] = $carts;

        $view = 'pages.cart';

        return response()->view($view, $data);
    }

    public function updateCart(Request $request)
    {
        $size           = $request->input('size');
        $cart_id        = $request->input('cart_id');
        $products_id    = $request->input('products_id');
        $quantity       = $request->input('quantity');

        if(ProductQuantity::where('products_id', $products_id)->where('size', $size)->where('quantity', '>=', $quantity)->exists())
        {
                $carts = Cart::where('id', $cart_id)->first();
                $carts->qty = $quantity;
                $carts->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully Add Quantity'
                ]);
        } 
        else 
        {
            return response()->json([
                'status' => 400,
                'message' => 'Sorry, not enough stock.'
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrfail($id);

        $cart->delete();

        return redirect()->route('cart');
    }
    
    public function success()
    {
        return view('pages.success');
    }
}
