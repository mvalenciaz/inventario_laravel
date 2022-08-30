<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('producto.store') }}" method="post">
                    @csrf
                    <div class="my-1 p-2">
                        <x-jet-label for="nombre">Nombre</x-jet-label>
                        <x-jet-input type="text" name="nombre" id="nombre" class="w-full"
                            value="{{ old('cantidad') }}" />
                    </div>
                    <div class="my-1 p-2">
                        <x-jet-label for="cantidad">Cantidad</x-jet-label>
                        <x-jet-input type="number" name="cantidad" id="cantidad" class="w-full"
                            value="{{ old('cantidad') }}" />
                    </div>
                    <div class="my-1 p-2">
                        <x-jet-label for="precio">Precio</x-jet-label>
                        <x-jet-input type="number" name="precio" id="precio" class="w-full" value="{{ old('precio') }}" />
                    </div>
                    <x-jet-button class="ml-2 my-3">Guardar
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" heigth="15px" width="15px"
                            fill="white" class="mx-1">
                            <path
                                d="M433.1 129.1l-83.9-83.9C342.3 38.32 327.1 32 316.1 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V163.9C448 152.9 441.7 137.7 433.1 129.1zM224 416c-35.34 0-64-28.66-64-64s28.66-64 64-64s64 28.66 64 64S259.3 416 224 416zM320 208C320 216.8 312.8 224 304 224h-224C71.16 224 64 216.8 64 208v-96C64 103.2 71.16 96 80 96h224C312.8 96 320 103.2 320 112V208z" />
                        </svg>
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
