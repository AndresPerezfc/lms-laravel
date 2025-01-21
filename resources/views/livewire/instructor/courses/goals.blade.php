<div>

    @if (count($goals) > 0)
    <ul class="space-y-2 mb-4">
        @foreach ($goals as $index => $goal)
            <li wire:key="goal-{{ $goal['id'] }}">

                <div class="flex">
                    <x-input wire:model="goals.{{ $index }}.name" class="flex-1 rounded-r-none" />

                    <div class="border border-l-0 border-gray-300">
                        <div class="flex item-center h-full">
                            <button onClick="destroyGoal({{ $goal['id'] }})" class="px-2 hover:text-red-500">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            Actualizar
        </x-button>
    </div>
        
    @endif

    <form wire:submit="store">

        <div class="bg-gray-100 rounded-lg shadow-lg p-6">
            <x-label>
                Nueva meta
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese nombre de la meta" />

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar meta
                </x-button>
            </div>
        </div>

    </form>

    @push('js')
        <script>
            function destroyGoal(id) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir esta acción",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Meta eliminada",
                            text: "Se ha eliminado exitosamente",
                            icon: "success"
                        });

                        @this.call('destroy', id);
                    }
                });
            }
        </script>
    @endpush
</div>
