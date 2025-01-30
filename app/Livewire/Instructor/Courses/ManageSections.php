<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Section;

class ManageSections extends Component
{
    public $course;

    public $name;

    public $sections;

    public function mount()
    {
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
    }

    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
