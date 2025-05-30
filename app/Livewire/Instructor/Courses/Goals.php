<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Goal;

class Goals extends Component
{

    public $course;
    public $goals;
    public $name;


    public function mount(){
        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function store(){

        $this->validate();

        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

        $this->reset('name');
    }

    public function update(){
        $this->validate(
            [
                'goals.*.name' => 'required|string|max:255'
            ]
            );


            foreach($this->goals as $goal){
                Goal::find($goal['id'])->update(
                    ['name' => $goal['name']]
                );
            }

            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Correcto',
                'text' => 'Las metas se han actualizado correctamente'
            ]);
    }

    public function destroy($goalId){
        Goal::find($goalId)->delete();

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();

    }


    public function sortGoals($data){


        foreach($data as $index => $goalId){
            Goal::find($goalId)->update([
                'position' => $index + 1
            ]);
        }

        $this->goals = Goal::where('course_id', $this->course->id)->orderBy('position', 'asc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals'); 
    }
}
