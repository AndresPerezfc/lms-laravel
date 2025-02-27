<div>

    <div x-data="{
        open: @entangle('lessonCreate.open'),
        platform: @entangle('lessonCreate.platform')
    
    }">
    
    <div x-on:click="open = !open"
        class="h-6 w-12 -ml-4 bg-indigo-200 hover:bg-indigo-300 flex items-center justify-center cursor-pointer"
        style="clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 0 51%, 0% 0%);">

        <i class="-ml-2 text-sm fas fa-plus transition duration-300"
            :class="{
                'transform rotate-45': open,
                'transform rotate-0': !open
            }"></i>
    </div>

    <form wire:submit="store" class="mt-4 bg-white rounded-lg shadow-lg">
        <div class="p-6">
            <div class="mb-2">
                <x-input wire:model="lessonCreate.name" placeholder="Ingrese el nombre de la lección" class="w-full" />

                <x-input-error for="lessonCreate.name" />
            </div>

            <div>
                <x-label>
                    Plataformas
                </x-label>
            </div>
        </div>
    </form>

    </div>
    
</div>
