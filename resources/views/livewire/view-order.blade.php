<div class="grid grid-cols-2 gap-4">
<x-panel class="mt-12 col-span-2" title="Your Order #{{ $this->order->id  }}">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Price</th>
                <th class="text-left">Quantity</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->order->items as $item)
            <tr>
                <td>{{ $item->name }} <br/>
                    {{ $item->description }}
                </td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity}}</td>
                
                <td class="text-right">{{ $item->amount_total }} 
                </td>   
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            @if($this->order->amount_shipping->isPositive())
            <tr>
                <td colspan="3" class="text-right font-medium">Shipping costs</td>
                <td class="font-medium text-right">{{ $this->order->amount_shippping }}</td>
            </tr>
            @endif
             @if($this->order->amount_discount->isPositive())
            <tr>
                <td colspan="3" class="text-right font-medium">Discount costs</td>
                <td class="font-medium text-right">{{ $this->order->amount_discount }}</td>
            </tr>
            @endif
             @if($this->order->amount_tax->isPositive())
            <tr>
                <td colspan="3" class="text-right font-medium">Tax costs</td>
                <td class="font-medium text-right">{{ $this->order->amount_tax }}</td>
            </tr>
            @endif
            @if($this->order->amount_subtotal->isPositive())
             <tr>
                <td colspan="3" class="text-right font-medium">SubTotal</td>
                <td class="font-medium text-right">{{ $this->order->amount_subtotal }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="3" class="text-right font-medium">Total</td>
                <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
            </tr>
        </tfoot>
    </table>
</x-panel>
<x-panel class=" col-span-1" title="Billing Informations">
    @foreach($this->order->billing_address->filter() as $value)
    {{ $value }} <br/>
    @endforeach
</x-panel>
<x-panel class="col-span-1" title="Shipping Informations">
    @foreach($this->order->shipping_address->filter() as $value)
    {{ $value }} <br/>
    @endforeach
</x-panel>
</div>
