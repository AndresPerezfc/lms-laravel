<div>
    <form wire:submit="store">

        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nueva sección
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la sección" />

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar sección
                </x-button>
            </div>
        </div>

    </form>
</div>
