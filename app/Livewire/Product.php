<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product as ModelsProduct;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;

    public $productId;
    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount(){
        //$this->variant = $this->product->variants()->first()->id;
        $this->variant = $this->product->variants()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart){
        $this->validate();

        $cart->add(variantId: $this->variant);

        $this->banner('Your product has been added to your cart!');

        $this->dispatch('productAddedToCart');
    }

    public function getProductProperty(){
        return ModelsProduct::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
