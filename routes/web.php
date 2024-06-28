<?php

use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductList::class)->name('products.index');

Route::get('/cart', Cart::class)->name('cart.index');

Route::get('/success', function() {
  return view('success');
})->name('success');

Route::get('/cancel', function() {
  return view('cancel');
})->name('cancel');

Route::get('/checkout', Checkout::class)->name('checkout');
