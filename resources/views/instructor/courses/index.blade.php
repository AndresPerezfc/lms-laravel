<x-instructor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de cursos
        </h2>
    </x-slot>

    <div>
        <x-container class="mt-12">
            <div class="md:flex md:justify-end">
                <a href="{{route('instructor.courses.create')}}" class="btn btn-red block w-full md:w-auto text-center">
                    Crear curso
                </a>
            </div>

        </x-container>
    </div>
</x-instructor-layout>