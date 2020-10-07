<?php

namespace App\Http\Livewire\Product;

use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    public $paginate = 3;
    public $search;

    protected $queryString = ['search'];
    protected $listeners = ['storeProduct','newUpdateProduct'];

    public $updateProduct = false;

    public function getProduct($id){
        $this->updateProduct = true;
        $product = Product::find($id);
        // dd($product);
        $this->emit('updateProduct',$product);
    }

    public function storeProduct($product)
    {
        session()->flash('message', 'Product '. $product['name_product'] .' berhasil ditambahkan');
    }
    public function newUpdateProduct($product)
    {
        session()->flash('message', 'Product '. $product['name_product'] .' berhasil diupdated');
        $this->updateProduct = false;
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        // session()->flash('message', 'Product '. $product['name_product'] .' berhasil dihapus');
       
    }
    


    public function render()
    {
        $products = $this->paginate == null ? 
        Product::where('name_product', 'like', '%'.$this->search.'%')->
                orWhere('code_product', 'like', '%'.$this->search.'%')->
                orWhere('price', 'like', '%'.$this->search.'%')->orderBy('created_at','Desc')->paginate($this->paginate) :  
        Product::where('name_product', 'like', '%'.$this->search.'%')->orWhere('code_product', 'like', '%'.$this->search.'%')->
        orWhere('price', 'like', '%'.$this->search.'%')->orderBy('created_at','Desc')->paginate($this->paginate) ;
        // dd($products);
        return view('livewire.product.index',compact('products'));
    }
}
