<?php

namespace App\Livewire;

use Livewire\Component;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class Checkout extends Component
{
    public function render()
    {
        $cart = session()->get('cart', []);

        return view('livewire.checkout', [
            'cart' => $cart,
        ]);
    }

    public function createCheckoutSession()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = session()->get('cart', []);

        $lineItems = [];
        foreach ($cart as $id => $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($session->url);
    }
}
