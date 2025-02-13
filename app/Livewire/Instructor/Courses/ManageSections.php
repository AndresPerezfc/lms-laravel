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

    public $sectionPositionCreate = [ ];


    public function mount()
    {
        $this->getSection();
    }

    public function getSection(){
        $this->sections = Section::where('course_id', $this->course->id)->with('lessons')->orderBy('position', 'asc')->get();
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

    public function storePosition($sectionId){
        $this->validate([
            "sectionPositionCreate.{$sectionId}.name" => 'required'
        ]);

        $position = Section::find($sectionId)->position;
        Section::where('course_id', $this->course->id)->where('position', '>=', $position)->increment('position');

        $this->course->sections()->create([
            'name' => $this->sectionPositionCreate[$sectionId]['name'],
            'position' => $position
        ]);


        
        $this->getSection();

        if (array_key_exists($sectionId, $this->sectionPositionCreate)) {
            unset($this->sectionPositionCreate[$sectionId]);
        }
        $this->dispatch('close-section-position-create');
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

    
    public function sortSections($sorts){
        foreach($sorts as $position => $sectionId){
            Section::find($sectionId)->update([
                'position' => $position + 1
            ]);
        }
        $this->getSection(); 
    }
    

    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
