<div>

    @push('css')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @endpush

    <h1 class="text-2xl font-semibold">
        Video Promocional
    </h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            @if ($course->video_path)
            <div wire:ignore>
                <div x-data x-init="
                let player= new Plyr($refs.player);
            ">
                <video x-ref="player" playsinline controls data-poster="{{ $course->image }}" class="aspect-video object-cover" >
                    <source src="{{Storage::url($course->video_path)}}" type="video/mp4">
                </video> 
            </div>
            </div>
            @else
                <figure>
                    <img class="w-full aspect-video object-cover" src="{{ $course->image }}" alt="{{ $course->title }}">
                </figure>
            @endif
        </div>
        <div class="col-span-1">
            <form wire:submit="save">
                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

    @push('js')
        <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
        
    @endpush

</div>
