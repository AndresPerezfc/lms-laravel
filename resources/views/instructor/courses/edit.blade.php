<x-instructor-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Courso: {{$course->title}}
        </h2>
    </x-slot>

    <x-container class="py-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <aside class="col-span-1">

                <h1 class="font-semibold text-xl mb-4">
                    Edición del curso
                </h1>

                <nav>
                    <ul>
                        <li>
                            <a href="{{route('instructor.courses.edit', $course)}}" class="border-l-4 border-indigo-400 pl-3">
                                Información del curso
                            </a>
                        </li>
                    </ul>
                </nav>

            </aside>

            <div class="grid-col-span-1 lg:col-span-4">
                <div class="card">
                    <form action="{{route('instructor.courses.update', $course)}} method=" POST" enctype="multipart/form-data"">
                    @csrf
                    @method('PUT')

                    <p class=" text-2xl font-semibold">Información del curso</p>

                        <hr class="mt-2 mb-6">

                        <x-validation-errors class="mb-4" />

                        <div class="mb-4">
                            <x-label value="Titulo del curso"></x-label>
                            <x-input class="w-full" value="{{old('tile', $course->title)}}" name="title"></x-input>
                        </div>

                        @empty($course->plublished_at)
                        <div class="mb-4">
                            <x-label value="Slug del curso"></x-label>
                            <x-input class="w-full" value="{{old('tile', $course->slug)}}" name="slug"></x-input>
                        </div>
                        @endempty

                        <div class="mb-4">
                            <x-label value="Descripción del curso"></x-label>
                            <x-textarea class="w-full" name="summary">{{old('summary', $course->summary)}}</x-textarea>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 mb-8">

                            <div>
                                <x-label class="mb-1">
                                    Categorías
                                </x-label>

                                <x-select class="w-full" name="category_id" id="">
                                    @foreach ($categories as $category )
                                    @selected(old('category_id', $course->category_id) == $category->id)
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
                                    @selected(old('level_id', $course->level_id) == $level->id)
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
                                        @selected(old('price_id', $course->price_id)==$price->id) >

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

                        <div>
                            <p class="text-2xl font-semibold mb-2">Imagen del curso</p>

                            <div class="grid md:grid-cols-2 gap-4">
                                <figure>
                                    <img class="w-full aspect-video object-cover object-center" src="{{$course->image}}" alt="">
                                </figure>

                                <div>
                                    <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo totam, in non nam itaque fugit perspiciatis cum soluta veritatis officia nobis aperiam? Voluptatibus corrupti odio alias sint maxime ex debitis.</p>

                                    <label>

                                        <span class="btn btn-blue md:hidden cursor-pointer">Selecciona una imagen</span>

                                        <input class="hidden md:block" type="file" accept="image/*" name="image">
                                    </label>

                                    <div class="flex md:justify-end mt-2">
                                        <x-button>
                                            Guardar Cambios
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </x-container>

</x-instructor-layout>