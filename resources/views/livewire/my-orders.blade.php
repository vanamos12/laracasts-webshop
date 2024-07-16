<div>
    <x-panel class="mt-12 max-w-lg mx-auto" title="My Orders">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Order Id</th>
                <th class="text-left">Ordered at</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->orders as $item)
            <tr>
                <td>
                <a href="{{route('view-order', $item->id)}}" class="underline font-medium"> #{{ $item->id }} </a>
                </td>
                <td>{{ $item->created_at->diffForHumans() }}</td>
                <td>{{ $item->amount_total}}</td>
                
                
            </tr>
            @endforeach
        </tbody>
       
    </table>
</x-panel>
</div>
