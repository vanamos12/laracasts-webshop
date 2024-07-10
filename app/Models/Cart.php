<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Money\Currency;
use Money\Money;

class Cart extends Model
{
    use HasFactory;
    public function total():Attribute{
        return Attribute::make(
            get: function(){
                return $this->items->reduce(function(Money $total, Cartitem $item){
                    return $total->add($item->subTotal);
                }, new Money(0, new Currency('USD')));
            }
        ); 
    }
    public function items() : HasMany{
        return $this->hasMany(CartItem::class);
    }
}
