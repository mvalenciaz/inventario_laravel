<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 my-4">
        <p>
            {{ $product->nombre }} <span class="bg-slate-600 py-1 px-2 rounded text-white">Cantidad:
                {{ $product->cantidad }}</span>
        </p>
        <x-jet-button class="my-3" wire:click="$toggle('openModal')">
            Registrar moviento
        </x-jet-button>
    </div>

    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Registrar movimiento de invetario
        </x-slot>

        <x-slot name="content">
            <div class="my-1 p-2">
                <x-jet-label>Cantidad</x-jet-label>
                <x-jet-input type="number" wire:model='cantidad' wire:change='updatePrice' />
            </div>
            <div class="my-1 p-2">
                <span
                    class="px-2 py-1 mx-1 border border-dotted rounded-full border-green-700 cursor-pointer @if ($tipo_movimiento == 'entrada') {{ 'bg-green-700 text-white' }} @endif"
                    wire:click="toggleMoviento">
                    Entrada
                </span>
                <span
                    class="px-2 py-1 mx-1 border border-dotted rounded-full border-red-700 cursor-pointer @if ($tipo_movimiento == 'salida') {{ 'bg-red-700 text-white' }} @endif"
                    wire:click="toggleMoviento">
                    Salida
                </span>
            </div>
            @if ($tipo_movimiento == 'salida')
                <div class="my-1 p-2">
                    <p>Pecio movimiento: {{ $precio_movimiento }}</p>
                </div>
            @endif
            <p class="text-red-600">{{$msg}}</p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('openModal')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                Guardar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
