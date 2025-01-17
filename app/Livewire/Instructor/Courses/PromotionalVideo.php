<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;

use Livewire\WithFileUploads;

class PromotionalVideo extends Component
{

    use WithFileUploads;

    public $course;
    public $video;

    protected $rules = [
        'video' => 'required|mimes:mp4,mov,avi|max:10240', // Asegúrate de definir los tipos MIME correctos y un tamaño máximo adecuado
    ];

    public function save(){
        $this->validate();
        $this->course->video_path = $this->video->store('course/promotional-videos', 'public');
        $this->course->save();
    }

    

    public function render()
    {
        return view('livewire.instructor.courses.promotional-video'); 
    }
}
