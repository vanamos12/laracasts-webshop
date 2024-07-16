@component('mail::message')

Hey {{ $order->user->name }},

Thank you for your order, you can find all the details below.

@component('mail::table')
    | Item                         |Price                 |Quantity         |Tax            |Total                 |
    |:-----------------------------|---------------------:|----------------:|--------------:|---------------------:|
    @foreach ($order->items as $item)
    |**{{ $item->name }}**<br/> {{ $item->description}}|{{ $item->price }}|{{ $item->quantity }}|{{ $item->amount_tax }}|{{ $item->amount_total }}|
    @endforeach
    @if($order->amount_shipping->isPositive())
    | | | | **Shipping costs**|{{ $order->amount_shipping }}|
    @endif
    @if($order->amount_discount->isPositive())
    | | | | **Discount costs**|{{ $order->amount_discount }}|
    @endif
    @if($order->amount_tax->isPositive())
    | | | | **Tax costs**|{{ $order->amount_tax }}|
    @endif
    @if($order->amount_subtotal->isPositive())
    | | | | **SubTotal costs**|{{ $order->amount_subtotal }}|
    @endif
    
    | | | | **Total costs**|{{ $order->amount_total }}|
    
@endComponent

@component('mail::button', ['url'=>route('view-order', $order->id), 'color'=>'success'])
    View Order
@endcomponent
@endcomponent