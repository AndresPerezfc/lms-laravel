<div>

    <div class="mb-6">
        <ul class="space-y-4">
            @foreach ($lessons as $lesson)
                <li wire:key="lesson-{{ $lesson->id }}">
                    <div class="bg-white rounded-lg shadow-lg px-6 py-4">
                       <div class="md:flex md:items-center">
                        <h1 class="md:flex-1 truncate cursor-move">
                            <i class="fas fa-play-circle text-blue-600"></i>
                            {{ $lesson->name }}
                        </h1>

                            <div class="space-x-3 md:shrink-0 md:ml-4">
                                <button>
                                    <i class="fas fa-edit hover:text-indigo-600"></i>
                                </button>
                        
                                <button>
                                    <i class="far fa-trash-alt hover:text-red-500"></i>
                                </button>

                                <button>
                                    <i class="fas fa-chevron-down hover:text-blue-600"></i>
                                </button>

                            </div>
                       </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Creación --}}
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

        <form wire:submit="store" class="mt-4 bg-white rounded-lg shadow-lg" x-show="open" x-cloak>
            <div class="p-6">
                <div class="mb-2">
                    <x-input wire:model="lessonCreate.name" placeholder="Ingrese el nombre de la lección"
                        class="w-full" />

                    <x-input-error for="lessonCreate.name" />
                </div>

                <div>
                    <x-label>
                        Plataformas
                    </x-label>

                    <div class="md:flex md:items-center md:space-x-4 space-y-4 md:space-y-0">
                        <div class="md:flex md:items-center md:space-x-4 md:space-y-0">
                            <button type="button"
                                class="inline-flex flex-col justify-center w-full md:w-20 h-24 border rounded"
                                :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                                x-on:click="platform = 1">
                                <i class="fa fa-video text-2xl"></i>
                                <span class="text-sm mt-2">
                                    Video
                                </span>
                            </button>

                            <button type="button"
                                class="inline-flex flex-col justify-center w-full md:w-20 h-24 border rounded"
                                :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'"
                                x-on:click="platform = 2">
                                <i class="fab fa-youtube text-2xl"></i>
                                <span class="text-sm mt-2">
                                    Youtube
                                </span>
                            </button>
                        </div>

                        <p>
                            Primero debes elegir una plataforma para subir un contenido
                        </p>

                    </div>

                    <div class="mt-2" x-show="platform == 1" x-cloak>
                        <x-label>
                            Video
                        </x-label>

                        <x-progress-indicators wire:model="video" />
                    </div>

                    <div class="mt-2" x-show="platform == 2" x-cloak>
                        <x-label>
                            Video
                        </x-label>

                        <x-input wire:model="url" class="w-full" placeholder="Ingrese la URL de youtube" />
                    </div>



                </div>
            </div>

            <div class="flex justify-end px-6 py-4 bg-gray-100">
                <x-danger-button x-on:click="open = false">Cancelar</x-danger-button>
                <x-button class="ml-2">Guardar</x-button>
            </div>
        </form>

    </div>

</div>
