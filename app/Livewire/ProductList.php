<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.product-list', [
            'products' => $products,
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id]))
        {
            $cart[$product->id]['quantity']++;
        }
        else
        {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return to_route('cart.index');
    }
}
