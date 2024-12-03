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

                        <x-validation-errors />

                        <div class="mb-4">
                            <x-label value="Titulo del curso"></x-label>
                            <x-input class="w-full" value="{{old('tile', $course->title)}}" name="title"></x-input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-container>

</x-instructor-layout>