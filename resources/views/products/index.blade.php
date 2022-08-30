<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($products as $product)
                <livewire:product-card :product="$product" :key="$product->id"/>
            @endforeach
        </div>
    </div>
</x-app-layout>