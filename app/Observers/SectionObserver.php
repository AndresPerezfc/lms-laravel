<?php

namespace App\Observers;

use App\Models\Section;

class SectionObserver
{
    public function creating(Section $requirement){
        $requirement->position = Section::where('course_id', $requirement->course_id)->max('position') + 1;
    }
}
