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
        $this->goals = Goal::where('course_id', $this->course->id)->get()->toArray();
    }

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function store(){

        $this->validate();

        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->goals = Goal::where('course_id', $this->course->id)->get()->toArray();

        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals'); 
    }
}
