<div class="mt-12">
<div class="flex justify-between items-center">
    <h1 class="text-xl font-medium">Our products</h1>
    <div>
        <x-input wire:model.live.debounce="keywords" type="search" placeholder="Enter keywords" />
    </div>
</div>
<x-panel class="grid grid-cols-4 gap-4 mt-12 relative">
    @foreach($this->products as $product)
       <div class="bg-white rounded-lg shadow p-4 relative">
            <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ Storage::url($product->image->path)}}" alt="">
            <h2 class="font-medium text-lg">{{ $product->name }}</h2>
            <span class="text-gray-700 text-sm">{{ $product->price }}</span>
       </div>
    @endforeach
</x-panel>
<div class="mt-6">
    {{ $this->products->links()}}
</div>
</div>
