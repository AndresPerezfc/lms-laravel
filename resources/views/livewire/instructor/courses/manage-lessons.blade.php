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

                <div class="flex items-center space-x-4">
                    <button type="button" class="inline-flex flex-col justify-center w-20 h-24 border rounded" :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'" x-on:click="platform = 1"> 
                        <i class="fa fa-video text-2xl"></i> 
                        <span class="text-sm mt-2">
                            Video
                        </span>
                    </button>

                    <button type="button" class="inline-flex flex-col justify-center w-20 h-24 border rounded" :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'" x-on:click="platform = 2">
                        <i class="fab fa-youtube text-2xl"></i> 
                        <span class="text-sm mt-2">
                            Youtube
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>

    </div>
    
</div>
