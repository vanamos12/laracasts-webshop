<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class StoreFront extends Component
{
    use WithPagination;
    
    public function getProductsProperty(){
        
        return Product::query()->paginate(1);
    }
    
    public function render()
    {
        return view('livewire.store-front');
    }
}
