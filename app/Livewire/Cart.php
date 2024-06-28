<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{   
    public function render()
    {
        $cart = session()->get('cart', []);

        return view('livewire.cart', [
            'cart' => $cart,
        ]);
    }
}
