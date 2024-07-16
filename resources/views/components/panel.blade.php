@props(['title' => false ])
<div {{ $attributes->class(['bg-white rounded-lg shadow p-4 space-y-4']) }}>
    @if($title)
       <h2 class="font-medium text-xl">{{ $title }}</h2> 
    @endif
    {{ $slot }}
</div>