<x-instructor-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear curso
        </h2>
    </x-slot>

    <x-container class="mt-12" width="4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">


            <form action="{{route('instructor.courses.store')}}" method="POST">
                @csrf

                <h2 class="text-2xl uppercase text-center mb-4">Complete la siguiente información para crear un curso</h2>

                <div class="mb-4">
                    <x-label class="mb-2">
                        Nombre del curso
                    </x-label>
                    <x-input class="w-full" placeholder="Nombre del curso" name="title" value="{{old('title')}}" />
                </div>

                <div class="mb-4">
                    <x-label class="mb-2">
                        Slug
                    </x-label>
                    <x-input class="w-full" placeholder="Slug del curso" name="slug" value="{{old('slug')}}" />
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">

                    <div>
                        <x-label class="mb-1">
                            Categorías
                        </x-label>

                        <x-select class="w-full" name="category_id" id="">
                            @foreach ($categories as $category )
                            @selected(old('category_id') == $category->id)
                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                        </x-select>


                    </div>

                    <div>
                        <x-label class="mb-1">
                            Niveles
                        </x-label>
                        <x-select class="w-full" name="level_id" id="">
                            @foreach ($levels as $level )
                            @selected(old('level_id') == $level->id)
                            <option value="{{$level->id}}">{{$level->name}}</option>

                            @endforeach
                        </x-select>
                    </div>

                    <div>
                        <x-label class="mb-1">
                            Precios
                        </x-label>
                        <x-select class="w-full" name="price_id" id="">
                            @foreach ($prices as $price )
                            <option value="{{$price->id}}"
                                @selected(old('price_id')==$price->id) >

                                @if ($price->value == 0)
                                Gratis
                                @else
                                {{$price->value}} USD $ (nivel {{$loop->index}})
                                @endif

                            </option>

                            @endforeach
                        </x-select>
                    </div>

                </div>

                <div class="flex justify-end">
                    <x-button>
                        Crear curso
                    </x-button>
                </div>
            </form>

        </div>
    </x-container>

</x-instructor-layout>