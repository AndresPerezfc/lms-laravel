<div>
    <h1 class="text-2xl font-semibold">
        Video Promocional
    </h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
            <video controls class="aspect-video object-cover">
                <source src="{{Storage::url($course->video_path)}}" type="video/mp4">
            </video> 
            @else
                <figure>
                    <img class="w-full aspect-video object-cover" src="{{ $course->image }}" alt="{{ $course->title }}">
                </figure>
            @endif
        </div>
        <div class="col-span-1">
            <form wire:submit="save">
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit fuga tempore quisquam,
                    nisi pariatur
                    consectetur? Illo vitae autem, beatae esse sapiente repudiandae voluptates rerum similique? Quaerat
                    similique fugit perspiciatis cupiditate?</p>
    
                <x-progress-indicators wire:model="video" />
    
                <div class="flex justify-end mt-4">
                    <x-button>
                        Subir Video
                    </x-button>
                </div>
            </form>

        </div>
    </div>

</div>
