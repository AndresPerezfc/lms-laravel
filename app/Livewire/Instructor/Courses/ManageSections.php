<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Section;

class ManageSections extends Component
{
    public $course;

    public $name;

    public $sections;

    public $sectionEdit = [
        'id' => null,
        'name' => null
    ];

    public function mount()
    {
        $this->getSection();
    }

    public function getSection(){
        $this->sections = Section::where('course_id', $this->course->id)->orderBy('position', 'asc')->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->sections()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        $this->getSection();
    }

    public function edit(Section $section){
        $this->sectionEdit = [
            'id' => $section->id,
            'name' => $section->name,
        ];
    }

    public function update(){
        $this->validate([
            'sectionEdit.name' => 'required',
        ]);

        Section::find($this->sectionEdit['id'])->update(['name' => $this->sectionEdit['name']]);

        $this->reset('sectionEdit');

        $this->getSection();
    }

    public function destroy(Section $section){
        $section->delete();
        $this->getSection();

        $this->dispatch('swal', [
            "icon"=>'success',
            "title" => "Eliminado",
            "text"=> 'La sección se ha eliminado con exito',
                    
        ]);
    }

    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
