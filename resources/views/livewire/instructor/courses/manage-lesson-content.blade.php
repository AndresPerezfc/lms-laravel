<div>

    @if ($editVideo)
        <div x-data="{
            platform: @entangle('platform'),
        }">
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

            <div class="flex justify-end space-x-2">
                <x-danger-button>
                    Cancelar
                </x-danger-button>

                <x-button wire:click="update">
                    Actualizar
                </x-button>
            </div>
        </div>
    @else
    <div>
        <h2 class="font-semibold text-lg mb-1">
            Video del curso
        </h2>
        
        <div>
        @if ($lesson->is_processed)
        
            <div class="md:flex md:items-center mb-2">
                <img src="{{$lesson->image}}" class="w-full md:w-20 aspect-video object-cover object-center" alt="{{$lesson->name}}">
    
                <p class="text-sm truncate md:flex-1 md:ml-4">
                    {{$lesson->video_original_name}}
                </p>
            </div>
    
            <x-button wire:click="$set('editVideo', true)">
                Video
            </x-button>
            
        @else

        <div>
            <table class="table-auto w-full">
                <thead class="border-b border-gray-200">
                    <tr class="font-bold">
                        <td class="px-4 py-2">Nombre del archivo</td>
                        <td class="px-4 py-2">Tipo</td>
                        <td class="px-4 py-2">Estado</td>
                        <td class="px-4 py-2">Fecha</td>
                    </tr>

                </thead>

                <tbody class="border-b border-gray-200">
                    <tr>
                        <td class="px-4 pxy-2">{{$lesson->video_original_name}}</td>
                        <td class="px-4 pxy-2">Video</td>
                        <td class="px-4 pxy-2">Procesando</td>
                        <td class="px-4 pxy-2">{{$lesson->created_at->format('d/m/Y')}}</td>
                    </tr>
                </tbody>
            </table>

            <p class="mt-2">
                El video se está procesando
            </p>
        </div>
        
        @endif
        
        </div>
        
    </div>
    @endif

    
</div>
