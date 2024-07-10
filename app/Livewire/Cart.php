<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    public function getItemsProperty(){
        return CartFactory::make()->items;
    }

    public function delete($itemId){
        CartFactory::make()->items()->where('id', $itemId)->delete();
        $this->dispatch('productRemovedFromCart');
    }

    public function increment($itemId){
        CartFactory::make()->items()->where('id', $itemId)?->increment('quantity');
        $this->dispatch('quantityUpdatedInCart');
    }

    public function decrement($itemId){
       $item =  CartFactory::make()->items()->find( $itemId);
       if ($item->quantity > 1){
            $item->decrement('quantity');
            $this->dispatch('quantityUpdatedInCart');
       }else{
        $this->delete($itemId);
       }

    }
    
    public function render()
    {
        return view('livewire.cart');
    }
}
