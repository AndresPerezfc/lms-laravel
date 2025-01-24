<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Requirement;

class Requirements extends Component
{

    public $course;
    public $requirements;
    public $name;


    public function mount(){
        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function store(){

        $this->validate();

        $this->course->requirements()->create([
            'name' => $this->name
        ]);

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

        $this->reset('name');
    }

    public function update(){
        $this->validate(
            [
                'requirements.*.name' => 'required|string|max:255'
            ]
            );


            foreach($this->requirements as $requirement){
                Requirement::find($requirement['id'])->update(
                    ['name' => $requirement['name']]
                );
            }

            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Correcto',
                'text' => 'Los requisitos se han actualizado correctamente'
            ]);
    }

    public function destroy($requirementId){
        Requirement::find($requirementId)->delete();

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

    }

    public function sortRequirements($data){


        foreach($data as $index => $requirementId){
            Requirement::find($requirementId)->update([
                'position' => $index + 1
            ]);
        }

        $this->requirements = Requirement::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.instructor.courses.requirements');
    }
}
