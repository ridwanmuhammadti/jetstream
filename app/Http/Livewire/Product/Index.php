<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    
    public function storeProduct($product)
    {

    }

    protected $listeners = ['storeProduct'];


    public function render()
    {
        $products = Product::all();
        return view('livewire.product.index',compact('products'));
    }
}
