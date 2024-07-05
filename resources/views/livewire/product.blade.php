<div class="grid grid-cols-2 gap-10 mt-5">
    <div class="space-y-4" x-data="{ image: '{{ Storage::url($this->product->image->path) }}' }"">
        <div class="bg-white rounded-lg shadow p-5">
            <img x-bind:src="image" alt="" />
        </div>

        <div class="grid grid-cols-4 gap-4 mt-3">
            @foreach($this->product->images as $image)
                <div class="rounded bg-white p-2 shadow">
                    <img src="{{ Storage::url($image->path) }}" class="rounded" alt="" 
                        @click="image='{{ Storage::url($image->path) }}'"/>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>

        <div class="text-xl text-gray-700">{{ $this->product->price }}</div>

        <div class="mt-4">
            {{ $this->product->description }}
        </div>

        <div class="mt-4 space-y-4">
            <select name=""
                class="block w-full rounded-md border-0 py-1.15 pl-3 pr-10 test-gray-800"
            >
                @foreach ($this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            <x-button>Add to cart</x-button>

        </div>
    </div>
</div>
