<div>
    <div x-data="{
        destroySection(sectionId) {
    
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se podrá revertir',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroy', sectionId)
                }
            });
    
        }
    }" x-init="new Sortable($refs.sections, {
        animation: 150,
        handle: '.handle',
        store: {
            set: (sortable) => {
                @this.call('sortSections', sortable.toArray());
            }
        }
    });">
        @if ($sections->count())
            <ul class="mb-6 space-y-6" x-ref="sections">
                @foreach ($sections as $section)
                    <li data-id="{{ $section->id }}" wire:key="section-{{ $section->id }}">

                        @include('instructor.sections.create-position')

                        <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4 mt-6">

                            @if ($sectionEdit['id'] == $section->id)
                                @include('instructor.sections.edit')
                            @else
                                @include('instructor.sections.show')
                            @endif

                            <div class="mt-4">
                                @livewire('instructor.courses.manage-lessons', ['section' => $section, 'lessons' => $section->lessons], key('section-lessons' . $section->id))
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif


        @include('instructor.sections.create')
    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    @endpush

</div>
