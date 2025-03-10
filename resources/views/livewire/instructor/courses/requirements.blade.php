<div>

    @if (count($requirements) > 0)
        <ul class="space-y-2 mb-4" id="requirements">
            @foreach ($requirements as $index => $requirement)
                <li wire:key="requirement-{{ $index  }}" data-id="{{$requirement['id']}}">

                    <div class="flex">
                        <x-input wire:model="requirements.{{ $index }}.name" class="flex-1 rounded-r-none" />

                        <div class="flex border border-l-0 border-gray-300 divide-x divide-gray-300 rounded-r">

                            <button onClick="destroyRequirement({{ $requirement['id'] }})" class="px-2 hover:text-red-500">
                                <i class="far fa-trash-alt"></i>
                            </button>

                            <div class="flex items-center px-2 cursor-move">
                                <i class="fas fa-bars"></i>
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
                Nuevo requisito
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese un nuevo requisito" />

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar requisito
                </x-button>
            </div>
        </div>

    </form>

    @push('js')
        <script src="
            https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js
            "></script>


        <script>
            const requirements = document.getElementById('requirements');
            new Sortable(requirements, {
                animation: 150,
                store:{
                    set: (sortable) =>{
                        @this.call('sortRequirements', sortable.toArray());
                    }
                }
            });
        </script>

        <script>
            function destroyRequirement(id) {
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
                            title: "Requisito eliminado",
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
