<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class StoreFront extends Component
{
    use WithPagination;

    #[Url()]
    public $keywords;
    
    public function getProductsProperty(){
        
        return Product::query()
            ->when($this->keywords, fn($query) => $query->where('name', 'like', "%$this->keywords%"))
            ->paginate(5);
    }
    
    public function render()
    {
        return view('livewire.store-front');
    }
}
