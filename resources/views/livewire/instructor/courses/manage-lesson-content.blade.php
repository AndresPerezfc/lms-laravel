<div>

    @if ($editVideo)
        <div>
            Está por editar el video
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
