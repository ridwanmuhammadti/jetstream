<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{

    public $name_product;
    public $code_product;
    public $price;

    protected $rules = [
        'name_product' => 'required|min:6',
        'code_product' => 'required|min:6',
        'price' => 'required'
    ];

    protected $messages = [
        'name_product.required' => 'Nama Product harus diisi',
        'name_product.min:6' => 'Nama Product minimal 6 huruf',
        'code_product.required' => 'Code Product harus diisi',
        'price.required' => 'Price harus diisi',
        'code_product.min:6' => 'Code Product minimal 6 huruf',
    ];

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        $product = Product::create([
            'name_product' => $this->name_product,
            'code_product' => $this->code_product,
            'price' => $this->price
           
        ]);

        $this->emit('storeProduct', $product);

        $this->deleteInput();

        session()->flash('message', 'Product berhasil ditambahkan');
    }

    public function deleteInput(){
        $this->name_product = null;
        $this->code_product = null;
        $this->price = null;
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
