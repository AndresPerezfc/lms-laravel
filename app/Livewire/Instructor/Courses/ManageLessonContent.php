<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;

class ManageLessonContent extends Component
{

    public $lesson;

    public $editVideo = false;

    public $platform = 1, $video, $url;

    public function render()
    {
        return view('livewire.instructor.courses.manage-lesson-content');
    }
}
